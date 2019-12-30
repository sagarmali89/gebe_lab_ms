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
        <h1><i class="fa fa-<?php echo $pageIcon; ?>" aria-hidden="true"></i> <?php echo $pageTitle; ?><small>Add/Update/Delete</small></h1>
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
                        <h3 class="box-title"><?php if($action != 'View'){echo ($action == 'Create') ? "Enter" : "Update";} ?> Customer Details</h3>
                    </div>
                    <?php if ($action != 'View'): ?>
                    <?php $this->load->helper("form"); ?>
                    <?php endif ?>
                    <?php if ($action == 'Create'): ?>
                    <form role="form" id="customerForm" action="<?php echo base_url() ?>customers/createCustomer" method="post" enctype='multipart/form-data' role="form">
                    <?php endif ?>
                    <?php if ($action == 'Edit'): ?>
                    <form role="form" id="customerForm" action="<?php echo base_url() ?>customers/editCustomer/<?php echo $customer->cust_id; ?>" method="post" enctype='multipart/form-data' role="form">
                    <?php endif ?>
                        <div class="box-body">
                            <div class="row">
                                <?php
                                if (set_value('cust_full_name') && set_value('cust_full_name') != "") {
                                    $cust_full_name = set_value('cust_full_name');
                                } else if (isset($customer)) {
                                    $cust_full_name = $customer->cust_full_name;
                                } else {
                                    $cust_full_name = "";
                                }
                                ?>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="cust_full_name">Full Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $cust_full_name; ?>" id="cust_full_name" name="cust_full_name" maxlength="64" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                    </div>
                                </div>

                                <?php
                                if (set_value('cust_last_name') && set_value('cust_last_name') != "") {
                                    $cust_last_name = set_value('cust_last_name');
                                } else if (isset($customer)) {
                                    $cust_last_name = $customer->cust_last_name;
                                } else {
                                    $cust_last_name = "";
                                }
                                ?>
<!--                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="cust_last_name">Last Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $cust_last_name; ?>" id="cust_last_name" name="cust_last_name" maxlength="64" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                    </div>
                                </div>-->
                            </div>
                            <br/>
                            <div class="row">

                                <?php
                                if (set_value('cust_business_phone') && set_value('cust_business_phone') != "") {
                                    $cust_business_phone = set_value('cust_business_phone');
                                } else if (isset($customer)) {
                                    $cust_business_phone = $customer->cust_business_phone;
                                } else {
                                    $cust_business_phone = "";
                                }
                                ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cust_business_phone">Tel.</label>
                                        <input type="text" class="form-control digits" id="cust_business_phone" value="<?php echo $cust_business_phone; ?>" name="cust_business_phone" maxlength="10" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                    </div>
                                </div>
                                <?php
                                if (set_value('cust_primary_phone') && set_value('cust_primary_phone') != "") {
                                    $cust_primary_phone = set_value('cust_primary_phone');
                                } else if (isset($customer)) {
                                    $cust_primary_phone = $customer->cust_primary_phone;
                                } else {
                                    $cust_primary_phone = "";
                                }
                                ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cust_primary_phone">Ext.</label>
                                        <input type="text" class="form-control digits" id="cust_primary_phone" value="<?php echo $cust_primary_phone; ?>" name="cust_primary_phone" maxlength="10" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                    </div>
                                </div>
                                <?php
                                if (set_value('cust_mobile_phone') && set_value('cust_mobile_phone') != "") {
                                    $cust_mobile_phone = set_value('cust_mobile_phone');
                                } else if (isset($customer)) {
                                    $cust_mobile_phone = $customer->cust_mobile_phone;
                                } else {
                                    $cust_mobile_phone = "";
                                }
                                ?>
<!--                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cust_mobile_phone">Mob. Number (Other)</label>
                                        <input type="text" class="form-control digits" id="cust_mobile_phone" value="<?php echo $cust_mobile_phone; ?>" name="cust_mobile_phone" maxlength="10" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                    </div>
                                </div>-->
                            </div>
                            <div class="row">
                                <?php
                                if (set_value('cust_email') && set_value('cust_email') != "") {
                                    $cust_email = set_value('cust_email');
                                } else if (isset($customer)) {
                                    $cust_email = $customer->cust_email;
                                } else {
                                    $cust_email = "";
                                }
                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cust_email">Email address</label>
                                        <input type="text" class="form-control email" id="cust_email" value="<?php echo $cust_email; ?>" name="cust_email" maxlength="128" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                    </div>
                                </div>
                                <?php
                                if (set_value('cust_webpage') && set_value('cust_webpage') != "") {
                                    $cust_webpage = set_value('cust_webpage');
                                } else if (isset($customer)) {
                                    $cust_webpage = $customer->cust_webpage;
                                } else {
                                    $cust_webpage = "";
                                }
                                ?>
<!--                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cust_webpage">Webpage</label>
                                        <input type="text" class="form-control" id="cust_webpage" value="<?php echo $cust_webpage; ?>" name="cust_webpage" maxlength="128" <?php echo ($action == 'View') ? "Disabled" : ""; ?>>
                                    </div>
                                </div>-->
                            </div>
                            <br/>
                            <div class="row">
                                <?php
                                if (set_value('cust_notes') && set_value('cust_notes') != "") {
                                    $cust_notes = set_value('cust_notes');
                                } else if (isset($customer)) {
                                    $cust_notes = $customer->cust_notes;
                                } else {
                                    $cust_notes = "";
                                }
                                ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cust_notes">Notes</label>
                                        <textarea class="form-control" rows="2" id="cust_notes" value="<?php echo $cust_notes; ?>" name="cust_notes" <?php echo ($action == 'View') ? "Disabled" : ""; ?>></textarea>
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
<script src="<?php echo base_url(); ?>assets/js/customerForm.js" type="text/javascript"></script>