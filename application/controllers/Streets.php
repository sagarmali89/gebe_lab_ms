<?php 

if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/BaseController.php';

class Streets extends BaseController {
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->isLoggedIn();   
    }

    public function index() {
        if($this->isAdmin() == TRUE && $this->isSuperUser() == TRUE) {
            $this->loadThis();
        } else {        
            $data['areaRecords'] = $this->common_model->getAddress()->result();

            $this->global['pageTitle'] = 'Street Listing';
            $data['page_icon'] = 'road';
            $this->loadViews("streetRecords", $this->global, $data, NULL);
        }
    }  
}

?>