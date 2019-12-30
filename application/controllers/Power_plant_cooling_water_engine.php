<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Power_plant_cooling_water_engine extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->isLoggedIn();
    }

    public function ppcw_list() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            if ($this->input->post('filter_year') && $this->input->post('filter_month')) {
                $data['filter_year'] = $this->input->post('filter_year');
                $data['filter_month'] = $this->input->post('filter_month');
            } else {
                $data['filter_year'] = date('Y');
                $data['filter_month'] = date('m');
            }
//print_r($data);
            $data['totalEngines'] = $this->db->get('tbl_engines')->num_rows();
            // $data['totalEngineRecords'] = $this->common_model->select('tbl_engines')->num_rows();
            $data['engineRecords'] = $this->common_model->select('tbl_engines')->result();
            $data['totalBuildings'] = $this->db->get('tbl_buildings')->num_rows();
            $data['buildingRecords'] = $this->common_model->select('tbl_buildings')->result();

            $f_date = date('Y-m-01', strtotime($data['filter_year'] . '-' . $data['filter_month'] . '-' . '01'));

// Last day of the month.
            $l_date = date('Y-m-t', strtotime($data['filter_year'] . '-' . $data['filter_month'] . '-' . '01'));

            $where = array('ppcwe_datetime >=' => $f_date, 'ppcwe_datetime <=' => $l_date);
            $data['ppcw_engines_records'] = $ppcw_engines_records = $this->common_model->select('tbl_ppcw_engines', $where)->result();
            // echo $this->db->last_query();
            $tableData = array();
            foreach ($ppcw_engines_records as $row) {
                $where1 = array(
                    'ppcwe_id_fk' => $row->ppcwe_id
                );
                $details = $this->common_model->select('tbl_ppcw_engines_details', $where1)->result();
                $tableData[$row->ppcwe_id] = isset($details) ? $details : null;
            }
            $data['tableData'] = $tableData;
            $data['total_ppcw_engines_records'] = $this->common_model->select('tbl_ppcw_engines', $where)->num_rows();

            unset($_SESSION['analysisWhereData']);
            $analysisWhereData['engines'] = [];

            $analysisWhereData['dateFrom'] = date('Y-m-d H:i:s', strtotime(date('F') . " 1, " . date("Y") . " 00.00.00"));
            $analysisWhereData['dateTo'] = date('Y-m-t H:i:s', strtotime(date('F') . " 1, " . date("Y") . " 24.00.00"));

            $this->session->set_userdata('analysisWhereData', $analysisWhereData);
            $this->global['pageTitle'] = 'Listing - Power Plant Cooling Water (Engines)';
            $this->global['pageIcon'] = 'server';

            $this->loadViews("list_ppcw_engines", $this->global, $data, NULL);
        }
    }

    public function manage() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['enginesRecords'] = $this->common_model->select('tbl_engines')->result();
            $this->global['pageTitle'] = 'Manage - Power Plant Cooling Water (Engines)';
            $this->global['pageIcon'] = 'server';
            $this->loadViews("manage_ppcw_engines", $this->global, $data, NULL);
        }
    }

    public function report() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['filter_year'] = date('Y');
            $data['filter_month'] = date('m');
            $data['totalEngines'] = $this->db->get('tbl_engines')->num_rows();
            $data['engineRecords'] = $this->common_model->select('tbl_engines')->result();
            $data['totalBuildings'] = $this->db->get('tbl_buildings')->num_rows();
            $data['buildingRecords'] = $this->common_model->select('tbl_buildings')->result();
            $f_date = date('Y-m-01', strtotime($data['filter_year'] . '-' . $data['filter_month'] . '-' . '01'));
// Last day of the month.
            $l_date = date('Y-m-t', strtotime($data['filter_year'] . '-' . $data['filter_month'] . '-' . '01'));

            if ($this->input->post('filter_date_from') && $this->input->post('filter_date_to')) {
                $data['filter_date_from'] = $f_date = date('Y-m-d', strtotime($this->input->post('filter_date_from')));
                $data['filter_date_to'] = $l_date = date('Y-m-d', strtotime($this->input->post('filter_date_to')));
            } else {
                
            }
            $where = array('ppcwe_datetime >=' => $f_date, 'ppcwe_datetime <=' => $l_date);
            $data['ppcw_engines_records'] = $ppcw_engines_records = $this->common_model->select('tbl_ppcw_engines', $where)->result();
            $tableData = array();
            foreach ($ppcw_engines_records as $row) {
                $where1 = array(
                    'ppcwe_id_fk' => $row->ppcwe_id
                );
                $details = $this->common_model->select('tbl_ppcw_engines_details', $where1)->result();
                $tableData[$row->ppcwe_id] = isset($details) ? $details : null;
            }
            $data['tableData'] = $tableData;

            $data['enginesRecords'] = $this->common_model->select('tbl_engines')->result();
            $this->global['pageTitle'] = 'Report - Power Plant Cooling Water (Engines)';
            $this->global['pageIcon'] = 'server';

            $this->loadViews("report_ppcw_engines", $this->global, $data, NULL);
        }
    }

    public function saveChanges() {
        $postData = $this->input->post();

        if (isset($postData['date']) && isset($postData['time']) && isset($postData['sampler'])) {
            $where = NULL;

            $where1 = array(
                'ppcwe_datetime' => date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time'])),
                'ppcwe_sampler' => $postData['sampler'],
            );
            $prevRecordObj = $this->common_model->select('tbl_ppcw_engines', $where1, 'ppcwe_id')->row();

            $prev_id = 0;
            if ($prevRecordObj) {
                // same record present, now check if same record for details also present then update else insert into details table
                $prev_id = $prevRecordObj->ppcwe_id;
                $where_details = array(
                    'ppcwe_id_fk' => $prev_id,
                    'ppcwe_details_type' => $postData['type'],
                    'ppcwe_details_type_id' => $postData['type_id'],
                );
                $prevDetailsRecordObj = $this->common_model->select('tbl_ppcw_engines_details', $where_details, 'ppcwe_details_id')->row();
                $prev_details_id = $prevDetailsRecordObj->ppcwe_details_id;
                if ($prev_id > 0 && $prev_details_id > 0) {
                    //updates
                    $where = array(
                        'ppcwe_id' => $prev_id,
                    );
                    $where_details = array(
                        // 'ppcwe_id_fk' => $prev_id,
                        'ppcwe_details_id' => $prev_details_id
                    );
                    $data_details['ppcwe_details_modified_on'] = date('Y-m-d H:i:s');
                    $data_details['ppcwe_details_type_value'] = $postData['type_value'];
                    $data_details['ppcwe_details_modified_by'] = $this->vendorId;

                    // if ($this->common_model->update('tbl_ppcw_engines', $where, $data) && $this->common_model->update('tbl_ppcw_engines_details', $where_details, $data)) {
                    if ($this->common_model->update('tbl_ppcw_engines_details', $where_details, $data_details)) {
                        //  echo $this->db->last_query();
                        echo json_encode(array('class' => 'success', 'msg' => 'Record Updated!'));
                    } else {
                        //  echo $this->db->last_query();
                        echo json_encode(array('class' => 'danger', 'msg' => 'Record Not Updated!'));
                    }
                } else {
                    $data_details['ppcwe_details_type'] = $postData['type'];
                    $data_details['ppcwe_details_type_id'] = $postData['type_id'];
                    $data_details['ppcwe_details_type_value'] = $postData['type_value'];

                    $data_details['ppcwe_details_created_on'] = date('Y-m-d H:i:s');
                    $data_details['ppcwe_details_modified_on'] = date('Y-m-d H:i:s');
                    $data_details['ppcwe_details_modified_by'] = $this->vendorId;
                    $data_details['ppcwe_id_fk'] = $prev_id;

                    if ($this->common_model->insert('tbl_ppcw_engines_details', $data_details)) {
                        echo json_encode(array('class' => 'success', 'msg' => 'Record Created!'));
                    } else {
                        echo json_encode(array('class' => 'warning', 'msg' => 'Record Not Created!'));
                    }
                }
            } else {
                $data['ppcwe_datetime'] = date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time']));
                $data['ppcwe_sampler'] = $postData['sampler'];
                $data_details['ppcwe_details_type'] = $postData['type'];
                $data_details['ppcwe_details_type_id'] = $postData['type_id'];
                $data_details['ppcwe_details_type_value'] = $postData['type_value'];

                $data['ppcwe_created_by'] = $this->vendorId;
                $data['ppcwe_created_on'] = $data_details['ppcwe_details_created_on'] = date('Y-m-d H:i:s');
                $data['ppcwe_modified_on'] = $data_details['ppcwe_details_modified_on'] = date('Y-m-d H:i:s');
                $data['ppcwe_modified_by'] = $data_details['ppcwe_details_modified_by'] = $this->vendorId;
                $data_details['ppcwe_id_fk'] = $this->common_model->insert('tbl_ppcw_engines', $data);

                if ($data_details['ppcwe_id_fk'] > 0 && $this->common_model->insert('tbl_ppcw_engines_details', $data_details)) {
                    echo json_encode(array('class' => 'success', 'msg' => 'Record Created!'));
                } else {
                    echo json_encode(array('class' => 'warning', 'msg' => 'Record Not Created!'));
                }
            }
        } else {
            echo json_encode(array('class' => 'danger', 'msg' => 'Invalid Create Request!'));
        }
    }

    public function getPPCWEnginesRecords() {
        $postData = $this->input->post();

        $oldAnaRecords = null;
        if (isset($postData['year']) && isset($postData['month'])) {
            $whereArray = array(
                'ppcwe_datetime >=' => date('Y-m-d H:i:s', strtotime($postData['month'] . " 1, " . $postData['year'] . " 00.00.00")),
                'ppcwe_datetime <=' => date('Y-m-t H:i:s', strtotime($postData['month'] . " 1, " . $postData['year'] . " 24.00.00"))
            );
            $oldAnaRecords = $this->common_model->selectWhereIn('tbl_ppcw_engines', $whereArray, ['ppcwe_boiler', $postData['engines']], "*", ['ppcwe_datetime', 'asc'])->result();
            for ($i = 0; $i < sizeof($oldAnaRecords); $i++) {
                $oldAnaRecords[$i]->ppcwe_formatted_date = date('j M Y', strtotime($oldAnaRecords[$i]->ppcwe_datetime));
                $oldAnaRecords[$i]->ppcwe_formatted_time = date('h:i A', strtotime($oldAnaRecords[$i]->ppcwe_datetime));
            }
        } else if (isset($postData['date']) && isset($postData['time']) && isset($postData['sampler'])) {
//            if ($postData['type'] == 'engine') {
//                $where = array(
//                    'ppcwe_datetime' => date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time'])),
//                    'ppcwe_sampler' => $postData['sampler'],
//                   // 'ppcwe_engine_id' => $postData['type_id'],
//                );
//            } else {
            $where = array(
                'ppcwe_datetime' => date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time'])),
                'ppcwe_sampler' => $postData['sampler'],
                    // 'ppcwe_building_id' => $postData['type_id'],
            );
            // }
            $prevRecordObj = $this->common_model->selectWhereIn('tbl_ppcw_engines', $where)->row();

            $prev_id = 0;
            if ($prevRecordObj) {
                $prev_id_fk = $prevRecordObj->ppcwe_id;
                $where_details = array(
                    'ppcwe_id_fk' => $prev_id_fk
                );
                $prevRecords = $this->common_model->selectWhereIn('tbl_ppcw_engines_details', $where_details)->result();
                $oldAnaRecords = $prevRecords;
            }


//            for ($i = 0; $i < sizeof($oldAnaRecords); $i++) {
//                $oldAnaRecords[$i]->ppcwe_formatted_date = date('j M Y', strtotime($oldAnaRecords[$i]->ppcwe_datetime));
//                $oldAnaRecords[$i]->ppcwe_formatted_time = date('h:i A', strtotime($oldAnaRecords[$i]->ppcwe_datetime));
//            }
        }
        echo json_encode($oldAnaRecords);
    }

    public function deletePPCEEnginesRecord() {
        $postData = $this->input->post();
        if (isset($postData['engines']) && sizeof($postData['engines']) > 0 && isset($postData['date']) && isset($postData['time']) && isset($postData['sampler'])) {

            $where = array(
                'ppcwe_datetime' => date('Y-m-d H:i:s', strtotime($postData['date'] . ' ' . $postData['time'])),
                'ppcwe_sampler' => $postData['sampler']
            );

            $deletedItemCount = 0;

            $deletedItemCount = $this->common_model->delete('tbl_ppcw_engines', $where);


            if ($deletedItemCount) {
                echo json_encode(array('class' => 'success', 'msg' => 'Record deleted!'));
            } else {
                echo json_encode(array('class' => 'danger', 'msg' => 'Record Not Deleted!'));
            }
        } else {
            echo json_encode(array('class' => 'danger', 'msg' => 'Invalid Delete Request!'));
        }
    }

    public function getRecordsForDataTable() {
        $draw = (isset($_POST['draw'])) ? $_POST['draw'] : null;
        $row = (isset($_POST['start'])) ? $_POST['start'] : null;
        $rowperpage = (isset($_POST['length'])) ? $_POST['length'] : null; // Rows display per page
        $columnIndex = (isset($_POST['order'][0]['column'])) ? $_POST['order'][0]['column'] : null; // Column index
        $columnName = (isset($_POST['order'][0]['column'])) ? $_POST['columns'][$columnIndex]['data'] : null; // Column name
        $columnSortOrder = (isset($_POST['order'][0]['dir'])) ? $_POST['order'][0]['dir'] : null; // asc or desc
        $searchValue = (isset($_POST['search']['value'])) ? $_POST['search']['value'] : null; // Search value


        $totalRecords = $this->db->get('tbl_ppcw_engines')->num_rows();

        $totalRecordwithFilter = $this->db->get('tbl_ppcw_engines')->num_rows();

        $this->db->select('tbl_ppcw_engines.*');
        $this->db->from('tbl_ppcw_engines');

        $where['tbl_ppcw_engines.ppcwe_datetime >='] = date('Y-m-d', strtotime($this->session->userdata('analysisWhereData')['dateFrom']));
        $where['tbl_ppcw_engines.ppcwe_datetime <='] = date('Y-m-d', strtotime($this->session->userdata('analysisWhereData')['dateTo']));

        $this->db->where($where);

        $data = $this->db->get()->result_array();

        $sortedArrayWithBoilers = [];

        for ($i = 0; $i < sizeof($data); $i++) {
            $sortedArrayWithBoilers[$data[$i]['ppcwe_datetime'] . " " . $data[$i]['ppcwe_sampler']]["boiler-" . $data[$i]['ppcwe_boiler']] = $data[$i];
        }

        $engines = $this->session->userdata('analysisWhereData')['engines'];

        $finalDataArray = [];
        foreach ($sortedArrayWithBoilers as $row) {
            $tempArray = [];

            for ($i = 0; $i < sizeof($engines); $i++) {
                if (array_key_exists('boiler-' . $engines[$i], $row)) {
                    $tempArray['ppcwe_datetime'] = $row['boiler-' . $engines[$i]]['ppcwe_datetime'];
                    $tempArray['ppcwe_sampler'] = $row['boiler-' . $engines[$i]]['ppcwe_sampler'];
                    $tempArray['ppcwe_ph_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_ph'];
                    $tempArray['ppcwe_cond_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_cond'];
                    $tempArray['ppcwe_chloride_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_chloride'];
                    $tempArray['ppcwe_palkalinity_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_palkalinity'];
                    $tempArray['ppcwe_phosphate_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_phosphate'];
                    $tempArray['ppcwe_sulfite_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_sulfite'];
                    $tempArray['ppcwe_clarity_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_clarity'];
                    $tempArray['ppcwe_created_by_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_created_by'];
                    $tempArray['ppcwe_created_on_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_created_on'];
                    $tempArray['ppcwe_modified_on_' . $engines[$i]] = $row['boiler-' . $engines[$i]]['ppcwe_modified_on'];
                } else {
                    $tempArray['ppcwe_ph_' . $engines[$i]] = null;
                    $tempArray['ppcwe_cond_' . $engines[$i]] = null;
                    $tempArray['ppcwe_chloride_' . $engines[$i]] = null;
                    $tempArray['ppcwe_palkalinity_' . $engines[$i]] = null;
                    $tempArray['ppcwe_phosphate_' . $engines[$i]] = null;
                    $tempArray['ppcwe_sulfite_' . $engines[$i]] = null;
                    $tempArray['ppcwe_clarity_' . $engines[$i]] = null;
                    $tempArray['ppcwe_created_by_' . $engines[$i]] = null;
                    $tempArray['ppcwe_created_on_' . $engines[$i]] = null;
                    $tempArray['ppcwe_modified_on_' . $engines[$i]] = null;
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

        $engines = $this->input->post('engines');

        $analysisWhereData['engines'] = [];
        foreach ($engines as $boiler) {
            array_push($analysisWhereData['engines'], $boiler);
        }
        $analysisWhereData['dateFrom'] = date('Y-m-d H:i:s', strtotime($this->input->post('month') . " 1, " . $this->input->post('year') . " 00.00.00"));
        $analysisWhereData['dateTo'] = date('Y-m-t H:i:s', strtotime($this->input->post('month') . " 1, " . $this->input->post('year') . " 24.00.00"));

        $this->session->set_userdata('analysisWhereData', $analysisWhereData);
    }

    public function getPPCWEgineBulidRecords() {
        $data['totalEngines'] = $this->db->get('tbl_engines')->num_rows();
        $data['engineRecords'] = $this->common_model->select('tbl_engines')->result();
        $data['totalBuildings'] = $this->db->get('tbl_buildings')->num_rows();
        $data['buildingRecords'] = $this->common_model->select('tbl_buildings')->result();
        echo json_encode($data);
    }

    public function getAnalysisRecords() {
        $data['filter_year'] = date('Y');
        $data['filter_month'] = date('m');
        $data['totalEngines'] = $this->db->get('tbl_engines')->num_rows();
        $data['enginesRecords'] = $enginesRecords = $this->common_model->select('tbl_engines')->result();
        $data['totalBuildings'] = $this->db->get('tbl_buildings')->num_rows();
        $data['buildingRecords'] = $buildingRecords = $this->common_model->select('tbl_buildings')->result();
        $f_date = date('Y-m-01', strtotime($data['filter_year'] . '-' . $data['filter_month'] . '-' . '01'));
// Last day of the month.
        $l_date = date('Y-m-t', strtotime($data['filter_year'] . '-' . $data['filter_month'] . '-' . '01'));

        if ($this->input->post('filter_date_from') && $this->input->post('filter_date_to')) {
            $data['filter_date_from'] = $f_date = date('Y-m-d', strtotime($this->input->post('filter_date_from')));
            $data['filter_date_to'] = $l_date = date('Y-m-d', strtotime($this->input->post('filter_date_to')));
        } else {
            
        }
        $where = array('ppcwe_datetime >=' => $f_date, 'ppcwe_datetime <=' => $l_date);
        $data['ppcw_engines_records'] = $ppcw_engines_records = $this->common_model->select('tbl_ppcw_engines', $where, '*', array('ppcwe_datetime' => 'ASC'))->result();
        $tableData = array();
        foreach ($ppcw_engines_records as $row) {
            $where1 = array(
                'ppcwe_id_fk' => $row->ppcwe_id
            );
            $details = $this->common_model->select('tbl_ppcw_engines_details', $where1)->result();
            $tableData[$row->ppcwe_id] = isset($details) ? $details : null;
        }
        $data['tableData'] = $tableData;

        $this->global['pageTitle'] = 'Report - Power Plant Cooling Water (Engines)';
        $this->global['pageIcon'] = 'server';


        // get all data of motor/engine in given range
        $engine_wise_data = array();
        $engineChartValues = array();
        foreach ($enginesRecords as $enginRow) {
            foreach ($ppcw_engines_records as $row) {

                $where1 = array(
                    'ppcwe_id_fk' => $row->ppcwe_id,
                    'ppcwe_details_type' => 'engine',
                    'ppcwe_details_type_id' => $enginRow->engine_id
                );
                $ppcwe_details_type_value = $this->common_model->select('tbl_ppcw_engines_details', $where1)->row()->ppcwe_details_type_value;
                $engine_wise_data[$enginRow->engine_id . '---' . $enginRow->engine_name][$row->ppcwe_datetime] = $ppcwe_details_type_value;
                $engineChartValues[$enginRow->engine_id][] = [$ppcwe_details_type_value, $ppcwe_details_type_value];
            }
        }

        $building_wise_data = array();
        $buildingChartValues = array();
        foreach ($buildingRecords as $buildingRow) {
            foreach ($ppcw_engines_records as $row) {

                $where1 = array(
                    'ppcwe_id_fk' => $row->ppcwe_id,
                    'ppcwe_details_type' => 'building',
                    'ppcwe_details_type_id' => $buildingRow->building_id
                );
                $ppcwe_details_type_value = $this->common_model->select('tbl_ppcw_engines_details', $where1)->row()->ppcwe_details_type_value;
                $building_wise_data[$buildingRow->building_id . '---' . $buildingRow->building_name][$row->ppcwe_datetime] = 
                $buildingChartValues[$buildingRow->building_id][] = [$ppcwe_details_type_value, $ppcwe_details_type_value];
            }
        }

        echo json_encode(array(
            'engineChartData' => $engine_wise_data,
            'buildingChartData' => $building_wise_data,
            'buildingRecords' => $buildingRecords,
            'enginesRecords' => $enginesRecords,
            'buildingChartData' => $building_wise_data,
            'engineChartValues' => $engineChartValues,
            'buildingChartValues' => $buildingChartValues
        ));
    }

}

?>