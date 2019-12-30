<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link href='https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css' rel='stylesheet' type='text/css'>



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
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-<?php echo $pageIcon; ?>"></i> <?php echo $pageTitle; ?><br/>
            <small>View</small>
        </h1>
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
                        <div class="form-group col-md-3">
                            <label for="wa_type" class="control-label">Customer</label>
                            <select class="form-control get_wa_subtypes" id="wa_type">
                                <option selected="" readonly>Select Customer</option>
                                <?php foreach ($custRecords as $row): ?>
                                    <option value="<?php echo $row->con_id ?>"><?php echo $row->full_name . ' (' . $row->area_name . ')'; ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!--                        <div class="form-group col-md-3 ">  
                                                    <label for="wa_subtype" class="control-label ">Sub Type</label>
                                                    <select class="form-control subtypes generate-table-element2" id="wa_subtype">
                                                        <option></option>
                                                    </select>
                                                </div>-->
                        <!--                        <div class="form-group col-md-3">
                                                    <label for="consumer" class="control-label">Consumer</label>
                                                    <select class="form-control generate-table-element" id="consumer">
                                                        <option value="ALL" selected>All Consumers</option>
                        <?php foreach ($conRecords as $consumer): ?>
                                                                                                        <option value="<?php echo $consumer->con_id ?>"><?php echo $consumer->con_first_name ?> <?php echo $consumer->con_last_name ?></option>
                        <?php endforeach ?>
                                                    </select>
                                                </div>-->
                        <div class="form-group col-md-2">
                            <label for="date_from" class="control-label">Date From</label>
                            <input type="text" value="<?php echo $this->session->userdata('analysisWhereData')['dateFrom']; ?>" class="form-control generate-table-element datepicker" id="date_from" />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_to" class="control-label">Date To</label>
                            <input type="text" value="<?php echo $this->session->userdata('analysisWhereData')['dateTo']; ?>" class="form-control generate-table-element datepicker" id="date_to" />
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
                            <table id="analysis-records"  class="nowrap display dataTable cell-border" width="100%">
                                <thead>
                                    <tr>
                                        <th>mg/L AL</th>
                                        <th>NTU</th>
                                        <th>(30&deg;C)</th>
                                        <th>mg/L PtCo</th>
                                        <th>mg/L</th>
                                        <th>/100 mL</th>
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
<!--
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>-->




<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $(".datepicker").keydown(function (e) {
            e.preventDefault();
        });

        $(".datepicker").datepicker({
            dateFormat: 'd M yy'
        });

        $('#analysis-records').DataTable({
            // 'processing': true,
            'serverSide': true,
            "searching": false,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?php echo base_url('Water_Analysis_Customers/getRecordsForDataTable2') ?>'
            },
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 2,
                // rightColumns: 1
            },
            'columns': [
                {data: 'ana_date'},
                {data: 'ana_status'},
                {data: 'ana_time'},
                {data: 'ana_temp'},
                {data: 'ana_ph'},
                {data: 'ana_cond'},
            ],

            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
                    // "columnDefs": [ {
                    //     "targets": -1,
                    //     "data": null,
                    //     "sortable": false,
                    //     "defaultContent": "<button>Click!</button>"
                    // }]
        });

    });


    $('#filter-form select, #filter-form input').change(function () {
        var filterdata = {
            // consumer: $('#consumer').val(),
            customer_id: $('#wa_type').val(),
            dateFrom: $('#date_from').val(),
            dateTo: $('#date_to').val()
        }

        $.post("<?php echo base_url(); ?>Water_Analysis_Customers/updateFilterSession", filterdata, function () {
            $('#analysis-records').DataTable().ajax.reload();
        });
    });

//    $('.get_wa_subtypes').change(function () {
//        var filterdata = {
//            wa_type_id: $(this).val(),
//        }
//        $.post("<?php echo base_url(); ?>Water_Analysis_Customers/getWASubTypes", filterdata, function (response) {
//            var data = JSON.parse(response);
//            $('.subtypes').html(data.html);
//        });
//    });
</script>