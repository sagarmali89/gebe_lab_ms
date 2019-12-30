<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Water_Analysis extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->isLoggedIn();
    }

    public function listing() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['conRecords'] = $this->common_model->select('tbl_consumers')->result();
            unset($_SESSION['analysisWhereData']);
            $analysisWhereData['consumer'] = "ALL";
            $dateFrom = new DateTime('first day of this month');
            $analysisWhereData['dateFrom'] = $dateFrom->format('j M Y');
            $analysisWhereData['dateTo'] = date('j M Y');
            $this->session->set_userdata('analysisWhereData', $analysisWhereData);
            $this->global['pageTitle'] = 'Listing - Water Analysis';
            $this->global['pageIcon'] = 'tint';
            $data['wa_types'] = $this->common_model->select('wa_types')->result();

            $this->loadViews("list_water_analysis", $this->global, $data, NULL);
        }
    }

    public function manage() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['conRecords'] = $this->common_model->select('tbl_consumers', '', 'con_id, con_first_name, con_last_name')->result();
            $this->global['pageTitle'] = 'Manage - Water Analysis';
            $this->global['pageIcon'] = 'tint';
            $data['wa_types'] = $this->common_model->select('wa_types')->result();
            $this->loadViews("manage_analysis", $this->global, $data, NULL);
        }
    }

    public function getWASubTypes() {
        if ($this->isAdmin() == TRUE) {
            echo json_encode(array('html' => 'Access Denied!'));
        } else {
            $where['wa_type_id_fk'] = $this->input->post('wa_type_id');
            $res = $this->common_model->select('wa_subtypes', $where)->result();
            $html = '<option readonly>Select Sub Type</option>';
            if ($res) {
                foreach ($res as $ro) {
                    $html .= '<option value="' . $ro->wa_subtype_id . '">' . $ro->wa_subtype_name . '(' . $ro->id_code . ')</option>';
                }
            }
            echo json_encode(array('html' => $html));
        }
        exit();
    }

    public function report() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['conRecords'] = $this->common_model->select('tbl_consumers', '', 'con_id, con_first_name, con_last_name')->result();
            $this->global['pageTitle'] = 'Report - Water Analysis';
            $this->global['pageIcon'] = 'tint';
            $data['wa_types'] = $this->common_model->select('wa_types')->result();

            $this->loadViews("report_analysis", $this->global, $data, NULL);
        }
    }

    public function saveChanges() {
        $postData = $this->input->post();

        // if (isset($postData['date']) && isset($postData['time']) && isset($postData['consumer'])) {
        if (isset($postData['date']) && isset($postData['time']) && isset($postData['wa_type']) && isset($postData['wa_subtype'])) {
            $where = NULL;

            $data['ana_' . $postData['column']] = $postData['value'];

            if ($postData['column'] == 'cond') {
                $data['ana_tds'] = $postData['value'] * 0.51;
            }

            $prevRecordObj = $this->common_model->select('tbl_analysis', array(
                        'ana_date' => date('Y-m-d', strtotime($postData['date'])),
                        'ana_time' => $postData['time'],
                        // 'ana_consumer' => $postData['consumer'],
                        'ana_wa_type_id_fk' => $postData['wa_type'],
                        'ana_wa_subtype_id_fk' => $postData['wa_subtype'],
                            ), 'ana_id')->result();

            if (sizeof($prevRecordObj) > 0) {
                $where = array(
                    'ana_id' => $prevRecordObj[0]->ana_id,
                );
            } else {
                $data['ana_date'] = date('Y-m-d', strtotime($postData['date']));
                $data['ana_time'] = $postData['time'];
                //  $data['ana_consumer'] = $postData['consumer'];
                $data['ana_wa_type_id_fk'] = $postData['wa_type'];
                $data['ana_wa_subtype_id_fk'] = $postData['wa_subtype'];
            }

            if ($where !== NULL) {
                $data['ana_modified_on'] = date('Y-m-d H:i:s');
                if ($this->common_model->update('tbl_analysis', $where, $data)) {
                    echo json_encode(array('class' => 'success', 'msg' => 'Record Updated!'));
                } else {
                    echo json_encode(array('class' => 'danger', 'msg' => 'Record Not Updated!'));
                }
            } else {
                $data['ana_created_by'] = $this->vendorId;
                $data['ana_created_on'] = date('Y-m-d H:i:s');
                $data['ana_modified_on'] = date('Y-m-d H:i:s');
                if ($this->common_model->insert('tbl_analysis', $data)) {
                    echo json_encode(array('class' => 'success', 'msg' => 'Record Created!'));
                } else {
                    echo json_encode(array('class' => 'warning', 'msg' => 'Record Not Created!'));
                }
            }
        } else {
            echo json_encode(array('class' => 'danger', 'msg' => 'Invalid Create Request!'));
        }
    }

    public function deleteAnalysisRecord() {
        $postData = $this->input->post();
        //  if (isset($postData['consumer']) && isset($postData['date']) && isset($postData['time'])) {
        if (isset($postData['wa_type']) && isset($postData['wa_subtype']) && isset($postData['date']) && isset($postData['time'])) {
            $where = array(
                // 'ana_consumer' => $postData['consumer'],
                'ana_wa_type_id_fk' => $postData['wa_type'],
                'ana_wa_subtype_id_fk' => $postData['wa_subtype'],
                'ana_date' => date('Y-m-d', strtotime($postData['date'])),
                'ana_time' => $postData['time'],
            );

            if ($this->common_model->delete('tbl_analysis', $where)) {
                echo json_encode(array('class' => 'success', 'msg' => 'Record deleted!'));
            } else {
                echo json_encode(array('class' => 'warning', 'msg' => 'Record Not deleted!'));
            }
        } else {
            echo json_encode(array('class' => 'danger', 'msg' => 'Invalid Delete Request!'));
        }
    }

    public function getAnalysisRecords() {
        $postData = $this->input->post();
        // if (isset($postData['consumer']) && isset($postData['date_from']) && isset($postData['date_to'])) {
        if (isset($postData['wa_type']) && isset($postData['wa_subtype']) && isset($postData['date_from']) && isset($postData['date_to'])) {
            $oldAnaRecords = $this->common_model->select('tbl_analysis', array(
                        'ana_wa_type_id_fk' => $postData['wa_type'],
                        'ana_wa_subtype_id_fk' => $postData['wa_subtype'],
                        //  'ana_consumer' => $postData['consumer'],
                        'ana_date >=' => date('Y-m-d', strtotime($postData['date_from'])),
                        'ana_date <=' => date('Y-m-d', strtotime($postData['date_to'])),
                            ), "*", ['ana_date', 'asc'])->result();
            for ($i = 0; $i < sizeof($oldAnaRecords); $i++) {
                $oldAnaRecords[$i]->ana_date = date('j M Y', strtotime($oldAnaRecords[$i]->ana_date));
                $oldAnaRecords[$i]->ana_time_for_sort = strtotime($oldAnaRecords[$i]->ana_time);
            }
            //   } else if (isset($postData['consumer']) && isset($postData['date']) && isset($postData['time'])) {
        } else if (isset($postData['wa_type']) && isset($postData['wa_subtype']) && isset($postData['date']) && isset($postData['time'])) {
            $oldAnaRecords = $this->common_model->select('tbl_analysis', array(
                        // 'ana_consumer' => $postData['consumer'],
                        'ana_wa_type_id_fk' => $postData['wa_type'],
                        'ana_wa_subtype_id_fk' => $postData['wa_subtype'],
                        'ana_date' => date('Y-m-d', strtotime($postData['date'])),
                        'ana_time' => $postData['time'],
                    ))->row();
            if (isset($oldAnaRecords->ana_date)) {
                $oldAnaRecords->ana_date = date('j M Y', strtotime($oldAnaRecords->ana_date));
            }
        }
        echo json_encode($oldAnaRecords);
    }

    public function getRecordsForDataTable() {
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value





        if (isset($this->session->userdata('analysisWhereData')['ana_wa_type_id_fk']) && isset($this->session->userdata('analysisWhereData')['ana_wa_subtype_id_fk'])) {

            $totalRecords = $this->db->get('tbl_analysis')->num_rows();

            $totalRecordwithFilter = $this->db->get('tbl_analysis')->num_rows();

            // $this->db->select('tbl_analysis.*, CONCAT(tbl_consumers.con_first_name, " ", tbl_consumers.con_last_name) AS consumer_name');
            $this->db->select('tbl_analysis.*, CONCAT(wa_subtypes.wa_subtype_name, " ", wa_subtypes.id_code) AS wa_subtype_name');
            $this->db->from('tbl_analysis');

            // $where['tbl_analysis.ana_consumer'] = $this->session->userdata('analysisWhereData')['consumer'];
            $where['tbl_analysis.ana_wa_type_id_fk'] = $this->session->userdata('analysisWhereData')['ana_wa_type_id_fk'];
            $where['tbl_analysis.ana_wa_subtype_id_fk'] = $this->session->userdata('analysisWhereData')['ana_wa_subtype_id_fk'];
            $where['tbl_analysis.ana_date >='] = date('Y-m-d', strtotime($this->session->userdata('analysisWhereData')['dateFrom']));
            $where['tbl_analysis.ana_date <='] = date('Y-m-d', strtotime($this->session->userdata('analysisWhereData')['dateTo']));

            $this->db->where($where);

            // $this->db->join('tbl_consumers', 'tbl_consumers.con_id = tbl_analysis.ana_consumer');
            $this->db->join('wa_subtypes', 'wa_subtypes.wa_subtype_id = tbl_analysis.ana_wa_subtype_id_fk');
            $this->db->limit($rowperpage, $row);
            $this->db->order_by($columnName, $columnSortOrder);
            $data = $this->db->get()->result_array();
        } else {
            $totalRecords = 0;
            $totalRecordwithFilter = 0;
            $draw = 0;
            $data = NULL;
        }



        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
        );
        echo json_encode($response);
    }

    public function updateFilterSession() {
        unset($_SESSION['analysisWhereData']);
        // $analysisWhereData['consumer'] = $this->input->post('consumer');
        $analysisWhereData['ana_wa_type_id_fk'] = $this->input->post('wa_type');
        $analysisWhereData['ana_wa_subtype_id_fk'] = $this->input->post('wa_subtype');
        $analysisWhereData['dateFrom'] = $this->input->post('dateFrom');
        $analysisWhereData['dateTo'] = $this->input->post('dateTo');
        $this->session->set_userdata('analysisWhereData', $analysisWhereData);
    }

}

?>