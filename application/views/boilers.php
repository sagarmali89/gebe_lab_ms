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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($records as $row): ?>
                                    <tr>
                                        <td><?php echo $row->boiler_id_code; ?></td>
                                        <td><?php echo $row->boiler_name; ?></td>
                                        <td>
                                            <button class="btn btn-danger delete_btn" data-del_tbl="<?php echo $tbl_name; ?>" data-del_id="<?php echo $row->boiler_id; ?>" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning update_wa_subtype_btn"  data-boiler_id="<?php echo $row->boiler_id; ?>"   data-boiler_id_code="<?php echo $row->boiler_id_code; ?>"   data-boiler_name="<?php echo $row->boiler_name; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>


                        <!-- Modal -->
                        <div id="addWASubtypeModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url(); ?>setting/addBoiler" method="post">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">New Boiler</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group"><label>ID Code</label>
                                                <input type="text" class="form-control" name="boiler_id_code" placeholder="Boiler ID Code" >
                                            </div>

                                            <div class="form-group"><label>Boiler Name</label>
                                                <input type="text" class="form-control" name="boiler_name" placeholder="Boiler Name" >
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
                                <form action="<?php echo base_url(); ?>setting/updateBoiler" method="post">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Subtype</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <div class="form-group"><label>ID Code</label>
                                                    <input type="text" class="form-control update_boiler_id_code" name="boiler_id_code" placeholder="Boiler ID Code" >
                                                </div>

                                                <div class="form-group"><label>Boiler Name</label>
                                                    <input type="text" class="form-control update_boiler_name" name="boiler_name" placeholder="Boiler Name" >
                                                </div>
                                            </div>
                                            <input type="hidden" id="update_boiler_id" name="boiler_id" value="">
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
            var boiler_id = $(this).data('boiler_id');
            var boiler_id_code = $(this).data('boiler_id_code');
            var boiler_name = $(this).data('boiler_name');
            $('#updateWASubtypeModal #update_boiler_id').val(boiler_id);
            $('#updateWASubtypeModal .update_boiler_id_code').val(boiler_id_code);
            $('#updateWASubtypeModal .update_boiler_name').val(boiler_name);
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