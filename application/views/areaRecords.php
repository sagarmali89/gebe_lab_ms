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
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-danger" onclick="createNewRecord();">Create New Area</button>			
                    </div>
                    <div class="panel-body">
                        <table id="area-records" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>District</th>
                                    <th>Area Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($records as $row): ?>
                                    <tr>
                                        <td>
                                            <button class="btn btn-danger" onclick="deleteRecord(<?php echo $row->area_id; ?>);"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            <button class="btn btn-warning" onclick="updateRecord(<?php echo $row->area_id; ?>, '<?php echo $row->area_name; ?>', <?php echo $row->fk_dis_id; ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>
                                        <td><?php echo $row->dis_name; ?></td>
                                        <td><?php echo $row->area_name; ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                                                        {"targets": [0], "width": "75", "orderable": false}
                                                    ]
                                                });
                                            });


                                            function createNewRecord() {
                                                $.get("<?php echo base_url('setting/getForm/Area/Create'); ?>", function (response) {
                                                    if (response !== 0) {
                                                        loadAndDisplayForm(response);
                                                    }
                                                });
                                            }

                                            function updateRecord(id, name, fk_dis_id) {
                                                $.get("<?php echo base_url('setting/getForm/Area/Edit/'); ?>" + id + "/" + name + "/" + fk_dis_id, function (response) {
                                                    if (response !== 0) {
                                                        loadAndDisplayForm(response);
                                                    }
                                                });
                                            }

                                            function deleteRecord(id) {
                                                if (confirm('Are You Sure ato Delete This Record?')) {
                                                    $.get("<?php echo base_url('setting/delete'); ?>/Area/" + id, function (response) {
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