<style type="text/css">
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color: #fff;
        color: #000;
        border:1px solid rgba(0,0,0,0.1);
        opacity: 1;
        box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.10);
    }

    .list-group-item{
        display: inline-block;
        margin-right: 10px;
        margin-top: 5px;
        margin-bottom: 5px;
        border-radius: 0px !important;  
    }
    .list-group-item span{
        margin-left: 20px; 
    }
</style>

<?php if (!isset($isReqForModal)) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1><i class="fa fa-<?php echo $page_icon; ?>"></i>&nbsp; <?php echo $action; ?> Customer</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if ($error) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>                    
                        </div>
                    <?php } ?>
                    <?php
                    $success = $this->session->flashdata('success');
                    if ($success) {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><?php
                                if ($action != 'View') {
                                    echo ($action == 'Create') ? "Enter" : "Update";
                                }
                                ?> Contact Details</h3>
                        </div>
                    <?php } ?>
                    <?php if ($action != 'View'): ?>
                        <?php $this->load->helper("form"); ?>
                    <?php endif ?>
                    <?php if ($action == 'Create'): ?>
                        <form role="form" id="contactForm" action="<?php echo base_url() ?>contacts/createContact" method="post" enctype='multipart/form-data' role="form">
                        <?php endif ?>
                        <?php if ($action == 'Edit'): ?>
                            <form role="form" id="contactForm" action="<?php echo base_url() ?>contacts/editContact/<?php echo $contact->con_id; ?>" method="post" enctype='multipart/form-data' role="form">
                            <?php endif ?>
                            <div class="box-body">
                                <div class="row">

                                    <?php
                                    if (set_value('con_company') && set_value('con_company') != "") {
                                        $con_company = set_value('con_company');
                                    } else if (isset($contact)) {
                                        $con_company = $contact->con_company;
                                    } else {
                                        $con_company = "";
                                    }
                                    ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="con_company">Contact Company</label>
                                            <div class="input-group">
                                                <select class="form-control" id="con_company" name="con_company" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                                    <option disabled selected>Select Company</option>
                                                    <?php
                                                    for ($i = 0; $i < sizeof($companies); $i++) {
                                                        ?>
                                                        <option value="<?php echo $companies[$i]->com_id ?>" <?php echo ($companies[$i]->com_id == $con_company) ? "selected" : ""; ?>>
                                                            <?php echo $companies[$i]->com_name; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="input-group-addon" onclick="createNewRecord('Company');"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                    if (set_value('con_meter_no') && set_value('con_meter_no') != "") {
                                        $con_meter_no = set_value('con_meter_no');
                                    } else if (isset($contact)) {
                                        $con_meter_no = $contact->con_meter_no;
                                    } else {
                                        $con_meter_no = "";
                                    }
                                    ?>
                                    <div class="col-md-4">                                
                                        <div class="form-group">
                                            <label for="con_meter_no">Meter Number</label>
                                            <input type="text" class="form-control" value="<?php echo $con_meter_no; ?>" id="con_meter_no" name="con_meter_no" maxlength="64" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">

                                    <?php
                                    if (set_value('con_first_name') && set_value('con_first_name') != "") {
                                        $con_first_name = set_value('con_first_name');
                                    } else if (isset($contact)) {
                                        $con_first_name = $contact->con_first_name;
                                    } else {
                                        $con_first_name = "";
                                    }
                                    ?>
                                    <div class="col-md-6">                                
                                        <div class="form-group">
                                            <label for="con_first_name">First Name</label>
                                            <input type="text" class="form-control required" value="<?php echo $con_first_name; ?>" id="con_first_name" name="con_first_name" maxlength="64" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>

                                    <?php
                                    if (set_value('con_last_name') && set_value('con_last_name') != "") {
                                        $con_last_name = set_value('con_last_name');
                                    } else if (isset($contact)) {
                                        $con_last_name = $contact->con_last_name;
                                    } else {
                                        $con_last_name = "";
                                    }
                                    ?>
                                    <div class="col-md-6">                                
                                        <div class="form-group">
                                            <label for="con_last_name">Last Name</label>
                                            <input type="text" class="form-control required" value="<?php echo $con_last_name; ?>" id="con_last_name" name="con_last_name" maxlength="64" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>

                                    <?php
                                    if (set_value('con_contact_name') && set_value('con_contact_name') != "") {
                                        $con_contact_name = set_value('con_contact_name');
                                    } else if (isset($contact)) {
                                        $con_contact_name = $contact->con_contact_name;
                                    } else {
                                        $con_contact_name = "";
                                    }
                                    ?>
<!--                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="con_contact_name">Contact Name</label>
                                            <input type="text" class="form-control" id="con_contact_name" value="<?php echo $con_contact_name; ?>" name="con_contact_name" maxlength="128" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>-->

                                    <?php
                                    if (set_value('con_file_as') && set_value('con_file_as') != "") {
                                        $con_file_as = set_value('con_file_as');
                                    } else if (isset($contact)) {
                                        $con_file_as = $contact->con_file_as;
                                    } else {
                                        $con_file_as = "";
                                    }
                                    ?>
<!--                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="con_file_as">File As</label>
                                            <input type="text" class="form-control" id="con_file_as" value="<?php echo $con_file_as; ?>" name="con_file_as" maxlength="128"  <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>-->
                                </div>
                                <br/>
                                <div class="row">

                                    <?php
                                    if (set_value('con_business_phone') && set_value('con_business_phone') != "") {
                                        $con_business_phone = set_value('con_business_phone');
                                    } else if (isset($contact)) {
                                        $con_business_phone = $contact->con_business_phone;
                                    } else {
                                        $con_business_phone = "";
                                    }
                                    ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="con_business_phone">Tel.</label>
                                            <input type="text" class="form-control digits" id="con_business_phone" value="<?php echo $con_business_phone; ?>" name="con_business_phone"  <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>
                                    <?php
                                    if (set_value('con_primary_phone') && set_value('con_primary_phone') != "") {
                                        $con_primary_phone = set_value('con_primary_phone');
                                    } else if (isset($contact)) {
                                        $con_primary_phone = $contact->con_primary_phone;
                                    } else {
                                        $con_primary_phone = "";
                                    }
                                    ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="con_primary_phone">Ext.</label>
                                            <input type="text" class="form-control digits" id="con_primary_phone" value="<?php echo $con_primary_phone; ?>" name="con_primary_phone" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>
                                    <?php
                                    if (set_value('con_mobile_phone') && set_value('con_mobile_phone') != "") {
                                        $con_mobile_phone = set_value('con_mobile_phone');
                                    } else if (isset($contact)) {
                                        $con_mobile_phone = $contact->con_mobile_phone;
                                    } else {
                                        $con_mobile_phone = "";
                                    }
                                    ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="con_mobile_phone">Phone Number (Other)</label>
                                            <input type="text" class="form-control digits" id="con_mobile_phone" value="<?php echo $con_mobile_phone; ?>" name="con_mobile_phone" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    if (set_value('con_email') && set_value('con_email') != "") {
                                        $con_email = set_value('con_email');
                                    } else if (isset($contact)) {
                                        $con_email = $contact->con_email;
                                    } else {
                                        $con_email = "";
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="con_email">Email address</label>
                                            <input type="text" class="form-control email" id="con_email" value="<?php echo $con_email; ?>" name="con_email" maxlength="128" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>
                                    <?php
                                    if (set_value('con_webpage') && set_value('con_webpage') != "") {
                                        $con_webpage = set_value('con_webpage');
                                    } else if (isset($contact)) {
                                        $con_webpage = $contact->con_webpage;
                                    } else {
                                        $con_webpage = "";
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="con_webpage">Webpage</label>
                                            <input type="text" class="form-control" id="con_webpage" value="<?php echo $con_webpage; ?>" name="con_webpage" maxlength="128" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <?php
                                    if (set_value('con_country') && set_value('con_country') != "") {
                                        $con_country = set_value('con_country');
                                    } else if (isset($contact)) {
                                        $con_country = $contact->con_country;
                                    } else {
                                        $con_country = "";
                                    }
                                    ?>
                                    <!--                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="con_country">Country</label>
                                                                                <input type="text" class="form-control" id="con_country" value="<?php echo $con_country; ?>" name="con_country" maxlength="128" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                                                            </div>
                                                                        </div>-->
                                    <?php
                                    if (set_value('con_city') && set_value('con_city') != "") {
                                        $con_city = set_value('con_city');
                                    } else if (isset($contact)) {
                                        $con_city = $contact->con_city;
                                    } else {
                                        $con_city = "";
                                    }
                                    ?>
                                    <!--                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="con_city">City</label>
                                                                                <input type="text" class="form-control" id="con_city" value="<?php echo $con_city; ?>" name="con_city" maxlength="128" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                                                            </div>
                                                                        </div>-->





                                    <?php
                                    if (set_value('con_district_id') && set_value('con_district_id') != "") {
                                        $con_district_id = set_value('con_district_id');
                                    } else if (isset($contact)) {
                                        $con_district_id = $contact->con_district_id;
                                    } else {
                                        $con_district_id = "";
                                    }
                                    ?>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="con_district_id">District</label>
                                            <div class="input-group">
                                                <select class="form-control" id="con_district_id" name="con_district_id" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                                    <option disabled selected><?php if ($action != 'View') { ?>Select District<?php } ?></option>
                                                    <?php
                                                    for ($i = 0; $i < sizeof($districts); $i++) {
                                                        if ($districts[$i]->dis_name != "") {
                                                            ?>
                                                            <option value="<?php echo $districts[$i]->dis_id; ?>" <?php echo ($districts[$i]->dis_id == $con_district_id) ? "selected" : ""; ?>><?php echo $districts[$i]->dis_name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span class="input-group-addon" onclick="createNewRecord('District');"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- con_area_id -->
                                    <?php
                                    if (set_value('con_area_id') && set_value('con_area_id') != "") {
                                        $con_area_id = set_value('con_area_id');
                                    } else if (isset($contact)) {
                                        $con_area_id = $contact->con_area_id;
                                    } else {
                                        $con_area_id = "";
                                    }
                                    ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="con_area_id">Area/ Location</label>
                                            <div class="input-group">
                                                <select class="form-control" id="con_area_id" name="con_area_id" <?php echo ($action == 'View') ? "Disabled" : ""; ?> <?php echo (!isset($areas)) ? 'disabled' : ''; ?>>
                                                    <?php
                                                    if (isset($areas)) {
                                                        ?>
                                                        <option disabled selected><?php if ($action != 'View') { ?>Select Area<?php } ?></option>
                                                        <?php
                                                        for ($i = 0; $i < sizeof($areas); $i++) {
                                                            if ($areas[$i]->area_name != "") {
                                                                ?>
                                                                <option value="<?php echo $areas[$i]->area_id; ?>" <?php echo ($areas[$i]->area_id == $con_area_id) ? "selected" : ""; ?>><?php echo $areas[$i]->area_name; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    } else {
                                                        ?><option disabled selected><?php if ($action != 'View') { ?>Please Select District First<?php } ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="input-group-addon" onclick="createNewRecord('Area');"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- con_street_id -->
                                    <?php
                                    if (set_value('con_street_id') && set_value('con_street_id') != "") {
                                        $con_street_id = set_value('con_street_id');
                                    } else if (isset($contact)) {
                                        $con_street_id = $contact->con_street_id;
                                    } else {
                                        $con_street_id = "";
                                    }
                                    ?>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="con_street_id">Street</label>
                                            <div class="input-group">
                                                <select class="form-control" id="con_street_id" name="con_street_id" <?php echo ($action == 'View') ? "Disabled" : ""; ?> <?php echo (!isset($streets)) ? 'disabled' : ''; ?>>
                                                    <?php
                                                    if (isset($streets)) {
                                                        ?><option disabled selected><?php if ($action != 'View') { ?>Select Area<?php } ?></option><?php
                                                        for ($i = 0; $i < sizeof($streets); $i++) {
                                                            if ($streets[$i]->str_name != "") {
                                                                ?>
                                                                <option value="<?php echo $streets[$i]->str_id; ?>" <?php echo ($streets[$i]->str_id == $con_street_id) ? "selected" : ""; ?>><?php echo $streets[$i]->str_name; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    } else {
                                                        ?><option disabled selected><?php if ($action != 'View') { ?>Please Select Area First<?php } ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="input-group-addon" onclick="createNewRecord('Street');"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                   // print_r($contact);
                                    if (set_value('con_address') && set_value('con_address') != "") {
                                        $con_address = set_value('con_address');
                                    } else if (isset($contact)) {
                                        $con_address = $contact->con_address;
                                    } else {
                                        $con_address = "";
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="con_address">Address</label>
                                            <textarea class="form-control" rows="2" id="con_address" value="<?php echo $con_address; ?>" name="con_address" <?php echo ($action == 'View') ? "Disabled" : ""; ?>><?php echo $con_address; ?></textarea>
                                        </div>
                                    </div>

                                    <?php
                                    if (set_value('con_notes') && set_value('con_notes') != "") {
                                        $con_notes = set_value('con_notes');
                                    } else if (isset($contact)) {
                                        $con_notes = $contact->con_notes;
                                    } else {
                                        $con_notes = "";
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="con_notes">Notes</label>
                                            <textarea class="form-control" rows="2" id="con_notes" value="<?php echo $con_notes; ?>" name="con_notes" <?php echo ($action == 'View') ? "Disabled" : ""; ?>><?php echo $con_notes; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!isset($isReqForModal)) { ?>
                                    <div class="row">
                                        <?php if ($action != 'View'): ?>
                                            <br/>
                                            <div class="col-md-12">
                                                <span class="btn btn-primary btn-flat file-upload-btn" onclick="uploadAttachment();">
                                                    <i class="fa fa-paperclip"></i>&nbsp; Attachments
                                                </span>
                                            </div>
                                            <br/><br/>
                                        <?php endif ?>
                                        <div class="col-md-12">
                                            <?php if ($action == 'View'): ?>
                                                <h4>Attachments</h4>
                                            <?php endif ?>
                                            <ul id="attachments-list" class="list-group">
                                                <?php
                                                if (isset($contact) && $contact->con_attachments != "") {
                                                    $attachments = explode(",", $contact->con_attachments);

                                                    foreach ($attachments as $a) {
                                                        echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a target="_blank" href="' . base_url('uploads/technicians-attachments/') . $a . '">' . $a . '</a>';
                                                        if ($action != 'View') {
                                                            echo '<span class="badge badge-danger badge-pill btn" onclick="deleteAttachment(this, \'fromdb\');"><i class="fa fa-times"></i></span>';
                                                        }
                                                        echo '</li>';
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if (!isset($isReqForModal)) { ?>
                                <div id="attachments-input-box" style="display: none;">
                                    <input type="file" name="attachments[0]" onchange="fileAttached(this)"/>
                                </div>
                            <?php } ?>
                            <?php if ($action != 'View'): ?>
                                <?php if (!isset($isReqForModal)) { ?>
                                    <?php
                                    if (isset($contact)) {
                                        $con_attachments = $contact->con_attachments;
                                    } else {
                                        $con_attachments = "";
                                    }
                                    ?>
                                    <input type="hidden" name="con_attachments" value="<?php echo $con_attachments; ?>"/>
                                    <input type="hidden" name="con_attachments_to_delete" value=""/>
                                <?php } ?>
                                <div class="box-footer">
                                    <input type="submit" class="btn btn-lg btn-success btn-flat" value="Submit" />
                                </div>
                            </form>
                        <?php endif ?>
                        <?php if (!isset($isReqForModal)) { ?>
                    </div>
                </div>
            </div>    
        </section>
    </div>
    <div id="form-modal"></div>
    <script src="<?php echo base_url(); ?>assets/js/contactForm.js" type="text/javascript"></script>
<?php } ?>
<script>
                                    function createNewRecord(moduleName) {
                                        if (moduleName == 'Contractor') {
                                            window.open('../contractors/create');
                                        } else {
                                            $.post("<?php echo base_url('setting/getSettingModuleForm'); ?>", {moduleName: moduleName}, function (response) {
                                                if (response !== 0) {
                                                    $('#form-modal').html('');
                                                    $('#form-modal').html(response);
                                                    $('#setting-module-modal').modal('show');

                                                    $('#setting-module-form').on('submit', function (e) {
                                                        e.preventDefault();
                                                        $.ajax({
                                                            url: '<?php echo base_url('setting/createSettingModuleRecord'); ?>',
                                                            type: "POST",
                                                            data: $(this).serialize(),
                                                            success: function (result) {
                                                                var response = jQuery.parseJSON(result);
                                                                if (typeof response == 'object') {
                                                                    switch (moduleName) {
                                                                        case "Project":
                                                                            $('select#leak_project_name').append('<option value="' + response.pro_id + '">' + response.pro_name + '</option>');
                                                                            break;
                                                                        case "Contractor":
                                                                            $('select.contractor-select-box').each(function () {
                                                                                $(this).append('<option value="' + response.ctr_id + '">' + response.ctr_name + '</option>');
                                                                            });
                                                                            break;
                                                                        case "Issue Type":
                                                                            $('select#leak_issue_type').append('<option value="' + response.it_id + '" selected>' + response.it_name + '</option>');
                                                                            break;
                                                                        case "Company":
                                                                            $('select#con_company').append('<option value="' + response.com_id + '" selected>' + response.com_name + '</option>');
                                                                            break;
                                                                        case "Pipe Material":
                                                                            $('select#eleak_material').append('<option value="' + response.pmt_id + '" selected>' + response.pmt_name + '</option>');
                                                                            break;
                                                                        case "Pipe Size":
                                                                            $('select#eleak_pipe_size').append('<option value="' + response.psz_id + '" selected>' + response.psz_name + ' ' + response.psz_unit + '</option>');
                                                                            break;
                                                                        case "Leak Type":
                                                                            $('select#leak_type').append('<option value="' + response.lt_id + '" selected>' + response.lt_name + '</option>').trigger('change');
                                                                            break;
                                                                        case "Leak Nature":
                                                                            $('select#leak_nature').append('<option value="' + response.ln_id + '" selected>' + response.ln_name + '</option>');
                                                                            break;
                                                                        case "Priority":
                                                                            $('select#leak_priority').append('<option value="' + response.pri_id + '" selected>' + response.pri_name + '</option>');
                                                                            break;
                                                                        case "Status":
                                                                            $('select#leak_status').append('<option value="' + response.sta_id + '" selected>' + response.sta_name + '</option>');
                                                                            break;
                                                                        case "District":
                                                                            $('select#con_district_id').append('<option value="' + response.dis_id + '" selected>' + response.dis_name + '</option>');
                                                                        case "Area":
                                                                            var selectedDistrict = $('select#con_district_id').val();
                                                                            if (selectedDistrict == response.fk_dis_id) {
                                                                                $('select#con_area_id').append('<option value="' + response.area_id + '" selected>' + response.area_name + '</option>');
                                                                                $('select#con_district_id').trigger('change');
                                                                            }
                                                                        case "Street":
                                                                            var selectedArea = $('select#con_area_id').val();
                                                                            if (selectedArea == response.fk_area_id) {
                                                                                $('select#con_street_id').append('<option value="' + response.str_id + '" selected>' + response.str_name + '</option>');
                                                                                $('select#con_area_id').trigger('change');
                                                                            }
                                                                    }
                                                                } else {
                                                                    alert(result);
                                                                }
                                                                $('#setting-module-modal').modal('hide');
                                                            },
                                                            error: function (jXHR, textStatus, errorThrown) {
                                                                alert(errorThrown);
                                                                $('#setting-module-modal').modal('hide');
                                                            }
                                                        });
                                                    });
                                                }
                                            });
                                        }
                                    }


                                    $('#con_district_id').change(function () {
                                        if ($(this).val() != "" && $(this).val() != null) {
                                            $.post('<?php echo base_url(); ?>setting/getAreasByDistrict/' + $(this).val(), function (response) {
                                                response = JSON.parse(response);
                                                $('#con_area_id').empty();
                                                if (response.length > 0) {
                                                    $('#con_area_id').append('<option selected disabled value="">Select Area</option>');
                                                    for (var i = 0; i < response.length; i++) {
                                                        $('#con_area_id').append('<option value="' + response[i].area_id + '">' + response[i].area_name + '</option>');
                                                        $('#con_area_id').attr('disabled', false);
                                                    }
                                                } else {
                                                    $('#con_area_id').append('<option selected disabled value="">no areas in selected district</option>');
                                                    $('#con_area_id').attr('disabled', true);
                                                }

                                            });
                                        }
                                        $('#con_street_id').append('<option disabled selected value="">Please Select Area First</option>');
                                        $('#con_street_id').attr('disabled', true);
                                    });

                                    $('#con_area_id').change(function () {
                                        if ($(this).val() != "" && $(this).val() != null) {
                                            $.post('<?php echo base_url(); ?>setting/getStreetsByArea/' + $(this).val(), function (response) {
                                                response = JSON.parse(response);
                                                $('#con_street_id').empty();
                                                if (response.length > 0) {
                                                    $('#con_street_id').append('<option disabled selected value="">Select Street</option>');
                                                    for (var i = 0; i < response.length; i++) {
                                                        if (response[i].street_no != '' && response[i].street_no != null) {
                                                            $('#con_street_id').append('<option value="' + response[i].str_id + '">' + response[i].str_name + ' - (' + response[i].street_no + ')</option>');
                                                        } else {
                                                            $('#con_street_id').append('<option value="' + response[i].str_id + '">' + response[i].str_name + '</option>');
                                                        }
                                                    }
                                                    $('#con_street_id').attr('disabled', false);
                                                } else {
                                                    $('#con_street_id').append('<option disabled selected value="">No streets in selected area</option>');
                                                    $('#con_street_id').attr('disabled', true);
                                                }
                                            });
                                        }
                                    });

</script>