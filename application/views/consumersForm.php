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
<div class="content-wrapper">

    <section class="content-header">
      <h1><i class="fa fa-plus-circle"></i>&nbsp; <?php echo $action; ?> Contact</h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
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


            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?php if($action != 'View'){echo ($action == 'Create') ? "Enter" : "Update";} ?> Contact Details</h3>
                    </div>
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
                                        <label for="con_business_phone">Mob. Number (Buisness)</label>
                                        <input type="text" class="form-control digits" id="con_business_phone" value="<?php echo $con_business_phone; ?>" name="con_business_phone" maxlength="10" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
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
                                        <label for="con_primary_phone">Mob. Number (Home)</label>
                                        <input type="text" class="form-control digits" id="con_primary_phone" value="<?php echo $con_primary_phone; ?>" name="con_primary_phone" maxlength="10" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
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
                                        <label for="con_mobile_phone">Mob. Number (Other)</label>
                                        <input type="text" class="form-control digits" id="con_mobile_phone" value="<?php echo $con_mobile_phone; ?>" name="con_mobile_phone" maxlength="10" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
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
                                if (set_value('con_notes') && set_value('con_notes') != "") {
                                    $con_notes = set_value('con_notes');
                                } else if (isset($contact)) {
                                    $con_notes = $contact->con_notes;
                                } else {
                                    $con_notes = "";
                                }
                                ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="con_notes">Notes</label>
                                        <textarea class="form-control" rows="2" id="con_notes" value="<?php echo $con_notes; ?>" name="con_notes" <?php echo ($action == 'View') ? "Disabled" : ""; ?>></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        <?php if ($action != 'View'): ?>
                        <div class="box-footer">
                        <input type="submit" class="btn btn-lg btn-success btn-flat" value="Submit" />
                        </div>
                    </form>
                    <?php endif ?>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/contactForm.js" type="text/javascript"></script>