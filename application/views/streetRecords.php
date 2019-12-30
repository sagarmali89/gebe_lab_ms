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
            <i class="fa fa-<?php echo $page_icon; ?>"></i> <?php echo $pageTitle; ?>
            <small>Add, Edit, Delete</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo base_url('setting/district'); ?>"></i>Manage Districts</a>
                    <a class="btn btn-default" href="<?php echo base_url('setting/area'); ?>"></i>Manage Areas</a>
                    <button class="btn btn-primary" onclick="createNewRecord();"><i class="fa fa-plus"></i> &nbsp;Add New</button>
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
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="area-records" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>District</th>
                                    <th>Area Name</th>
                                    <th>Street Name</th>
                                    <th>Street Number</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($areaRecords)) {
                                    $NA = "<small>not available</small>";
                                    foreach ($areaRecords as $record) {
                                        ?>
                                        <tr>
                                            <td><?php echo ($record->dis_name != "") ? $record->dis_name : $NA; ?></td>
                                            <td><?php echo ($record->area_name != "") ? $record->area_name : $NA; ?></td>
                                            <td><?php echo ($record->str_name != "") ? $record->str_name : $NA; ?></td>
                                            <td><?php echo ($record->street_no != "") ? $record->street_no : $NA; ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm" onclick="deleteRecord(<?php echo $record->str_id; ?>);"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                <button class="btn btn-warning btn-sm" onclick="updateRecord(<?php echo $record->str_id; ?>, <?php echo $record->dis_id; ?>, <?php echo $record->area_id; ?>, <?php echo $record->street_no; ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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
<div id="form-modal"></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#area-records').DataTable({
                                                    columnDefs: [
                                                        {"targets": [-1], "width": "75", "orderable": false}
                                                    ]
                                                });
                                            });

                                            function createNewRecord() {
                                                var data = {
                                                    module: "Street",
                                                    method: "Create"
                                                }
                                                $.post("<?php echo base_url('setting/getForm'); ?>", data, function (response) {
                                                    if (response !== 0) {
                                                        loadAndDisplayForm(response);
                                                    }
                                                });
                                            }

                                            function updateRecord(id, fk_dis_id, fk_area_id, street_no) {
                                                var data = {
                                                    module: "Street",
                                                    method: "Edit",
                                                    id: id,
                                                    disId: fk_dis_id,
                                                    areaId: fk_area_id,
                                                    street_no: street_no
                                                }
                                                $.post("<?php echo base_url('setting/getForm'); ?>", data, function (response) {
                                                    if (response !== 0) {
                                                        loadAndDisplayForm(response);
                                                    }
                                                });
                                            }

                                            function deleteRecord(id) {
                                                if (confirm('Are You Sure ato Delete This Record?')) {
                                                    $.get("<?php echo base_url('setting/delete'); ?>/Street/" + id, function (response) {
                                                        if (response === 'success') {
                                                            location.reload();
                                                        } else {
                                                            alert(response);
                                                        }
                                                    });
                                                }
                                            }

                                            function loadAndDisplayForm(responseData) {
                                                $('#form-modal').html('');
                                                $('#form-modal').html(responseData);
                                                $('#setting-module-modal').modal('show');

                                                $('#setting-module-form').on('submit', function (e) {
                                                    e.preventDefault();
                                                    $.ajax({
                                                        url: $(this).attr('action'),
                                                        type: "POST",
                                                        data: $(this).serialize(),
                                                        success: function (result) {
                                                            if (result === "success") {
                                                                location.reload();
                                                            } else {
                                                                alert(result);
                                                                $('#setting-module-modal').modal('hide');
                                                            }
                                                        },
                                                        error: function (jXHR, textStatus, errorThrown) {
                                                            alert(errorThrown);
                                                            $('#setting-module-modal').modal('hide');
                                                        }
                                                    });
                                                });
                                            }
</script>