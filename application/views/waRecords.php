<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />

<style type="text/css">
    .list-group-item .btns-box{
        border-right: 1px solid lightgrey;
        display: inline-block;
        margin-right: 15px;
        padding-right: 15px;
        margin-top: -5px;
        margin-bottom: -5px;
    }

    .list-group-item{
        border: none !important;
        border-radius: 0px !important;
    }

    .list-group-item:nth-child(odd){
        background-color: rgba(236, 240, 245);
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-<?php echo $pageIcon; ?>" aria-hidden="true"></i> <?php echo $pageTitle; ?></h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-xs-12 text-right">
                            <div class="form-group">
                                <span class="btn btn-primary" data-toggle="modal" data-target="#addWASubtypeModal"><i class="fa fa-plus"></i> Add New</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="area-records" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID Code</th>
                                    <th>Water Analysis Sub Type</th>
                                    <th>Water Analysis Type</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($records as $row): ?>
                                    <tr>
                                        <td><?php echo $row->id_code; ?></td>
                                        <td><?php echo $row->wa_subtype_name; ?></td>
                                        <td><?php echo $row->wa_name; ?></td>
                                        <td><?php echo $row->area_name; ?></td>
                                        <td>
                                            <button class="btn btn-danger delete_btn" data-del_tbl="<?php echo $tbl_name; ?>" data-del_id="<?php echo $row->wa_subtype_id; ?>" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning update_wa_subtype_btn"  data-wa_subtype_id="<?php echo $row->wa_subtype_id; ?>"   data-wa_type_id_fk="<?php echo $row->wa_type_id_fk; ?>"   data-id_code="<?php echo $row->id_code; ?>" data-wa_subtype_name="<?php echo $row->wa_subtype_name; ?>" data-wa_subtype_location_id_fk="<?php echo $row->wa_subtype_location_id_fk; ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>


                        <!-- Modal -->
                        <div id="addWASubtypeModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url(); ?>setting/addWASubType" method="post">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">New Water Analysis Subtype</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group"><label for="wa_id">Water Analysis Type</label>
                                                <select name="wa_type_id_fk" class="form-control">
                                                    <?php
                                                    if (!empty($wa_types)) {
                                                        foreach ($wa_types as $record) {
                                                            ?>
                                                            <option value="<?php echo $record->wa_id; ?>"> <?php echo $record->wa_name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id">Location</label>
                                                <select name="wa_subtype_location_id_fk" class="form-control">
                                                    <?php
                                                    if (!empty($locations)) {
                                                        foreach ($locations as $record) {
                                                            ?>
                                                            <option value="<?php echo $record->area_id; ?>"><?php echo $record->area_name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group"><label>ID Code</label>
                                                <input type="text" class="form-control" name="id_code" placeholder="Sub Type ID Code" >
                                            </div>

                                            <div class="form-group"><label>Sub Type Name</label>
                                                <input type="text" class="form-control" name="wa_subtype_name" placeholder="Water Analysis Sub Type Name" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-default">Create</button> &nbsp;
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- update department modal-->
                        <!-- Modal -->
                        <div id="updateWASubtypeModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url(); ?>setting/updateWASubType" method="post">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Subtype</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="wa_type_id_fk">Water Analysis Type</label>
                                                <select name="wa_type_id_fk" class="form-control update_wa_type_id_fk">
                                                    <?php
                                                    if (!empty($wa_types)) {
                                                        foreach ($wa_types as $record) {
                                                            ?>
                                                            <option value="<?php echo $record->wa_id; ?>"><?php echo $record->wa_name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="wa_subtype_location_id_fk">Location</label>
                                                <select name="wa_subtype_location_id_fk" class="form-control update_wa_subtype_location_id_fk">
                                                    <?php
                                                    if (!empty($locations)) {
                                                        foreach ($locations as $record) {
                                                            ?>
                                                            <option value="<?php echo $record->area_id; ?>"><?php echo $record->area_name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group"><label>ID Code</label>
                                                <input type="text" class="form-control update_id_code" name="id_code" placeholder="Sub Type ID Code" >
                                            </div>
                                            <div class="form-group"><label>Sub Type Name</label>
                                                <input type="text" class="form-control update_wa_subtype_name" name="wa_subtype_name" placeholder="Water Analysis Sub Type Name" >
                                            </div>
                                            <input type="hidden" id="update_wa_subtype_id" name="wa_subtype_id" value="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info">Update</button> &nbsp;
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="form-modal"></div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#area-records').DataTable({
//            columnDefs: [
//                {"targets": [0], "width": "75", "orderable": false}
//            ]
        });

        $('.content').on('click', '.update_wa_subtype_btn', function () {
            var wa_subtype_id = $(this).data('wa_subtype_id');
            var wa_type_id_fk = $(this).data('wa_type_id_fk');
            var id_code = $(this).data('id_code');
            var wa_subtype_name = $(this).data('wa_subtype_name');
            var wa_subtype_location_id_fk = $(this).data('wa_subtype_location_id_fk');

            $('#updateWASubtypeModal #update_wa_subtype_id').val(wa_subtype_id);
            $('#updateWASubtypeModal .update_wa_type_id_fk').val(wa_type_id_fk);
            $('#updateWASubtypeModal .update_id_code').val(id_code);
            $('#updateWASubtypeModal .update_wa_subtype_name').val(wa_subtype_name);
            $('#updateWASubtypeModal .update_wa_subtype_location_id_fk').val(wa_subtype_location_id_fk);
            $('#updateWASubtypeModal').modal('show');

        });

        $('.content').on('click', '.delete_btn', function () {
            var del_id = $(this).data('del_id');
            var del_tbl = $(this).data('del_tbl');
            var del_this = $(this);
            var x = confirm('are you sure you want to delete this ?');
            if (x) {
                $.ajax({
                    url: "<?php echo base_url() . 'setting/deleteRow'; ?>",
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        del_id: del_id,
                        del_tbl: del_tbl,
                    },
                    success: function (data) {
                        if (data.status) {
                            del_this.parent().parent().hide();
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function () {
                        alert('Unable to delete please try again later!');
                    }
                });
            }
        });


    });
</script>