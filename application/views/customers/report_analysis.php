<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css' rel='stylesheet' type='text/css'>-->



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

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
    .sorting_1{
        text-align: center;
        font-size: 22px;
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
                                    <option value="<?php echo $row->con_id ?>"
                                    <?php
                                    if (isset($this->session->userdata('analysisCustWhereData')['customer_id']) && $this->session->userdata('analysisCustWhereData')['customer_id'] == $row->con_id) {
                                        echo 'Selected';
                                    }
                                    ?>
                                            ><?php echo $row->full_name . ' (' . $row->area_name . ')'; ?> </option>
                                        <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_from" class="control-label">Date From</label>
                            <input type="text" value="<?php echo isset($this->session->userdata('analysisCustWhereData')['dateFrom']) ? $this->session->userdata('analysisCustWhereData')['dateFrom'] : date('d M Y'); ?>" class="form-control generate-table-element datepicker" id="date_from" />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_to" class="control-label">Date To</label>
                            <input type="text" value="<?php echo isset($this->session->userdata('analysisCustWhereData')['dateFrom']) ? $this->session->userdata('analysisCustWhereData')['dateFrom'] : date('d M Y'); ?>" class="form-control generate-table-element datepicker" id="date_to" />
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
                                        <th>Action</th>
                                        <th rowspan="2">Date</th>
                                        <!--<th rowspan="2">Status</th>-->
                                        <th class="no-bottom-border">Time</th>
                                        <th class="no-bottom-border">Temp</th>
                                        <th rowspan="2">pH</th>
                                        <th class="no-bottom-border">COND</th>
                                        <th rowspan="2">TDS</th>
                                        <th class="no-bottom-border">CHLOAD</th>
                                        <th class="no-bottom-border">TALK</th>
                                        <th class="no-bottom-border">Ca HARD</th>
                                        <th class="no-bottom-border">IRON</th>
                                        <th class="no-bottom-border">SILICA</th>
                                        <th class="no-bottom-border">ALUM</th>
                                        <th class="no-bottom-border">TURB</th>
                                        <th class="no-bottom-border">CHLONE</th>
                                        <th class="no-bottom-border">LSI</th>
                                        <th class="no-bottom-border">COLOR</th>
                                        <th class="no-bottom-border">LEAD</th>
                                        <th class="no-bottom-border">TC</th>
                                        <th class="no-bottom-border">EC</th>
                                        <th class="no-bottom-border">ENT</th>
                                        <th class="no-bottom-border">HPC</th>
                                        <th class="no-bottom-border">CLOST</th>
                                        <th class="no-bottom-border">LEG</th>
                                        <!--microbilogy-->
                                        <th class="no-bottom-border">Total Coli</th>
                                        <th class="no-bottom-border">E. coli</th>
                                        <th class="no-bottom-border">Enterococci</th>
                                        <th class="no-bottom-border">Clostridium</th>
                                        <th class="no-bottom-border">Legionella</th>
                                        <th class="no-bottom-border">Heterotrophic Plate Count</th>
                                        <!-- <th rowspan="2">ACTION</th> -->
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>HR</th>
                                        <th>&deg;C</th>
                                        <th>&micro;S</th>
                                        <th>mg/L CL<sup>-</sup></th>
                                        <th colspan="2">mg/L CaCO<sub>3</sub></th>
                                        <th>mg/L Fe</th>
                                        <th>mg/L SiO<sub>2</sub></th>
                                        <th>mg/L AL</th>
                                        <th>NTU</th>
                                        <th>mg/L CL<sub>2</sub></th>
                                        <th>(30&deg;C)</th>
                                        <th>mg/L PtCo</th>
                                        <th>mg/L</th>
                                        <th>/100 mL</th>
                                        <th>/100 mL</th>
                                        <th>/100 mL</th>
                                        <th>/1 mL</th>
                                        <th>/100 mL</th>
                                        <th>/250 mL</th>
                                        <th>Cfu/100 ml</th>
                                        <th>Cfu/100 ml</th>
                                        <th>Cfu/100 ml</th>
                                        <th>Cfu/100 ml</th>
                                        <th>Cfu/100 ml</th>
                                        <th>Cfu/ml</th>
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

<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".datepicker").keydown(function (e) {
            e.preventDefault();
        });

        $(".datepicker").datepicker({
            dateFormat: 'd M yy'
        });

        $('#analysis-records').DataTable({
            'processing': true,
            'serverSide': true,
            'searching': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?php echo base_url('Water_Analysis_Customers/getRecordsForDataTable') ?>'
            },
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 2,
                // rightColumns: 1
            },
            'columns': [
//                {data: 'wa_subtype_name'},
                {
                    "mData": null,
                    "bSortable": false,
                    "mRender": function (o) {
                        return '<span class="send_mail" onclick="sendMailCheck(' + o.ana_report_sent + ',' + o.ana_id + ',this)"><i class="fa fa-envelope" aria-hidden="true" style="color: green;"></i></span>';
                    }
                },
                {data: 'ana_date'},
//                {data: 'ana_status'},
                {data: 'ana_time'},
                {data: 'ana_temp'},
                {data: 'ana_ph'},
                {data: 'ana_cond'},
                {data: 'ana_tds'},
                {data: 'ana_chload'},
                {data: 'ana_talk'},
                {data: 'ana_cahard'},
                {data: 'ana_iron'},
                {data: 'ana_silica'},
                {data: 'ana_alum'},
                {data: 'ana_turb'},
                {data: 'ana_chlone'},
                {data: 'ana_lsi'},
                {data: 'ana_color'},
                {data: 'ana_lead'},
                {data: 'ana_tc'},
                {data: 'ana_ec'},
                {data: 'ana_ent'},
                {data: 'ana_hpc'},
                {data: 'ana_clost'},
                {data: 'ana_leg'},
                {data: 'ana_bact_total_coli'},
                {data: 'ana_bact_e_coli'},
                {data: 'ana_bact_enterococci'},
                {data: 'ana_bact_clostridium'},
                {data: 'ana_bact_legionella'},
                {data: 'ana_bact_heterotrophic_plate_count'},
            ],

            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                        //'pdfHtml5'
            ],
            // "columnDefs": [ {
            //     "targets": -1,
            //     "data": null,
            //     "sortable": false,
            //     "defaultContent": "<button>Click!</button>"
            // }]
        });

    });
    function sendMailCheck(status, ana_id, ele = null) {
        var sentStatus = status ? status : 0;
        var analysisId = ana_id ? ana_id : 0;
        if (analysisId) {
            if (!sentStatus) {
                Swal.fire({
                    title: 'You want to Send mail again ?',
                    text: "Mail will be send again!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Send!'
                }).then((result) => {
                    if (result.value) {
                        sendingMail(analysisId);
                    } else {
                        showPopUp('Canceled!', 'Mail sending canceled.', 'error');
                    }
                })
            }

        } else {
            showPopUp('Error!', 'analysis id not found', 'warning');

    }

    }
    function sendingMail(ana_id) {
        var mailData = {
            ana_id: ana_id,
        }

        $.post("<?php echo base_url(); ?>Water_Analysis_Customers/sendingMailSetup", mailData, function (response) {
            if (response.status) {
                showPopUp('Sent!', 'Email Sent Successfully!', 'success');
            } else {
                showPopUp('Error', response.message, 'error');
            }
        });

    }
    function showPopUp(title, content, type) {
        Swal.fire(title, content, type);
    }

//    var oTable = $('#myDataTable').dataTable({
//        // "bServerSide": true,
//        "sAjaxSource": '<?php echo base_url('Water_Analysis_Customers/getRecordsForDataTable') ?>',
//        "bProcessing": true,
//        "sPaginationType": "full_numbers",
//        "aoColumns": [
//            {"mData": null},
//            {"mData": "ana_date", "sTitle": "Name", "sWidth": "20%"},
//            {"mData": "ana_cahard", "sTitle": "UserName", "sWidth": "20%"},
//            {"mData": "ana_cahard", "sTitle": "Passowrd", "sWidth": "20%"},
//            {"mData": "ana_cahard", "sTitle": "Email", "sWidth": "20%"},
//            {"mData": "ana_cahard", "sTitle": "IsActive", "sWidth": "20%"},
//            {
//                "mData": null,
//                "bSortable": false,
//                "mRender": function (o) {
//                    return '<a href=#/' + o.userid + '>' + 'Edit' + '</a>';
//                }
//            }
//        ]
//    });



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