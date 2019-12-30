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
        <h1><i class="fa fa-list" aria-hidden="true"></i> <?php echo $module; ?> Records</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-danger" onclick="createNewRecord();">Create New <?php echo $module; ?></button>			
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php
                            $records = json_decode(json_encode($records), True);
                            foreach ($records as $row) {
                                ?>
                                <li class="list-group-item">
                                    <div class="btns-box">
                                        <button class="btn btn-danger" onclick="deleteRecord(<?php echo $row[$module_prefix . "id"] ?>);"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        <button class="btn btn-warning" onclick="updateRecord(<?php echo $row[$module_prefix . "id"] ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </div>
                                    <?php echo $row[$module_prefix . "name"] ?>
                                    <?php
                                    if (isset($row[$module_prefix . "unit"])) {
                                        echo ' ' . $row[$module_prefix . "unit"];
                                    }
                                    ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="form-modal"></div>

<script type="text/javascript">
    function createNewRecord() {
        var data = {
            module: "<?php echo $module; ?>",
            method: 'Create'
        }
        $.post("<?php echo base_url('setting/getForm'); ?>", data, function (response) {
            if (response !== 0) {
                loadAndDisplayForm(response);
            }
        });
    }

    function updateRecord(id, name) {
        var data = {
            module: "<?php echo $module; ?>",
            method: 'Edit',
            id: id
        }
        $.post("<?php echo base_url('setting/getForm'); ?>", data, function (response) {
            if (response !== 0) {
                loadAndDisplayForm(response);
            }
        });
    }

    function deleteRecord(id) {
        if (confirm('Are You Sure ato Delete This Record?')) {
            $.get("<?php echo base_url('setting/delete'); ?>/<?php echo $module; ?>/" + id, function (response) {
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