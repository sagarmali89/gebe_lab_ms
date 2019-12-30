<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
    table>thead>tr>th {
        vertical-align: middle !important;
        text-align: center !important;
    }

    table>thead>tr>th.no-bottom-border{
        border-bottom: none;
    }

    table>thead>tr:last-child>th {
        font-size: 85%;
    }

    table>thead>tr>th, .table>tbody>tr>td {
        border: 0.5px solid rgba(0,0,0,0.1); 
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        color: black !important;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-<?php echo $pageIcon; ?>" aria-hidden="true"></i> <?php echo $pageTitle; ?><small>Add/Update/Delete</small></h1>
    </section>
    <section class="content">
        <div class="row">
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
            <div class="col-xs-12">
                <div class="row">
                    <form id="filter-form" autocomplete="off">
                        <div class="form-group col-md-2">
                            <label for="year" class="control-label">Year</label>
                            <input type="text" class="form-control generate-table-element" type="text" maxlength="4" pattern="\d{4}" id="year" value="<?php echo date("Y"); ?>" />
                        </div>
                        <div class="form-group col-md-2">
                            <?php $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'); ?>
                            <label for="month" class="control-label">Month</label>
                            <select class="form-control generate-table-element" id="month">
                                <?php foreach ($months as $month): ?>
                                    <option value="<?php echo $month; ?>"<?php echo (date('F') == $month) ? " selected" : ""; ?>><?php echo $month; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="display: none;">
                            <label for="boilers" class="control-label">Boilers</label>
                            <select class="form-control generate-table-element" id="boilers" multiple="true">
                                <?php foreach ($boilersRecords as $boilers): ?>
                                    <option value="<?php echo $boilers->boiler_id; ?>" selected><?php echo $boilers->boiler_name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- <div class="box-header">
                        <h3 class="box-title">CHEMSTRY AND MICROBIOLOGY ANALYSIS CONSUMER LOCATIONS</h3>
                        <button class="btn btn-sm btn-success pull-right">Save Changes</button>
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="table-container">
                            <table id="ppswb-records"  class="nowrap display dataTable cell-border" width="100%">
                                <thead>
                                    <tr>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.full.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        generateHeaders();

        $('#year').inputFilter(function (value) {
            return /^\d*$/.test(value);
        });

        $('#boilers').select2({
            'placeholder': 'select boilers'
        });

        $('#ppswb-records').DataTable({
            'processing': true,
            'serverSide': true,
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?php echo base_url('power_plant_cooling_water_boiler/getRecordsForDataTable') ?>'
            },
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 2,
            },
            'columns': generateColumnData()
        });
    });

    $('#filter-form select, #filter-form input').change(function () {
        var datatable = $('#ppswb-records').DataTable();
        generateHeaders(datatable);
        var filterdata = {
            boilers: $('#boilers').val(),
            month: $('#month').val(),
            year: $('#year').val()
        }
        $.post("<?php echo base_url(); ?>power_plant_cooling_water_boiler/updateFilterSession", filterdata, function () {
            $('#ppswb-records').DataTable().ajax.reload();
        });
    });

    (function ($) {
        $.fn.inputFilter = function (inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
            });
        };
    }(jQuery));

    function generateHeaders(datatable) {
        var selectedBoilers = $('#boilers').val();
        $('#ppswb-records thead tr:nth-child(1)').empty();
        $('#ppswb-records thead tr:nth-child(2)').empty();
        $('#ppswb-records thead tr:nth-child(3)').empty();
        $('#ppswb-records thead tr:nth-child(1)').html('<th rowspan="3">Date Time</th><th rowspan="3">Sampler</th>');
        for (var i = 0; i < selectedBoilers.length; i++) {
            $('#ppswb-records thead tr:nth-child(1)').append('<th class="boiler-' + selectedBoilers[i] + '" colspan="7">' + $('#boilers option[value="' + selectedBoilers[i] + '"]').text() + '</th>');
            $('#ppswb-records thead tr:nth-child(2)').append('<th class="boiler-' + selectedBoilers[i] + '" rowspan="2">ph</th><th class="boiler-' + selectedBoilers[i] + '">COND</th><th class="boiler-' + selectedBoilers[i] + '">Chloride</th><th class="boiler-' + selectedBoilers[i] + '">P-Alkalinity</th><th class="boiler-' + selectedBoilers[i] + '">Phosphate</th><th class="boiler-' + selectedBoilers[i] + '">Sulphite</th><th class="boiler-' + selectedBoilers[i] + '" rowspan="2">Clarity</th>');
            $('#ppswb-records thead tr:nth-child(3)').append('<th class="boiler-' + selectedBoilers[i] + '"></th><th class="boiler-' + selectedBoilers[i] + '"></th><th class="boiler-' + selectedBoilers[i] + '"></th><th class="boiler-' + selectedBoilers[i] + '"></th><th class="boiler-' + selectedBoilers[i] + '"></th>');
        }
    }

    function generateColumnData() {
        var selectedBoilers = $('#boilers').val();
        var column = [{data: 'ppcwb_datetime'}, {data: 'ppcwb_sampler'}];
        for (var i = 0; i < selectedBoilers.length; i++) {
            column.push({data: "ppcwb_ph_" + selectedBoilers[i]});
            column.push({data: "ppcwb_cond_" + selectedBoilers[i]});
            column.push({data: "ppcwb_chloride_" + selectedBoilers[i]});
            column.push({data: "ppcwb_palkalinity_" + selectedBoilers[i]});
            column.push({data: "ppcwb_phosphate_" + selectedBoilers[i]});
            column.push({data: "ppcwb_sulfite_" + selectedBoilers[i]});
            column.push({data: "ppcwb_clarity_" + selectedBoilers[i]});
        }
        return column;
    }
</script>