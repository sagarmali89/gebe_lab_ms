<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Contacts extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->isLoggedIn();
    }

    public function index() {
        if ($this->isAdmin() == TRUE && $this->isSuperUser() == TRUE) {
            $this->loadThis();
        } else {
//            $data['conRecords'] = $this->common_model->select('tbl_contacts')->result();
//            for ($i = 0; $i < sizeof($data['conRecords']); $i++) {
//                $data['conRecords'][$i]->con_company_name = $this->common_model->select('tbl_companies', array('com_id' => $data['conRecords'][$i]->con_company))->row()->com_name;
//            }
            $this->db->select('tbl_contacts.*, tbl_companies.com_name as con_company_name, tbl_area.area_name as con_area_name', FALSE)
                    ->join('tbl_companies', 'tbl_companies.com_id=tbl_contacts.con_company', 'left')
                    ->join('tbl_area', 'tbl_area.area_id=tbl_contacts.con_area_id', 'left');
            $data['custRecords'] = $this->db->get("tbl_contacts")->result();
            // echo $this->db->last_query();


            $this->global['pageTitle'] = 'Customer Listing';
            $data['page_icon'] = 'address-book';
            $this->loadViews("contacts", $this->global, $data, NULL);
        }
    }

    function create() {
        if ($this->isAdmin() == TRUE && $this->isSuperUser() == TRUE) {
            $this->loadThis();
        } else {
            $data['action'] = 'Create';
            $data['companies'] = $this->common_model->select('tbl_companies')->result();
            $data['districts'] = $this->common_model->select('tbl_district')->result();
            $this->global['pageTitle'] = 'Add New Customer';
            $data['page_icon'] = 'address-book';
            $this->loadViews("contactForm", $this->global, $data, NULL);
        }
    }

    function createContact() {
        if ($this->isAdmin() == TRUE && $this->isSuperUser() == TRUE) {
            $this->loadThis();
        } else {
            $postData = $this->input->post();
            $newConData = array(
                'con_company' => isset($postData['con_company']) ? $postData['con_company'] : "",
                'con_meter_no' => isset($postData['con_meter_no']) ? $postData['con_meter_no'] : "",
                'con_first_name' => isset($postData['con_first_name']) ? $postData['con_first_name'] : "",
                'con_last_name' => isset($postData['con_last_name']) ? $postData['con_last_name'] : "",
                'con_contact_name' => isset($postData['con_contact_name']) ? $postData['con_contact_name'] : "",
                'con_file_as' => isset($postData['con_file_as']) ? $postData['con_file_as'] : "",
                'con_email' => isset($postData['con_email']) ? $postData['con_email'] : "",
                'con_business_phone' => isset($postData['con_business_phone']) ? $postData['con_business_phone'] : "",
                'con_primary_phone' => isset($postData['con_primary_phone']) ? $postData['con_primary_phone'] : "",
                'con_mobile_phone' => isset($postData['con_mobile_phone']) ? $postData['con_mobile_phone'] : "",
                'con_address' => isset($postData['con_address']) ? $postData['con_address'] : "",
                'con_district_id' => isset($postData['con_district_id']) ? $postData['con_district_id'] : "",
                'con_area_id' => isset($postData['con_area_id']) ? $postData['con_area_id'] : "",
                'con_street_id' => isset($postData['con_street_id']) ? $postData['con_street_id'] : "",
                'con_city' => isset($postData['con_city']) ? $postData['con_city'] : "",
                'con_country' => isset($postData['con_country']) ? $postData['con_country'] : "",
                'con_webpage' => isset($postData['con_webpage']) ? $postData['con_webpage'] : "",
                'con_notes' => isset($postData['con_notes']) ? $postData['con_notes'] : "",
                'con_created_on' => date("Y-m-d H:i:s"),
                'con_modified_on' => date("Y-m-d H:i:s")
            );

            if ($this->common_model->insert('tbl_contacts', $newConData)) {
                $newConId = $this->common_model->lastQId();
                if (isset($postData['returnResponse'])) {
                    $result = array('class' => 'success', 'data' => array(
                            'id' => $newConId,
                            'name' => $newConData['con_first_name'] . " " . $newConData['con_last_name']
                    ));
                } else {
                    $fileToUploadCount = 0;
                    for ($i = 0; $i < sizeof($_FILES['attachments']['name']); $i++) {
                        if (!empty($_FILES['attachments']['name'][$i])) {
                            $fileToUploadCount++;
                        }
                    }
                    if ($fileToUploadCount > 0) {
                        $fileUploadResults = $this->do_upload('attachments', 'CON' . $newConId, 'contacts-attachments');
                    }
                    $con_attachments = "";
                    $fileUploadedCount = 0;
                    foreach ($fileUploadResults as $result) {
                        if ($result['status'] == 'success') {
                            $fileUploadedCount++;
                            if ($fileUploadedCount == 1) {
                                $con_attachments .= $result['upload_data']['file_name'];
                            } else {
                                $con_attachments .= "," . $result['upload_data']['file_name'];
                            }
                        }
                    }
                    if ($fileToUploadCount > 0) {
                        $this->common_model->update('tbl_contacts', array('con_id' => $newConId), array('con_attachments' => $con_attachments));
                        if ($fileUploadedCount == $fileToUploadCount) {
                            $result = array('class' => 'success', 'msg' => 'Customer created, all attachments uploaded!');
                        } else {
                            $result = array('class' => 'warning', 'msg' => 'Customer created but ' . ($fileToUploadCount - $fileUploadedCount) . ' attachments not uploaded!');
                        }
                    } else {
                        $result = array('class' => 'success', 'msg' => 'Customer created!');
                    }
                }
            } else {
                $result = array('class' => 'danger', 'msg' => 'Customer not created!');
            }

            if (isset($postData['returnResponse'])) {
                echo json_encode($result);
            } else {
                $this->session->set_flashdata('pageMessage', $result);
                redirect(base_url('contacts'));
            }
        }
    }

    function edit($conId) {
        if ($this->isAdmin() == TRUE && $this->isSuperUser() == TRUE) {
            $this->loadThis();
        } else {
            $data['contact'] = $this->common_model->select('tbl_contacts', array('con_id' => $conId))->row();
            $data['action'] = 'Edit';
            $data['companies'] = $this->common_model->select('tbl_companies')->result();
            $data['districts'] = $this->common_model->select('tbl_district')->result();
            $data['areas'] = $this->common_model->select('tbl_area')->result();
            $data['streets'] = $this->common_model->select('tbl_street')->result();
            $this->global['pageTitle'] = 'Edit Customer';
            $data['page_icon'] = 'address-book';
            $this->loadViews("contactForm", $this->global, $data, NULL);
        }
    }

    function editContact($conId) {
        if ($this->isAdmin() == TRUE && $this->isSuperUser() == TRUE) {
            $this->loadThis();
        } else {
            // $postData = $this->input->post();
            $newConData = array(
                'con_company' => $this->input->post('con_company'),
                'con_meter_no' => $this->input->post('con_meter_no'),
                'con_first_name' => $this->input->post('con_first_name'),
                'con_last_name' => $this->input->post('con_last_name'),
                'con_contact_name' => $this->input->post('con_contact_name'),
                'con_file_as' => $this->input->post('con_file_as'),
                'con_email' => $this->input->post('con_email'),
                'con_business_phone' => $this->input->post('con_business_phone'),
                'con_primary_phone' => $this->input->post('con_primary_phone'),
                'con_mobile_phone' => $this->input->post('con_mobile_phone'),
                'con_address' => $this->input->post('con_address'),
                'con_city' => $this->input->post('con_city'),
                'con_country' => $this->input->post('con_country'),
                'con_district_id' => $this->input->post('con_district_id'),
                'con_area_id' => $this->input->post('con_area_id'),
                'con_street_id' => $this->input->post('con_street_id'),
                'con_webpage' => $this->input->post('con_webpage'),
                'con_notes' => $this->input->post('con_notes'),
                'con_attachments' => $this->input->post('con_attachments'),
                'con_modified_on' => date("Y-m-d H:i:s")
            );

            if ($this->common_model->update('tbl_contacts', array('con_id' => $conId), $newConData)) {

                $fileToUploadCount = 0;
                for ($i = 0; $i < sizeof($_FILES['attachments']['name']); $i++) {
                    if ($_FILES['attachments']['name'][$i] != "") {
                        $fileToUploadCount++;
                    }
                }

                if ($fileToUploadCount > 0) {
                    $fileUploadResults = $this->do_upload('attachments', 'CON' . $conId, 'contacts-attachments');
                }

                $con_attachments = $this->input->post('con_attachments');
                $fileUploadedCount = 0;
                $errors = '';
                foreach ($fileUploadResults as $result) {
                    if ($result['status'] == 'success') {
                        $fileUploadedCount++;
                        if ($con_attachments == "") {
                            $con_attachments .= $result['upload_data']['file_name'];
                        } else {
                            $con_attachments .= "," . $result['upload_data']['file_name'];
                        }
                    } else if (trim($result['error']) != '') {
                        $errors .= '<br>' . trim($result['error']);
                    }

                    // print_r($result);
                }

                if ($fileToUploadCount > 0) {
                    $this->common_model->update('tbl_contacts', array('con_id' => $conId), array('con_attachments' => $con_attachments));
                    if ($fileUploadedCount == $fileToUploadCount) {
                        $result = array('class' => 'success', 'msg' => 'Customer updated, all attachments uploaded!');
                    } else {
                        $result = array('class' => 'warning', 'msg' => 'Customer updated but ' . ($fileToUploadCount - $fileUploadedCount) . ' attachments  not uploaded! <br> Error: ' . $errors);
                    }
                } else {
                    $result = array('class' => 'success', 'msg' => 'Customer updated!');
                }
            } else {
                $result = array('class' => 'danger', 'msg' => 'Customer not updated!');
            }
            $this->session->set_flashdata('pageMessage', $result);
            redirect(base_url('contacts'));
        }
    }

    function delete($conId) {
        if ($this->isAdmin() == TRUE && $this->isSuperUser() == TRUE) {
            $this->loadThis();
        } else {
            if ($this->common_model->delete('tbl_contacts', array('con_id' => $conId))) {
                $result = array('class' => 'success', 'msg' => 'Customer deleted!');
            } else {
                $result = array('class' => 'success', 'msg' => 'Customer not deleted!');
            }
            $this->session->set_flashdata('pageMessage', $result);
            redirect(base_url('contacts'));
        }
    }

    function view($conId) {
        if ($this->isAdmin() == TRUE && $this->isSuperUser() == TRUE) {
            $this->loadThis();
        } else {
            // $this->load->model('user_model');
            // $data['roles'] = $this->user_model->getUserRoles();

            $data['contact'] = $this->common_model->select('tbl_contacts', array('con_id' => $conId))->row();

            $data['action'] = 'View';

            $data['companies'] = $this->common_model->select('tbl_companies')->result();

            $this->global['pageTitle'] = 'Customer Details :: ' . PROJ_NAME;
            $data['page_icon'] = 'address-book';
            $this->loadViews("contactForm", $this->global, $data, NULL);
        }
    }

}

?>