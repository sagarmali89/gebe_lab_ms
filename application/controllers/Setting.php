<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Setting extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
        $this->load->model('common_model');
        $this->tbl_wa_subtypes = 'wa_subtypes';
    }

    public function index() {
        // $this->global['pageTitle'] = 'Lab Project : Dashboard';
        // $this->loadViews("dashboard", $this->global, $data , NULL);
        redirect('setting/streets');
    }

    public function companies() {
        $this->global['pageTitle'] = 'Company Records';
        $data['module'] = 'Company';
        $data['module_table'] = 'tbl_companies';
        $data['module_prefix'] = 'com_';
        $data['records'] = $this->common_model->select('tbl_companies')->result();
        $this->loadViews("settingRecords", $this->global, $data, NULL);
    }

    public function streets() {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $data['areaRecords'] = $this->common_model->getAddress()->result();
            $this->global['pageTitle'] = 'Streets Record';
            $this->global['pageIcon'] = 'map';
            $this->loadViews("streetRecords", $this->global, $data, NULL);
        }
    }

    public function district() {
        $this->global['pageTitle'] = 'District Record';
        $this->global['pageIcon'] = 'map';
        $data['module'] = 'District';
        $data['module_table'] = 'tbl_district';
        $data['module_prefix'] = 'dis_';
        $data['records'] = $this->common_model->select('tbl_district')->result();
        $this->loadViews("settingRecords", $this->global, $data, NULL);
    }

    public function area() {
        $this->global['pageTitle'] = 'Areas/Locations Record';
        $this->global['pageIcon'] = 'map';
        $data['records'] = $this->common_model->selectArea()->result();
        $this->loadViews("areaRecords", $this->global, $data, NULL);
    }

    public function addWASubType() {
        if ($this->isAdmin() == TRUE) {
            $this->session->set_flashdata('error', 'You are not authorized to create sub type!');
        } else {
            $insertInfo['wa_type_id_fk'] = $this->input->post('wa_type_id_fk');
            $insertInfo['wa_subtype_location_id_fk'] = $this->input->post('wa_subtype_location_id_fk');
            $insertInfo['id_code'] = $this->input->post('id_code');
            $insertInfo['wa_subtype_name'] = $this->input->post('wa_subtype_name');
            $insertInfo['createdDT'] = date('Y-m-d H:i:s');
            $result = $this->common_model->addData($this->tbl_wa_subtypes, $insertInfo);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Subtype created successfully');
            } else {
                $this->session->set_flashdata('error', 'Subtype creation failed');
            }
        }
        redirect('setting/wa_subtypes');
    }

    public function updateWASubType() {
        if ($this->isAdmin() == TRUE) {
            $this->session->set_flashdata('error', 'You are not authorized to update sub type!');
        } else {
            $whereInfo['wa_subtype_id'] = $this->input->post('wa_subtype_id');
            $updateInfo['wa_type_id_fk'] = $this->input->post('wa_type_id_fk');
            $updateInfo['wa_subtype_location_id_fk'] = $this->input->post('wa_subtype_location_id_fk');
            $updateInfo['id_code'] = $this->input->post('id_code');
            $updateInfo['wa_subtype_name'] = $this->input->post('wa_subtype_name');
            $result = $this->common_model->update($this->tbl_wa_subtypes, $whereInfo, $updateInfo);
            $this->session->set_flashdata('success', 'Subtype updated successfully');
        }
       // echo $this->db->last_query();
       // die('');
        redirect('setting/wa_subtypes');
    }

    public function wa_subtypes() {
        $this->global['pageTitle'] = 'Water Analysis Sub Types';
        $this->global['pageIcon'] = 'tint';
        $data['locations'] = $this->common_model->select('tbl_area', $where = "", $what = "*", $order = array('area_name','ASC'))->result();
        $data['wa_types'] = $this->common_model->select('wa_types', $where = "", $what = "*", $order = array('wa_name','ASC'))->result();
        $data['records'] = $this->common_model->selectWASubTypes()->result();
        $data['tbl_name'] = $this->tbl_wa_subtypes;
        $this->loadViews("waRecords", $this->global, $data, NULL);
    }

    public function boilers() {
        $this->global['pageTitle'] = 'Power Plant Cooling Water - Boilers';
        $this->global['pageIcon'] = 'server';
        $data['records'] = $this->common_model->select($this->tbl_boilers)->result();
        $data['tbl_name'] = $this->tbl_boilers;
        $this->loadViews("boilers", $this->global, $data, NULL);
    }

    public function addBoiler() {
        if ($this->isAdmin() == TRUE) {
            $this->session->set_flashdata('error', 'You are not authorized to create boiler!');
        } else {
            $insertInfo['boiler_id_code'] = $this->input->post('boiler_id_code');
            $insertInfo['boiler_name'] = $this->input->post('boiler_name');
            $insertInfo['createdBy'] = $this->vendorId;
            ;
            $insertInfo['createdDT'] = date('Y-m-d H:i:s');
            $result = $this->common_model->addData($this->tbl_boilers, $insertInfo);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Boiler created successfully');
            } else {
                $this->session->set_flashdata('error', 'Boiler creation failed');
            }
        }
        redirect('setting/boilers');
    }

    public function updateBoiler() {
        if ($this->isAdmin() == TRUE) {
            $this->session->set_flashdata('error', 'You are not authorized to update boiler!');
        } else {
            $whereInfo['boiler_id'] = $this->input->post('boiler_id');
            $updateInfo['boiler_id_code'] = $this->input->post('boiler_id_code');
            $updateInfo['boiler_name'] = $this->input->post('boiler_name');
            $result = $this->common_model->update($this->tbl_boilers, $whereInfo, $updateInfo);
            $this->session->set_flashdata('success', 'Boiler updated successfully');
        }
        redirect('setting/boilers');
    }

    public function engines() {
        $this->global['pageTitle'] = 'Power Plant Cooling Water - Engines';
        $this->global['pageIcon'] = 'server';
        $data['records'] = $this->common_model->select($this->tbl_engines)->result();
        $data['tbl_name'] = $this->tbl_engines;
        $this->loadViews("engines", $this->global, $data, NULL);
    }

    public function addEngine() {
        if ($this->isAdmin() == TRUE) {
            $this->session->set_flashdata('error', 'You are not authorized to create Engine!');
        } else {
            $insertInfo['engine_id_code'] = $this->input->post('engine_id_code');
            $insertInfo['engine_name'] = $this->input->post('engine_name');
            $insertInfo['createdBy'] = $this->vendorId;
            ;
            $insertInfo['createdDT'] = date('Y-m-d H:i:s');
            $result = $this->common_model->addData($this->tbl_engines, $insertInfo);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Engine created successfully');
            } else {
                $this->session->set_flashdata('error', 'Engine creation failed');
            }
        }
        redirect('setting/engines');
    }

    public function updateEngine() {
        if ($this->isAdmin() == TRUE) {
            $this->session->set_flashdata('error', 'You are not authorized to update Engine!');
        } else {
            $whereInfo['engine_id'] = $this->input->post('engine_id');
            $updateInfo['engine_id_code'] = $this->input->post('engine_id_code');
            $updateInfo['engine_name'] = $this->input->post('engine_name');
            $result = $this->common_model->update($this->tbl_engines, $whereInfo, $updateInfo);
            $this->session->set_flashdata('success', 'Engine updated successfully');
        }
        redirect('setting/engines');
    }

    public function buildings() {
        $this->global['pageTitle'] = 'Power Plant Cooling Water - Buildings';
        $this->global['pageIcon'] = 'server';
        $data['records'] = $this->common_model->select($this->tbl_buildings)->result();
        $data['tbl_name'] = $this->tbl_buildings;
        $this->loadViews("buildings", $this->global, $data, NULL);
    }

    public function addBuilding() {
        if ($this->isAdmin() == TRUE) {
            $this->session->set_flashdata('error', 'You are not authorized to create Building!');
        } else {
            $insertInfo['building_id_code'] = $this->input->post('building_id_code');
            $insertInfo['building_name'] = $this->input->post('building_name');
            $insertInfo['createdBy'] = $this->vendorId;
            ;
            $insertInfo['createdDT'] = date('Y-m-d H:i:s');
            $result = $this->common_model->addData($this->tbl_buildings, $insertInfo);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Building created successfully');
            } else {
                $this->session->set_flashdata('error', 'Building creation failed');
            }
        }
        redirect('setting/buildings');
    }

    public function updateBuilding() {
        if ($this->isAdmin() == TRUE) {
            $this->session->set_flashdata('error', 'You are not authorized to update Building!');
        } else {
            $whereInfo['building_id'] = $this->input->post('building_id');
            $updateInfo['building_id_code'] = $this->input->post('building_id_code');
            $updateInfo['building_name'] = $this->input->post('building_name');
            $result = $this->common_model->update($this->tbl_buildings, $whereInfo, $updateInfo);
            $this->session->set_flashdata('success', 'Building updated successfully');
        }
        redirect('setting/buildings');
    }

    function deleteRow() {
        if ($this->isAdmin() == TRUE) {
            //$this->session->set_flashdata('error', 'You are not authorized to delete sub type!');
            echo json_encode(array('status' => FALSE, 'message' => 'You are not authorized to delete sub type!'));
        } else {
            $del_tbl = $this->input->post('del_tbl');
            if ($del_tbl == $this->tbl_wa_subtypes) {
                $where['wa_subtype_id'] = $this->input->post('del_id');
            }
            $result = $this->common_model->delete($del_tbl, $where);
            if ($result > 0) {
                echo json_encode(array('status' => TRUE));
            } else {
                echo json_encode(array('status' => FALSE, 'message' => 'Unable to delete please try again later!!'));
            }
        }
    }

    public function getForm($module = "", $method = "create", $id = "", $name = "", $disId = "", $areaId = "") {
        $data['module'] = $module;
        $data['method'] = $method;
        $data['id'] = $id;
        $data['name'] = $name;


        if ($module == 'Area') {
            $data['districts'] = $this->common_model->select('tbl_district')->result();

            if ($disId !== "") {
                $data['fk_dis_id'] = $disId;
            }
        }

        if ($module == 'Street') {
            $data['districts'] = $this->common_model->select('tbl_district')->result();

            if ($disId !== "") {
                $data['fk_dis_id'] = $disId;
                $data['areas'] = $this->common_model->select('tbl_area', array('fk_dis_id' => $disId))->result();
            }

            if ($areaId !== "") {
                $data['fk_area_id'] = $areaId;
            }
        }

        echo $this->load->view('settingRecordsFormModal.php', $data, true);
    }

    public function create() {
        if ($this->input->post('module')) {
            $module = $this->input->post('module');
            $initials = $this->getTableColumnPrefix($module);
            if ($initials !== false) {
                if ($this->input->post('title') && $this->input->post('title') != "") {
                    if ($module == 'Area' && $this->input->post('fk_dis_id') != "") {
                        $data = array($initials[1] . 'name' => $this->input->post('title'), 'fk_dis_id' => $this->input->post('fk_dis_id'));
                    } else if ($module == 'Street' && $this->input->post('fk_area_id') != "") {
                        $data = array($initials[1] . 'name' => $this->input->post('title'), 'fk_area_id' => $this->input->post('fk_area_id'));
                    } else if ($module != 'Area' && $module != 'Street') {
                        $data = array($initials[1] . 'name' => $this->input->post('title'));
                    } else {
                        if ($this->input->post('fk_dis_id') == "" && $this->input->post('fk_area_id') == "") {
                            echo $module . " district & area should not be empty.";
                        } else if ($this->input->post('fk_area_id') == "") {
                            echo $module . " area should not be empty.";
                        } else if ($this->input->post('fk_dis_id') == "") {
                            echo $module . " district should not be empty.";
                        }
                        exit;
                    }
                    if (isset($data)) {
                        if ($this->common_model->insert($initials[0], $data)) {
                            echo "success";
                            exit;
                        } else {
                            echo "Sorry, " . $module . " not created.";
                            exit;
                        }
                    } else {
                        echo $module . " data is not available.";
                        exit;
                    }
                } else {
                    echo $module . " name should not be empty.";
                    exit;
                }
            } else {
                echo $module . " table not available.";
                exit;
            }
        } else {
            echo $module . " table not available.";
            exit;
        }
        exit;
    }

    public function edit() {
        $module = $this->input->post('module');
        if ($module) {
            $initials = $this->getTableColumnPrefix($module);
            if ($initials !== false) {
                if ($this->input->post('id') && $this->input->post('id') != "") {
                    if ($this->input->post('title') && $this->input->post('title') != "") {
                        if ($module == 'Area' && $this->input->post('fk_dis_id') != "") {
                            $data = array($initials[1] . 'name' => $this->input->post('title'), 'fk_dis_id' => $this->input->post('fk_dis_id'));
                        } else if ($module == 'Street' && $this->input->post('fk_area_id') != "") {
                            $data = array($initials[1] . 'name' => $this->input->post('title'), 'fk_area_id' => $this->input->post('fk_area_id'));
                        } else if ($module != 'Area' && $module != 'Street') {
                            $data = array($initials[1] . 'name' => $this->input->post('title'));
                        } else {
                            if ($this->input->post('fk_dis_id') == "" && $this->input->post('fk_area_id') == "") {
                                echo $module . " district & area should not be empty.";
                            } else if ($this->input->post('fk_area_id') == "") {
                                echo $module . " area should not be empty.";
                            } else if ($this->input->post('fk_dis_id') == "") {
                                echo $module . " district should not be empty.";
                            }
                            exit;
                        }
                        if (isset($data)) {
                            if ($this->common_model->update($initials[0], array($initials[1] . 'id' => $this->input->post('id')), $data)) {
                                echo "success";
                            } else {
                                echo "Sorry, " . $module . " not updated.";
                            }
                        } else {
                            echo $module . " data is not available.";
                            exit;
                        }
                    } else {
                        echo $module . " name should not be empty.";
                    }
                } else {
                    echo "Unable to edit this " . $module . ", Please try again!";
                }
            } else {
                echo $module . " table not available.";
            }
        } else {
            echo $module . " table not available.";
        }
        exit;
    }

    public function delete($module, $id) {
        if (isset($module)) {
            $initials = $this->getTableColumnPrefix(urldecode($module));
            if ($initials !== false) {
                if (isset($id) && $id != "") {
                    if ($this->common_model->delete($initials[0], array($initials[1] . 'id' => $id))) {
                        echo "success";
                    } else {
                        echo "Sorry, " . urldecode($module) . " not deleted.";
                    }
                } else {
                    echo "Unable to edit this " . urldecode($module) . ", Please try again!";
                }
            } else {
                echo urldecode($module) . " table not available.";
            }
        } else {
            echo urldecode($module) . " table not available.";
        }
        exit;
    }

    public function getTableColumnPrefix($module) {
        switch ($module) {
            case "Company":
                return ["tbl_companies", "com_"];
                break;
            case "Project":
                return ["tbl_project", "pro_"];
                break;
            case "Contractor":
                return ["tbl_contractor", "ctr_"];
                break;
            case "Issue Type":
                return ["tbl_issue_type", "it_"];
                break;
            case "Leak Type":
                return ["tbl_leak_type", "lt_"];
                break;
            case "Leak Nature":
                return ["tbl_leak_nature", "ln_"];
                break;
            case "Priority":
                return ["tbl_priority", "pri_"];
                break;
            case "Status":
                return ["tbl_status", "sta_"];
                break;
            case "District":
                return ["tbl_district", "dis_"];
                break;
            case "Area":
                return ["tbl_area", "area_"];
                break;
            case "Street":
                return ["tbl_street", "str_"];
                break;
            default:
                return false;
                exit;
        }
    }


    // for quick add modals

    public function createSettingModuleRecord() {
        $module = $this->input->post('module');
        $title_name = $this->input->post('title');
        if ($module) {
            switch ($module) {
                case "Company":
                    $initials = ["tbl_companies", "com_"];
                    break;
                case "Project":
                    $initials = ["tbl_project", "pro_"];
                    break;
                case "Contractor":
                    $initials = ["tbl_contractor", "ctr_"];
                    break;
                case "Issue Type":
                    $initials = ["tbl_issue_type", "it_"];
                    break;
                case "Leak Type":
                    $initials = ["tbl_leak_type", "lt_"];
                    break;
                case "Leak Nature":
                    $initials = ["tbl_leak_nature", "ln_"];
                    break;
                case "Priority":
                    $initials = ["tbl_priority", "pri_"];
                    break;
                case "Status":
                    $initials = ["tbl_status", "sta_"];
                    break;
                case "District":
                    $initials = ["tbl_district", "dis_"];
                    break;
                case "Area":
                    $initials = ["tbl_area", "area_"];
                    break;
                case "Street":
                    $initials = ["tbl_street", "str_"];
                    break;
                case "Pipe Size":
                    $initials = ["tbl_pipe_size", "psz_"];
                    break;
                case "Pipe Material":
                    $initials = ["tbl_pipe_material_type", "pmt_"];
                    break;
                default:
                    return false;
                    exit;
            }

            if (isset($initials)) {
                if ($this->input->post('title') && $this->input->post('title') != "") {
                    if ($this->input->post('module') == 'Area' && $this->input->post('fk_dis_id') != "") {
                        $data = array($initials[1] . 'name' => $this->input->post('title'), 'fk_dis_id' => $this->input->post('fk_dis_id'));
                    } else if ($module == 'Pipe Size' && $this->input->post('psz_unit') != "") {
                        $data = array($initials[1] . 'name' => $title_name, 'psz_unit' => $this->input->post('psz_unit'));
                    } else if ($this->input->post('module') == 'Street' && $this->input->post('fk_area_id') != "") {
                        $data = array($initials[1] . 'name' => $this->input->post('title'), 'fk_area_id' => $this->input->post('fk_area_id'));
                    } else {
                        $data = array($initials[1] . 'name' => $this->input->post('title'));
                    }

                    if ($this->common_model->insert($initials[0], $data)) {
                        echo json_encode($this->common_model->select($initials[0], array($initials[1] . 'id' => $this->common_model->lastQId()))->row());
                    } else {
                        echo "Sorry, " . $this->input->post('module') . " not created.";
                    }
                } else {
                    echo $this->input->post('module') . " name should not be empty.";
                }
            } else {
                echo $this->input->post('module') . " table not available.";
            }
        } else {
            echo $this->input->post('module') . " table not available.";
        }
        exit;
    }

    function getNewRecordForm() {
        $postData = $this->input->post();
        if (isset($postData['moduleName'])) {
            switch ($postData['moduleName']) {
                case 'Contact':
                    $data['isReqForModal'] = true;
                    $data['action'] = 'Create';
                    $data['companies'] = $this->common_model->select('tbl_companies')->result();
                    $result = array('class' => 'success', 'data' => $this->load->view("contactForm", $data, true));
                    break;
                case 'Technician':
                    $data['isReqForModal'] = true;
                    $data['action'] = 'Create';
                    $data['companies'] = $this->common_model->select('tbl_companies')->result();
                    $data['departments'] = ['Water', 'Electrical', 'Electrical + Water', 'Operations', 'Field Supervisor'];
                    $result = array('class' => 'success', 'data' => $this->load->view("technicianForm", $data, true));
                    break;
                default:
                    $result = array('class' => 'danger', 'message' => $postData['moduleName'] . ' Module not available.');
                    break;
            }
        } else {
            $result = array('class' => 'danger', 'message' => 'Invalid Request!');
        }

        if ($result['class'] == 'success') {
            $result['data'] = '<div id="NewRecordForm" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Create New ' . $postData['moduleName'] . '
                    <span type="button" class="close pull-right" data-dismiss="modal">&times;</span>
                    </h4>
                  </div>
                  <div class="modal-body">
                    ' . $result['data'] . '
                  </div>
                </div>
              </div>
            </div>';
        }
        echo json_encode($result);
    }

    public function getSettingModuleForm() {
        $data['module'] = $module = $this->input->post('moduleName');
        $data['method'] = 'Create';

        if ($data['module'] == 'Area') {
            $data['districts'] = $this->common_model->select('tbl_district')->result();
            if ($this->input->post('disId') && $this->input->post('disId') != "") {
                $data['fk_dis_id'] = $this->input->post('disId');
            }
        }
        if ($data['module'] == 'Area') {
            $data['districts'] = $this->common_model->select('tbl_district')->result();
            if ($this->input->post('disId') && $this->input->post('disId') != "") {
                $data['fk_dis_id'] = $this->input->post('disId');
            }
        }
        if ($data['module'] == 'Pipe Size') {
            $data['psz_units'] = array('millimetre', 'centimeter', 'inch', 'foot', 'meter');
        }

        if ($data['module'] == 'Street') {
            $data['districts'] = $this->common_model->select('tbl_district')->result();

            if ($this->input->post('disId') && $this->input->post('disId') != "") {
                $data['fk_dis_id'] = $this->input->post('disId');
                $data['areas'] = $this->common_model->select('tbl_area', array('fk_dis_id' => $this->input->post('disId')))->result();
            }

            if ($this->input->post('areaId') && $this->input->post('areaId') != "") {
                $data['fk_area_id'] = $this->input->post('areaId');
            }
        }

        echo $this->load->view('settingRecordsFormModal.php', $data, true);
    }

    function getAreasByDistrict($disId) {
        echo json_encode($this->common_model->select('tbl_area', array('fk_dis_id' => $disId))->result());
    }

    function getStreetsByArea($areaId) {
        echo json_encode($this->common_model->select('tbl_street', array('fk_area_id' => $areaId))->result());
    }

}

?>