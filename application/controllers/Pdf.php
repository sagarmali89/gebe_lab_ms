<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

use Dompdf\Dompdf;

class Pdf extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->isLoggedIn();
    }

    public function index() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            set_time_limit(0);
            //    $data['conRecords'] = $this->common_model->select('tbl_customers')->result();
            //   $this->global['pageTitle'] = 'Customer Listing';
            //  $this->global['pageIcon'] = 'address-book';
            // instantiate and use the dompdf class
//            ob_start();
//            $page = file_get_contents('https://www.google.com/');
            // $page = $this->load->view('customer_report_temp', '', true);
            //  echo $page;
            //  die();
//            $html = ob_get_clean();
          //  $this->load->view('customer_report_temp');
          //  $html = $this->output->get_output();
            $html = file_get_contents('http://localhost/gebe_lab_ms/login/customerReport');
            //  echo $html;
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->render();
            //  $output = $dompdf->output();
            $dompdf->stream();
        }
    }

    function create() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            // $this->load->model('user_model');
            // $data['roles'] = $this->user_model->getUserRoles();

            $data['action'] = 'Create';
            $data['companies'] = ['Collaborative', 'GEBE', 'GEBE NV', 'GEBE N.V.', 'N.V. GEBE'];
            $this->global['pageTitle'] = 'New Customer';
            $this->global['pageIcon'] = 'address-book';
            $this->loadViews("customerForm", $this->global, $data, NULL);
        }
    }

    function createCustomer() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $newConData = array(
                'cust_company' => $this->input->post('cust_company'),
                'cust_meter_no' => $this->input->post('cust_meter_no'),
                'cust_full_name' => $this->input->post('cust_full_name'),
                'cust_last_name' => $this->input->post('cust_last_name'),
                'cust_email' => $this->input->post('cust_email'),
                'cust_business_phone' => $this->input->post('cust_business_phone'),
                'cust_primary_phone' => $this->input->post('cust_primary_phone'),
                'cust_mobile_phone' => $this->input->post('cust_mobile_phone'),
                'cust_webpage' => $this->input->post('cust_webpage'),
                'cust_notes' => $this->input->post('cust_notes'),
                'cust_created_on' => date("Y-m-d H:i:s"),
                'cust_modified_on' => date("Y-m-d H:i:s")
            );

            if ($this->common_model->insert('tbl_customers', $newConData)) {
                $newConId = $this->common_model->lastQId();

                $fileToUploadCount = 0;
                for ($i = 0; $i < sizeof($_FILES['attachments']['name']); $i++) {
                    if (!empty($_FILES['attachments']['name'][$i])) {
                        $fileToUploadCount++;
                    }
                }
                if ($fileToUploadCount > 0) {
                    $fileUploadResults = $this->do_upload('attachments', 'CON' . $newConId, 'customers-attachments');
                }

                $cust_attachments = "";
                $fileUploadedCount = 0;
                foreach ($fileUploadResults as $result) {
                    if ($result['status'] == 'success') {
                        $fileUploadedCount++;
                        if ($fileUploadedCount == 1) {
                            $cust_attachments .= $result['upload_data']['file_name'];
                        } else {
                            $cust_attachments .= "," . $result['upload_data']['file_name'];
                        }
                    }
                }

                if ($fileToUploadCount > 0) {
                    $this->common_model->update('tbl_customers', array('cust_id' => $newConId), array('cust_attachments' => $cust_attachments));
                    if ($fileUploadedCount == $fileToUploadCount) {
                        $result = array('class' => 'success', 'msg' => 'Customer created, all attachments uploaded!');
                    } else {
                        $result = array('class' => 'warning', 'msg' => 'Customer created but ' . ($fileToUploadCount - $fileUploadedCount) . ' attachments not uploaded!');
                    }
                } else {
                    $result = array('class' => 'success', 'msg' => 'Customer created!');
                }
            } else {
                $result = array('class' => 'danger', 'msg' => 'Customer not created!');
            }
            $this->session->set_flashdata('pageMessage', $result);
            redirect(base_url('customers'));
        }
    }

    function edit($conId) {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            // $this->load->model('user_model');
            // $data['roles'] = $this->user_model->getUserRoles();

            $data['customer'] = $this->common_model->select('tbl_customers', array('cust_id' => $conId))->row();
            $data['action'] = 'Edit';
            //  $data['companies'] = ['Collaborative', 'GEBE', 'GEBE NV', 'GEBE N.V.', 'N.V. GEBE'];
            $this->global['pageTitle'] = 'Edit Customer';
            $this->global['pageIcon'] = 'address-book';
            $this->loadViews("customerForm", $this->global, $data, NULL);
        }
    }

    function editCustomer($conId) {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $newConData = array(
                'cust_full_name' => $this->input->post('cust_full_name'),
                'cust_last_name' => $this->input->post('cust_last_name'),
                'cust_email' => $this->input->post('cust_email'),
                'cust_business_phone' => $this->input->post('cust_business_phone'),
                'cust_primary_phone' => $this->input->post('cust_primary_phone'),
                'cust_mobile_phone' => $this->input->post('cust_mobile_phone'),
                'cust_webpage' => $this->input->post('cust_webpage'),
                'cust_notes' => $this->input->post('cust_notes'),
                'cust_attachments' => $this->input->post('cust_attachments'),
                'cust_modified_on' => date("Y-m-d H:i:s")
            );

            if ($this->common_model->update('tbl_customers', array('cust_id' => $conId), $newConData)) {

                $fileToUploadCount = 0;
                for ($i = 0; $i < sizeof($_FILES['attachments']['name']); $i++) {
                    if ($_FILES['attachments']['name'][$i] != "") {
                        $fileToUploadCount++;
                    }
                }

                if ($fileToUploadCount > 0) {
                    $fileUploadResults = $this->do_upload('attachments', 'CON' . $conId, 'customers-attachments');
                }

                $cust_attachments = $this->input->post('cust_attachments');
                $fileUploadedCount = 0;
                foreach ($fileUploadResults as $result) {
                    if ($result['status'] == 'success') {
                        $fileUploadedCount++;
                        if ($cust_attachments == "") {
                            $cust_attachments .= $result['upload_data']['file_name'];
                        } else {
                            $cust_attachments .= "," . $result['upload_data']['file_name'];
                        }
                    }
                }

                if ($fileToUploadCount > 0) {
                    $this->common_model->update('tbl_customers', array('cust_id' => $conId), array('cust_attachments' => $cust_attachments));
                    if ($fileUploadedCount == $fileToUploadCount) {
                        $result = array('class' => 'success', 'msg' => 'Customer updated, all attachments uploaded!');
                    } else {
                        $result = array('class' => 'warning', 'msg' => 'Customer updated but ' . ($fileToUploadCount - $fileUploadedCount) . ' attachments  not uploaded!');
                    }
                } else {
                    $result = array('class' => 'success', 'msg' => 'Customer updated!');
                }
            } else {
                $result = array('class' => 'danger', 'msg' => 'Customer not updated!');
            }
            $this->session->set_flashdata('pageMessage', $result);
            redirect(base_url('customers'));
        }
    }

    function delete($conId) {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            if ($this->common_model->delete('tbl_customers', array('cust_id' => $conId))) {
                $result = array('class' => 'success', 'msg' => 'Customer deleted!');
            } else {
                $result = array('class' => 'success', 'msg' => 'Customer not deleted!');
            }
            $this->session->set_flashdata('pageMessage', $result);
            redirect(base_url('customers'));
        }
    }

    function view($conId) {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['customer'] = $this->common_model->select('tbl_customers', array('cust_id' => $conId))->row();
            $data['action'] = 'View';
            $data['companies'] = ['Collaborative', 'GEBE', 'GEBE NV', 'GEBE N.V.', 'N.V. GEBE'];
            $this->global['pageTitle'] = 'Customer Details';
            $this->global['pageIcon'] = 'address-book';
            $this->loadViews("customerForm", $this->global, $data, NULL);
        }
    }

}

?>