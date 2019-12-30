<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<style type="text/css">
    table td small{
        opacity: 0.25;
        color: #002833;
    }
    table td a{
        text-decoration: underline;
    }

</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-<?php echo $page_icon; ?>"></i> Customer Management
            <small>Add, Edit, Delete</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>contacts/create"><i class="fa fa-plus"></i>Add New</a>
                </div>
            </div>

            <?php
            $pageMessage = $this->session->flashdata('pageMessage');
            if (isset($pageMessage)) {
                ?>
                <div class="col-xs-12">
                    <div class="alert alert-<?php echo $pageMessage['class']; ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $pageMessage['msg']; ?>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Contacts List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="con-records" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Meter No</th>
                                    <th>Email</th>
                                    <th>Area</th>
                                    <th>Tel.</th>
                                    <th>Ext.</th>
                                    <th width="20%">Attachments</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($custRecords)) {
                                    $NA = "<small>not available</small>";
                                    foreach ($custRecords as $record) {
                                        ?>
                                        <tr>
                                            <td><?php echo ($record->con_first_name != "" || $record->con_last_name != "") ? ($record->con_first_name . " " . $record->con_last_name) : $NA; ?></td>
                                            <td><?php echo ($record->con_company_name != "") ? $record->con_company_name : $NA; ?></td>
                                            <td><?php echo ($record->con_meter_no != "") ? $record->con_meter_no : $NA; ?></td>
                                            <td><?php echo ($record->con_email != "") ? $record->con_email : $NA; ?></td>
                                            <td><?php echo ($record->con_area_name != "") ? $record->con_area_name : $NA; ?></td>
                                            <td><?php echo ($record->con_business_phone != "") ? $record->con_business_phone : $NA; ?></td>
                                            <td><?php echo ($record->con_primary_phone != "") ? $record->con_primary_phone : $NA; ?></td>
                                            <td>
                                                <?php
                                                if ($record->con_attachments != "") {
                                                    $attachments = explode(",", $record->con_attachments);
                                                    for ($i = 0; $i < sizeof($attachments); $i++) {
                                                        echo '<a target="_black" href="' . base_url('uploads/contacts-attachments/') . $attachments[$i] . '">' . $attachments[$i] . '</a>&nbsp;&nbsp;&nbsp;';
                                                    }
                                                } else {
                                                    echo $NA;
                                                }
                                                ?>                                    
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'contacts/view/' . $record->con_id; ?>" title="View Details"><i class="fa fa-eye"></i></a> | 
                                                <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'contacts/edit/' . $record->con_id; ?>" title="Edit Contacts"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-sm btn-danger delete" onclick="return confirm('Are you sure to Delete this record?');" href="<?php echo base_url() . 'contacts/delete/' . $record->con_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#con-records').DataTable();
                                        });
</script>