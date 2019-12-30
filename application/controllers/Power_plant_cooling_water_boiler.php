<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Power_plant_cooling_water_boiler extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->isLoggedIn();
    }

    public function ppcw_list() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['boilersRecords'] = $this->common_model->select('tbl_boilers')->result();
            unset($_SESSION['analysisWhereData']);
            $analysisWhereData['boilers'] = [];
            foreach ($data['boilersRecords'] as $boiler) {
                array_push($analysisWhereData['boilers'], $boiler->boiler_id);
            }
            $analysisWhereData['dateFrom'] = date('Y-m-d H:i:s', strtotime(date('F') . " 1, " . date("Y") . " 00.00.00"));
            $analysisWhereData['dateTo'] = date('Y-m-t H:i:s', strtotime(date('F') . " 1, " . date("Y") . " 24.00.00"));

            $this->session->set_userdata('analysisWhereData', $analysisWhereData);
            $this->global['pageTitle'] = 'Listing - Power Plant Cooling Water (Boilers)';
            $this->global['pageIcon'] = 'server';

            $this->loadViews("list_ppcw_boilers", $this->global, $data, NULL);
        }
    }

    public function manage() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['boilersRecords'] = $this->common_model->select('tbl_boilers')->result();
            $this->global['pageTitle'] = 'Manage - Power Plant Cooling Water (Boilers)';
            $this->global['pageIcon'] = 'server';
            $this->loadViews("manage_ppcw_boilers", $this->global, $data, NULL);
        }
    }

    public function report() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['boilersRecords'] = $this->common_model->select('tbl_boilers')->result();
            $this->global['pageTitle'] = 'Report - Power Plant Cooling Water (Boilers)';
            $this->global['pageIcon'] = 'server';

            $this->loadViews("report_ppcw_boilers", $this->global, $data, NULL);
        }
    }

    public function saveChanges() {
        $postData = $this->input->post();

        if (isset($postData['date']) && isset($postData['time']) && isset($postData['boiler']) && isset($postData['sampler'])) {
            $where = NULL;

            $data['ppcwb_' . $postData['column']] = $postData['value'];

            $prevRecordObj = $this->common_model->select('tbl_ppcw_boilers', array(
                        'ppcwb_datetime' => date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time'])),
                        'ppcwb_sampler' => $postData['sampler'],
                        'ppcwb_boiler' => $postData['boiler']
                            ), 'ppcwb_id')->result();

            if (sizeof($prevRecordObj) > 0) {
                $where = array(
                    'ppcwb_id' => $prevRecordObj[0]->ppcwb_id,
                );
            } else {
                $data['ppcwb_datetime'] = date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time']));
                $data['ppcwb_sampler'] = $postData['sampler'];
                $data['ppcwb_boiler'] = $postData['boiler'];
            }

            if ($where !== NULL) {
                $data['ppcwb_modified_on'] = date('Y-m-d H:i:s');
                if ($this->common_model->update('tbl_ppcw_boilers', $where, $data)) {
                    echo json_encode(array('class' => 'success', 'msg' => 'Record Updated!'));
                } else {
                    echo json_encode(array('class' => 'danger', 'msg' => 'Record Not Updated!'));
                }
            } else {
                $data['ppcwb_created_by'] = $this->vendorId;
                $data['ppcwb_created_on'] = date('Y-m-d H:i:s');
                $data['ppcwb_modified_on'] = date('Y-m-d H:i:s');
                if ($this->common_model->insert('tbl_ppcw_boilers', $data)) {
                    echo json_encode(array('class' => 'success', 'msg' => 'Record Created!'));
                } else {
                    echo json_encode(array('class' => 'warning', 'msg' => 'Record Not Created!'));
                }
            }
        } else {
            echo json_encode(array('class' => 'danger', 'msg' => 'Invalid Create Request!'));
        }
    }

    public function deletePPCEBoilersRecord() {
        $postData = $this->input->post();
        if (isset($postData['boilers']) && sizeof($postData['boilers']) > 0 && isset($postData['date']) && isset($postData['time']) && isset($postData['sampler'])) {

            $where = array(
                'ppcwb_datetime' => date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time'])),
                'ppcwb_sampler' => $postData['sampler']
            );

            $deletedItemCount = 0;
            for ($i = 0; $i < sizeof($postData['boilers']); $i++) {
                $where['ppcwb_boiler'] = $postData['boilers'][$i];
                if ($this->common_model->delete('tbl_ppcw_boilers', $where)) {
                    $deletedItemCount++;
                }
            }

            if ($deletedItemCount === sizeof($postData['boilers'])) {
                echo json_encode(array('class' => 'success', 'msg' => 'Record deleted!'));
            } else if ($deletedItemCount > 0) {
                echo json_encode(array('class' => 'warning', 'msg' => 'May Be Some Record Not deleted!'));
            } else {
                echo json_encode(array('class' => 'danger', 'msg' => 'Record Not Deleted!'));
            }
        } else {
            echo json_encode(array('class' => 'danger', 'msg' => 'Invalid Delete Request!'));
        }
    }

    public function getPPCWBoilersRecords() {
        $postData = $this->input->post();
        $oldAnaRecords = null;
        if (isset($postData['boilers']) && isset($postData['year']) && isset($postData['month'])) {
            $whereArray = array(
                'ppcwb_datetime >=' => date('Y-m-d H:i:s', strtotime($postData['month'] . " 1, " . $postData['year'] . " 00.00.00")),
                'ppcwb_datetime <=' => date('Y-m-t H:i:s', strtotime($postData['month'] . " 1, " . $postData['year'] . " 24.00.00"))
            );
            $oldAnaRecords = $this->common_model->selectWhereIn('tbl_ppcw_boilers', $whereArray, ['ppcwb_boiler', $postData['boilers']], "*", ['ppcwb_datetime', 'asc'])->result();
            for ($i = 0; $i < sizeof($oldAnaRecords); $i++) {
                $oldAnaRecords[$i]->ppcwb_formatted_date = date('j M Y', strtotime($oldAnaRecords[$i]->ppcwb_datetime));
                $oldAnaRecords[$i]->ppcwb_formatted_time = date('h:i A', strtotime($oldAnaRecords[$i]->ppcwb_datetime));
            }
        } else if (isset($postData['boilers']) && isset($postData['date']) && isset($postData['time']) && isset($postData['sampler'])) {
            $oldAnaRecords = $this->common_model->selectWhereIn('tbl_ppcw_boilers', array(
                        'ppcwb_datetime' => date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time'])),
                        'ppcwb_sampler' => $postData['sampler'],
                            ), ['ppcwb_boiler', $postData['boilers']])->result();
            for ($i = 0; $i < sizeof($oldAnaRecords); $i++) {
                $oldAnaRecords[$i]->ppcwb_formatted_date = date('j M Y', strtotime($oldAnaRecords[$i]->ppcwb_datetime));
                $oldAnaRecords[$i]->ppcwb_formatted_time = date('h:i A', strtotime($oldAnaRecords[$i]->ppcwb_datetime));
            }
        }
        echo json_encode($oldAnaRecords);
    }

    public function getRecordsForDataTable() {
        $draw = (isset($_POST['draw'])) ? $_POST['draw'] : null;
        $row = (isset($_POST['start'])) ? $_POST['start'] : null;
        $rowperpage = (isset($_POST['length'])) ? $_POST['length'] : null; // Rows display per page
        $columnIndex = (isset($_POST['order'][0]['column'])) ? $_POST['order'][0]['column'] : null; // Column index
        $columnName = (isset($_POST['order'][0]['column'])) ? $_POST['columns'][$columnIndex]['data'] : null; // Column name
        $columnSortOrder = (isset($_POST['order'][0]['dir'])) ? $_POST['order'][0]['dir'] : null; // asc or desc
        $searchValue = (isset($_POST['search']['value'])) ? $_POST['search']['value'] : null; // Search value


        $totalRecords = $this->db->get('tbl_ppcw_boilers')->num_rows();

        $totalRecordwithFilter = $this->db->get('tbl_ppcw_boilers')->num_rows();

        $this->db->select('tbl_ppcw_boilers.*');
        $this->db->from('tbl_ppcw_boilers');

        $where['tbl_ppcw_boilers.ppcwb_datetime >='] = date('Y-m-d', strtotime($this->session->userdata('analysisWhereData')['dateFrom']));
        $where['tbl_ppcw_boilers.ppcwb_datetime <='] = date('Y-m-d', strtotime($this->session->userdata('analysisWhereData')['dateTo']));

        $this->db->where($where);

        $data = $this->db->get()->result_array();

        $sortedArrayWithBoilers = [];

        for ($i = 0; $i < sizeof($data); $i++) {
            $sortedArrayWithBoilers[$data[$i]['ppcwb_datetime'] . " " . $data[$i]['ppcwb_sampler']]["boiler-" . $data[$i]['ppcwb_boiler']] = $data[$i];
        }

        $boilers = $this->session->userdata('analysisWhereData')['boilers'];

        $finalDataArray = [];
        foreach ($sortedArrayWithBoilers as $row) {
            $tempArray = [];

            for ($i = 0; $i < sizeof($boilers); $i++) {
                if (array_key_exists('boiler-' . $boilers[$i], $row)) {
                    $tempArray['ppcwb_datetime'] = $row['boiler-' . $boilers[$i]]['ppcwb_datetime'];
                    $tempArray['ppcwb_sampler'] = $row['boiler-' . $boilers[$i]]['ppcwb_sampler'];
                    $tempArray['ppcwb_ph_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_ph'];
                    $tempArray['ppcwb_cond_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_cond'];
                    $tempArray['ppcwb_chloride_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_chloride'];
                    $tempArray['ppcwb_palkalinity_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_palkalinity'];
                    $tempArray['ppcwb_phosphate_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_phosphate'];
                    $tempArray['ppcwb_sulfite_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_sulfite'];
                    $tempArray['ppcwb_clarity_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_clarity'];
                    $tempArray['ppcwb_created_by_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_created_by'];
                    $tempArray['ppcwb_created_on_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_created_on'];
                    $tempArray['ppcwb_modified_on_' . $boilers[$i]] = $row['boiler-' . $boilers[$i]]['ppcwb_modified_on'];
                } else {
                    $tempArray['ppcwb_ph_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_cond_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_chloride_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_palkalinity_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_phosphate_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_sulfite_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_clarity_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_created_by_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_created_on_' . $boilers[$i]] = null;
                    $tempArray['ppcwb_modified_on_' . $boilers[$i]] = null;
                }
            }

            array_push($finalDataArray, $tempArray);
        }

        $response = array(
            "draw" => intval($draw),
            // "iTotalRecords" => $totalRecordwithFilter,
            // "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $finalDataArray
        );
        echo json_encode($response);
    }

    public function updateFilterSession() {
        unset($_SESSION['analysisWhereData']);

        $boilers = $this->input->post('boilers');

        $analysisWhereData['boilers'] = [];
        foreach ($boilers as $boiler) {
            array_push($analysisWhereData['boilers'], $boiler);
        }
        $analysisWhereData['dateFrom'] = date('Y-m-d H:i:s', strtotime($this->input->post('month') . " 1, " . $this->input->post('year') . " 00.00.00"));
        $analysisWhereData['dateTo'] = date('Y-m-t H:i:s', strtotime($this->input->post('month') . " 1, " . $this->input->post('year') . " 24.00.00"));

        $this->session->set_userdata('analysisWhereData', $analysisWhereData);
    }

}

?>