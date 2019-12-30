<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class BaseController extends CI_Controller {

    protected $role = '';
    protected $vendorId = '';
    protected $name = '';
    protected $roleText = '';
    protected $global = array();
    protected $lastLogin = '';

    public function __construct() {
        parent::__construct();
        $this->tbl_boilers = 'tbl_boilers';
        $this->tbl_buildings = 'tbl_buildings';
        $this->tbl_engines = 'tbl_engines';
    }

    /**
     * Takes mixed data and optionally a status code, then creates the response
     *
     * @access public
     * @param array|NULL $data
     *        	Data to output to the user
     *        	running the script; otherwise, exit
     */
    public function response($data = NULL) {
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit();
    }

    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn() {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            redirect('login');
        } else {
            $this->role = $this->session->userdata('role');
            $this->vendorId = $this->session->userdata('userId');
            $this->name = $this->session->userdata('name');
            $this->roleText = $this->session->userdata('roleText');
            $this->lastLogin = $this->session->userdata('lastLogin');

            $this->global['name'] = $this->name;
            $this->global['role'] = $this->role;
            $this->global['role_text'] = $this->roleText;
            $this->global['last_login'] = $this->lastLogin;
        }
    }

    /**
     * This function is used to check the access
     */
    function isAdmin() {
        if ($this->role != ROLE_ADMIN) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check the access
     */
    function isTicketter() {
        if ($this->role != ROLE_ADMIN || $this->role != ROLE_MANAGER) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to load the set of views
     */
    function loadThis() {
        $this->global ['pageTitle'] = 'CodeInsect : Access Denied';

        $this->load->view('includes/header', $this->global);
        $this->load->view('access');
        $this->load->view('includes/footer');
    }

    /**
     * This function is used to logged out user from system
     */
    function logout() {
        $this->session->sess_destroy();

        redirect('login');
    }

    /**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL) {

        $this->load->view('includes/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }

    /**
     * This function used provide the pagination resources
     * @param {string} $link : This is page link
     * @param {number} $count : This is page count
     * @param {number} $perPage : This is records per page limit
     * @return {mixed} $result : This is array of records and pagination data
     */
    function paginationCompress($link, $count, $perPage = 10, $segment = SEGMENT) {
        $this->load->library('pagination');

        $config ['base_url'] = base_url() . $link;
        $config ['total_rows'] = $count;
        $config ['uri_segment'] = $segment;
        $config ['per_page'] = $perPage;
        $config ['num_links'] = 5;
        $config ['full_tag_open'] = '<nav><ul class="pagination">';
        $config ['full_tag_close'] = '</ul></nav>';
        $config ['first_tag_open'] = '<li class="arrow">';
        $config ['first_link'] = 'First';
        $config ['first_tag_close'] = '</li>';
        $config ['prev_link'] = 'Previous';
        $config ['prev_tag_open'] = '<li class="arrow">';
        $config ['prev_tag_close'] = '</li>';
        $config ['next_link'] = 'Next';
        $config ['next_tag_open'] = '<li class="arrow">';
        $config ['next_tag_close'] = '</li>';
        $config ['cur_tag_open'] = '<li class="active"><a href="#">';
        $config ['cur_tag_close'] = '</a></li>';
        $config ['num_tag_open'] = '<li>';
        $config ['num_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li class="arrow">';
        $config ['last_link'] = 'Last';
        $config ['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = $config ['per_page'];
        $segment = $this->uri->segment($segment);

        return array(
            "page" => $page,
            "segment" => $segment
        );
    }

    function do_upload($file, $filePrefix, $folder) {
        $fileUploadResults = [];

        if (!is_dir('./uploads/' . $folder)) {
            mkdir('./uploads/' . $folder, 0777, TRUE);
        }

        for ($i = 0; $i < sizeof($_FILES[$file]['name']); $i++) {
            $pref = $filePrefix . time();
            if (!empty($_FILES[$file]['name'][$i])) {
                // Define new $_FILES array - $_FILES['file']
                $_FILES['file']['name'] = $_FILES[$file]['name'][$i];
                $_FILES['file']['type'] = $_FILES[$file]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$file]['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES[$file]['error'][$i];
                $_FILES['file']['size'] = $_FILES[$file]['size'][$i];

                $config['allowed_types'] = 'gif|jpg|png|pdf|xls|ppt|doc';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $config['upload_path'] = './uploads/' . $folder;
                $config['file_name'] = $pref . '-' . str_replace(' ', '', $_FILES[$file]['name'][$i]);

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    array_push($fileUploadResults, array('status' => 'success', 'upload_data' => $this->upload->data()));
                } else {
                    array_push($fileUploadResults, array('status' => 'failure', 'error' => $this->upload->display_errors(),'config' =>$config));
                }
            }
        }

        return $fileUploadResults;
    }

}
