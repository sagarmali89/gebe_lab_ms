<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

use Dompdf\Dompdf;

class Water_Analysis_Customers extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->isLoggedIn();
    }

    public function listing() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            //   $data['custRecords'] = $this->common_model->select('tbl_consumers')->result();
            $this->db->select('tbl_contacts.con_id, CONCAT(tbl_contacts.con_first_name ," ", tbl_contacts.con_last_name) AS full_name, tbl_area.area_name as con_area_name', FALSE)
                    ->join('tbl_area', 'tbl_area.area_id=tbl_contacts.con_area_id', 'left');
            $data['custRecords'] = $this->db->get("tbl_contacts")->result();
            unset($_SESSION['analysisCustWhereData']);
            $analysisCustWhereData['consumer'] = "ALL";
            $dateFrom = new DateTime('first day of this month');
            $analysisCustWhereData['dateFrom'] = $dateFrom->format('j M Y');
            $analysisCustWhereData['dateTo'] = date('j M Y');
            $this->session->set_userdata('analysisCustWhereData', $analysisCustWhereData);
            $this->global['pageTitle'] = 'Listing - Water Analysis For Customer';
            $this->global['pageIcon'] = 'tint';
            /// $data['wa_types'] = $this->common_model->select('wa_types')->result();

            $this->loadViews("customers/list_water_analysis", $this->global, $data, NULL);
        }
    }

    public function manage() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->db->select('tbl_contacts.con_id, CONCAT(tbl_contacts.con_first_name ," ", tbl_contacts.con_last_name) AS full_name, tbl_area.area_name as con_area_name', FALSE)
                    ->join('tbl_area', 'tbl_area.area_id=tbl_contacts.con_area_id', 'left');
            $data['custRecords'] = $this->db->get("tbl_contacts")->result();
            $this->global['pageTitle'] = 'Manage - Water Analysis For Customer';
            $this->global['pageIcon'] = 'tint';
            $this->loadViews("customers/manage_analysis", $this->global, $data, NULL);
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
//            $data['conRecords'] = $this->common_model->select('tbl_consumers', '', 'con_id, con_first_name, con_last_name')->result();
//            $this->global['pageTitle'] = 'Report - Water Analysis For Customer';
//            $this->global['pageIcon'] = 'tint';
//            $data['wa_types'] = $this->common_model->select('wa_types')->result();
//
//            $this->loadViews("customers/report_analysis", $this->global, $data, NULL);

            $this->db->select('tbl_contacts.con_id, CONCAT(tbl_contacts.con_first_name ," ", tbl_contacts.con_last_name) AS full_name, tbl_area.area_name as con_area_name', FALSE)
                    ->join('tbl_area', 'tbl_area.area_id=tbl_contacts.con_area_id', 'left');
            $data['custRecords'] = $this->db->get("tbl_contacts")->result();
            $this->global['pageTitle'] = 'Report - Water Analysis For Customer';
            $this->global['pageIcon'] = 'tint';
            $this->loadViews("customers/report_analysis", $this->global, $data, NULL);
        }
    }

    public function saveChanges() {
        $postData = $this->input->post();

        // if (isset($postData['date']) && isset($postData['time']) && isset($postData['consumer'])) {
        if (isset($postData['date']) && isset($postData['time']) && isset($postData['customer_id'])) {
            $where = NULL;

            $data['ana_' . $postData['column']] = $postData['value'];

            if ($postData['column'] == 'cond') {
                $data['ana_tds'] = $postData['value'] * 0.51;
            }

            $prevRecordObj = $this->common_model->select('tbl_water_analysis_customer', array(
                        'ana_date' => date('Y-m-d', strtotime($postData['date'])),
                        'ana_time' => $postData['time'],
                        // 'ana_consumer' => $postData['consumer'],
                        'ana_customer_id' => $postData['customer_id'],
                            ), 'ana_id')->result();
//echo $this->db->last_query();
            if (sizeof($prevRecordObj) > 0) {
                $where = array(
                    'ana_id' => $prevRecordObj[0]->ana_id,
                );
            } else {
                $data['ana_date'] = date('Y-m-d', strtotime($postData['date']));
                $data['ana_time'] = $postData['time'];
                //  $data['ana_consumer'] = $postData['consumer'];
                $data['ana_customer_id'] = $postData['customer_id'];
            }

            if ($where !== NULL) {
                $data['ana_modified_on'] = date('Y-m-d H:i:s');
                if ($this->common_model->update('tbl_water_analysis_customer', $where, $data)) {
                    echo json_encode(array('class' => 'success', 'msg' => 'Record Updated!'));
                } else {
                    echo json_encode(array('class' => 'danger', 'msg' => 'Record Not Updated!'));
                }
            } else {
                $data['ana_created_by'] = $this->vendorId;
                $data['ana_created_on'] = date('Y-m-d H:i:s');
                $data['ana_modified_on'] = date('Y-m-d H:i:s');
                if ($this->common_model->insert('tbl_water_analysis_customer', $data)) {
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

            if ($this->common_model->delete('tbl_water_analysis_customer', $where)) {
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
        $oldAnaRecords = array();
        if (isset($postData['customer_id']) && isset($postData['date_from']) && isset($postData['date_to'])) {
            $oldAnaRecords = $this->common_model->select('tbl_water_analysis_customer', array(
                        // 'ana_wa_type_id_fk' => $postData['wa_type'],
                        'ana_customer_id' => $postData['customer_id'],
                        'ana_date >=' => date('Y-m-d', strtotime($postData['date_from'])),
                        'ana_date <=' => date('Y-m-d', strtotime($postData['date_to'])),
                            ), "*", ['ana_date', 'asc'])->result();
            for ($i = 0; $i < sizeof($oldAnaRecords); $i++) {
                $oldAnaRecords[$i]->ana_date = date('j M Y', strtotime($oldAnaRecords[$i]->ana_date));
                $oldAnaRecords[$i]->ana_time_for_sort = strtotime($oldAnaRecords[$i]->ana_time);
            }
        } else if (isset($postData['customer_id']) && isset($postData['date']) && isset($postData['time'])) {
            $oldAnaRecords = $this->common_model->select('tbl_water_analysis_customer', array(
                        'ana_customer_id' => $postData['customer_id'],
                        'ana_date' => date('Y-m-d', strtotime($postData['date'])),
                        'ana_time' => $postData['time'],
                    ))->row();
            // echo $this->db->last_query();
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





        if (isset($this->session->userdata('analysisCustWhereData')['customer_id'])) {
            $this->db->select(
                    'tbl_water_analysis_customer.ana_id,'
                    . 'tbl_water_analysis_customer.ana_date,'
                    . 'tbl_water_analysis_customer.ana_leg,'
                    . 'tbl_water_analysis_customer.ana_color,'
                    . 'tbl_water_analysis_customer.ana_clost,'
                    . 'tbl_water_analysis_customer.ana_hpc,'
                    . 'tbl_water_analysis_customer.ana_ent,'
                    . 'tbl_water_analysis_customer.ana_ec,'
                    . 'tbl_water_analysis_customer.ana_tc,'
                    . 'tbl_water_analysis_customer.ana_lead,'
                    . 'tbl_water_analysis_customer.ana_lsi,'
                    . 'tbl_water_analysis_customer.ana_turb,'
                    . 'tbl_water_analysis_customer.ana_chlone,'
                    . 'tbl_water_analysis_customer.ana_time,'
                    . 'tbl_water_analysis_customer.ana_temp,'
                    . 'tbl_water_analysis_customer.ana_ph,'
                    . 'tbl_water_analysis_customer.ana_cond,'
                    . 'tbl_water_analysis_customer.ana_tds,'
                    . 'tbl_water_analysis_customer.ana_chload,'
                    . 'tbl_water_analysis_customer.ana_talk,'
                    . 'tbl_water_analysis_customer.ana_cahard,'
                    . 'tbl_water_analysis_customer.ana_iron,'
                    . 'tbl_water_analysis_customer.ana_silica,'
                    . 'tbl_water_analysis_customer.ana_alum,'
                    //  . 'tbl_water_analysis_customer.ana_status');
                    //microbilogy
                    . 'tbl_water_analysis_customer.ana_bact_total_coli,'
                    . 'tbl_water_analysis_customer.ana_bact_e_coli,'
                    . 'tbl_water_analysis_customer.ana_bact_enterococci,'
                    . 'tbl_water_analysis_customer.ana_bact_clostridium,'
                    . 'tbl_water_analysis_customer.ana_bact_legionella,'
                    . 'tbl_water_analysis_customer.ana_bact_heterotrophic_plate_count,'
                    //Other
                    . 'tbl_water_analysis_customer.ana_report_sent'
            );

            $this->db->from('tbl_water_analysis_customer');
            $where['tbl_water_analysis_customer.ana_customer_id'] = $this->session->userdata('analysisCustWhereData')['customer_id'];
            $where['tbl_water_analysis_customer.ana_date >='] = date('Y-m-d', strtotime($this->session->userdata('analysisCustWhereData')['dateFrom']));
            $where['tbl_water_analysis_customer.ana_date <='] = date('Y-m-d', strtotime($this->session->userdata('analysisCustWhereData')['dateTo']));
            $this->db->where($where);
            $this->db->limit($rowperpage, $row);
            $this->db->order_by($columnName, $columnSortOrder);
            $data = $this->db->get()->result_array();
            $totalRecordwithFilter = $totalRecords = count($data);
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

    public function getRecordsForDataTable2() {
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value

        $data[] = array('ana_date' => 1, 'ana_status' => 'ghgh', 'ana_time' => '2:00 PM', 'ana_temp' => '67', 'ana_ph' => '5', 'ana_cond' => '2');
        $data[] = array('ana_date' => 1, 'ana_status' => 'ghgh', 'ana_time' => '2:00 PM', 'ana_temp' => '67', 'ana_ph' => '5', 'ana_cond' => '2');
        $data[] = array('ana_date' => 1, 'ana_status' => 'ghgh', 'ana_time' => '2:00 PM', 'ana_temp' => '67', 'ana_ph' => '5', 'ana_cond' => '2');
        $data[] = array('ana_date' => 1, 'ana_status' => 'ghgh', 'ana_time' => '2:00 PM', 'ana_temp' => '67', 'ana_ph' => '5', 'ana_cond' => '2');
        $data[] = array('ana_date' => 1, 'ana_status' => 'ghgh', 'ana_time' => '2:00 PM', 'ana_temp' => '67', 'ana_ph' => '5', 'ana_cond' => '2');
        $data[] = array('ana_date' => 1, 'ana_status' => 'ghgh', 'ana_time' => '2:00 PM', 'ana_temp' => '67', 'ana_ph' => '5', 'ana_cond' => '2');
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => 6,
            "iTotalDisplayRecords" => 6,
            "aaData" => $data
        );
        echo json_encode($response);
    }

    public function updateFilterSession() {
        unset($_SESSION['analysisCustWhereData']);
        // $analysisCustWhereData['consumer'] = $this->input->post('consumer');
        $analysisCustWhereData['customer_id'] = $this->input->post('customer_id');
//        $analysisCustWhereData['ana_wa_subtype_id_fk'] = $this->input->post('wa_subtype');
        $analysisCustWhereData['dateFrom'] = $this->input->post('dateFrom');
        $analysisCustWhereData['dateTo'] = $this->input->post('dateTo');
        $this->session->set_userdata('analysisCustWhereData', $analysisCustWhereData);
    }

    public function customerReport() {
        $this->load->view('templates/customer_report');
    }
    public function sendingMailSetup() {
        $ana_id = $this->input->post('ana_id');
        if ($ana_id > 0) {
            $customer_data = $this->common_model->select('tbl_water_analysis_customer', array('ana_id' => $ana_id))->row();
            $maildata['email_to'] = "s.d.mali89@gmail.com";
            $maildata['email_user'] = "s.d.mali89@gmail.com"; // email from 
            $maildata['email_password'] = "xrwilsqaductgiye"; // email password 
            $maildata['subject'] = "This is Test mail";
            $maildata['message'] = "Customer Email temlate";


            $dompdf = new Dompdf();
            $attachment = $this->load->view('templates/customer_report', '', TRUE);
           // print_r($attachment);
            $dompdf->loadHtml($attachment);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
          //   $dompdf->stream();

            $output1 = $dompdf->output();
          //  echo $output;
            $path = './uploads/customers_report/' . time() . '_Report.pdf';
            file_put_contents($path, $output1);
            echo json_encode(array('status' => 0, 'message' => 'Anyalysis not found!'));
            exit();
            $mailResp = $this->sendEmail($maildata, $attachment);
            if ($mailResp == 1) {
                echo json_encode(array('status' => 1, 'message' => $mailResp));
            } else {
                echo json_encode(array('status' => 0, 'message' => $mailResp));
            }
        } else {
            echo json_encode(array('status' => 0, 'message' => 'Anyalysis not found!'));
        }
        exit();
    }

    public function sendEmail($maildata, $attachment = null) {

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $maildata['email_user'],
            'smtp_pass' => $maildata['email_password'],
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );


        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($maildata['email_user']);
        $this->email->to($maildata['email_to']);
        $this->email->subject($maildata['subject']);
        $this->email->message($maildata['message']);

        if ($attachment != null) {
            $this->email->attach($attachment, 'attachement', 'water_analysis_report.pdf', 'application/pdf');
        }
        // $this->email->attach('C:\Users\xyz\Desktop\images\abc.png');
        if ($this->email->send()) {
            return 1;
        } else {
            return $this->email->print_debugger();
        }
    }

}

?>