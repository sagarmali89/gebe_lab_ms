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
        <h1><i class="fa fa-<?php echo $pageIcon; ?>" aria-hidden="true"></i> <?php echo $pageTitle; ?><small>Add/Update/Delete</small></h1>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>customers/create"><i class="fa fa-plus"></i>Add New</a>
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
                    <h3 class="box-title">Customers List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="con-records" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Notes</th>
                            <th class="text-center" style="width: 100px !important;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($conRecords)) {
                        $NA = "<small>not available</small>";
                        foreach($conRecords as $record) {
                            ?>
                            <tr>
                                <td><?php echo ($record->cust_full_name != "" || $record->cust_last_name !=     "")? ($record->cust_full_name." ".$record->cust_last_name) : $NA; ?></td>
                                <td><?php echo ($record->cust_mobile_phone != "")? $record->cust_mobile_phone : $NA; ?></td>
                                <td><?php echo ($record->cust_email != "")? $record->cust_email : $NA; ?></td>
                                <td></td>
                                <td><?php echo ($record->cust_notes != "")? $record->cust_notes : $NA; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url().'customers/view/'.$record->cust_id; ?>" title="View Details"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'customers/edit/'.$record->cust_id; ?>" title="Edit Customers"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger delete" onclick="return confirm('Are you sure to Delete this record?');" href="<?php echo base_url().'customers/delete/'.$record->cust_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
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
    $(document).ready(function() {
        $('#con-records').DataTable();
    });
</script>