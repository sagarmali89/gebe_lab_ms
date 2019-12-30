<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-<?php echo $pageIcon; ?>"></i> <?php echo $pageTitle; ?><br/>
            <small>View/Export</small>
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
            $years = array('2010', '2011', '2012', '2013', '2014', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024',)
            ?>
            <div class="col-xs-12">
                <div class="row">
                    <form id="filter-form" autocomplete="off" method="post">

                        <div class="form-group col-md-2">
                            <label for="date_from"  class="control-label">Date From</label>
                            <input type="text"  value="<?php
                            if (isset($filter_date_from)) {
                                echo date('d M Y', strtotime($filter_date_from));
                            } else {
                                echo date('01 M Y');
                            }
                            ?>" name="filter_date_from" class="form-control generate-table-element datepicker" id="date_from" />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_to" class="control-label">Date To</label>
                            <input type="text" name="filter_date_to" value="<?php
                            if (isset($filter_date_to)) {
                                echo date('d M Y', strtotime($filter_date_to));
                            } else {
                                echo date('t M Y');
                            }
                            ?>" class="form-control generate-table-element datepicker" id="date_to" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body outer">
                        <div class="inner">
                            <table id="ppcw-engines-reports" class="table-bordered" width="100%">
                                <?php
                                $tableBody = '';
                                $tableBody .= '<thead><tr>';
                                $tableBody .= '<th>Date Time</td>';
                                $tableBody .= '<th>Sampler</th>';
                                foreach ($engineRecords as $e_rec_head) {
                                    $tableBody .= '<th>' . $e_rec_head->engine_name . '</th>';
                                }
                                foreach ($buildingRecords as $b_rec_head) {
                                    $tableBody .= '<th>' . $b_rec_head->building_name . '</th>';
                                }
                                $tableBody .= '</tr></thead>';
                                echo $tableBody;
                                $tableBody = '';

                                foreach ($ppcw_engines_records as $ppcw_row) {
                                    $tableBody .= '<tr>';
                                    $tableBody .= '<td>' . $ppcw_row->ppcwe_datetime . '</td>';
                                    $tableBody .= '<td>' . $ppcw_row->ppcwe_sampler . '</td>';

                                    $extra_details = isset($tableData[$ppcw_row->ppcwe_id]) ? $tableData[$ppcw_row->ppcwe_id] : null;
                                    // echo '<pre>';
                                    // print_r($extra_details);
                                    // die();
                                    foreach ($engineRecords as $engingRow) {
                                        $type_val = '';
                                        foreach ($extra_details as $eDetRow) {
                                            if ($eDetRow->ppcwe_details_type == 'engine' && $eDetRow->ppcwe_details_type_id == $engingRow->engine_id) {
                                                $type_val = $eDetRow->ppcwe_details_type_value;
                                                break;
                                            }
                                        }
                                        $tableBody .= '<td>';
                                        $tableBody .= $type_val;
                                        $tableBody .= '</td>';
                                    }
                                    foreach ($buildingRecords as $buildingRow) {
                                        $type_val = '';
                                        foreach ($extra_details as $eDetRow) {
                                            if ($eDetRow->ppcwe_details_type == 'building' && $eDetRow->ppcwe_details_type_id == $buildingRow->building_id) {
                                                $type_val = $eDetRow->ppcwe_details_type_value;
                                                break;
                                            }
                                        }
                                        $tableBody .= '<td>';
                                        $tableBody .= $type_val;
                                        $tableBody .= '</td>';
                                    }

                                    $tableBody .= '</tr>';
                                }
                                echo $tableBody;
                                ?>

                            </table>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row section-charts">

        </div>

        <!--<div id="placeholder" style="width:600px;height:300px"></div>-->

    </section>
</div>
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

<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.time.js') ?>"></script>
<!-- <script src="<?php //echo base_url('assets/bower_components/Flot/jquery.flot.axislabels.js')                          ?>"></script> -->
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.resize.js') ?>"></script>

<script>
    $(document).ready(function () {

        $(".datepicker").datepicker({
            dateFormat: 'd M yy'
        });

        $(".datepicker").keydown(function (e) {
            e.preventDefault();
        });

        $('#ppcw-engines-reports').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'excel',
            ],
        });
        $('.generate-table-element').on('change', function () {
            console.log('changed');
            $('#filter-form').submit();
        });
        $.plot($("#placeholder"), [[[0, 0], [1, 1]]], {yaxis: {max: 1}});

        var postData = {
            from_api: 1,
            filter_date_from: $('#from_date').val(),
            filter_date_to: $('to_date').val(),
        }
        $.post('<?php echo base_url('power_plant_cooling_water_engine/getAnalysisRecords') ?>', postData, function (response) {
            response = JSON.parse(response);
            console.log(response);
            var reqChartArray = [];
            $('.section-charts').empty();
            // generate charts for engines
            for (var i = 0; i < response.enginesRecords.length; i++) {
                xyData = [];
                var chartData = [response.engineChartValues[response.enginesRecords[i]['engine_id']]];
                var chartOptions = {
                    yaxis: {max: 1600},
                    // xaxis: {max: 0}
                };
                var chartName = response.enginesRecords[i]['engine_name'];
                var chartID = response.enginesRecords[i]['engine_id'];
                $('.section-charts').append('<div class="col-12"><div class="box box-default"><div class="box-header with-border"> <i class="fa fa-bar-chart-o"></i><h3 class="box-title">' + chartName + '</h3><div class="box-tools pull-right"> <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button></div></div><div class="box-body"><div id="chart_engine_' + chartID + '" style="height: 300px;"></div></div></div></div>');
                var chartPlaceholder = $("#chart_engine_" + response.enginesRecords[i]['engine_id']);
                generateChart(chartPlaceholder, chartData, chartOptions);
            }
            
              // generate charts for buildings
            for (var i = 0; i < response.buildingRecords.length; i++) {
                xyData = [];
                var chartData = [response.buildingChartValues[response.buildingRecords[i]['building_id']]];
                var chartOptions = {
                    yaxis: {max: 1600},
                    // xaxis: {max: 0}
                };
                var chartName = response.buildingRecords[i]['building_name'];
                var chartID = response.buildingRecords[i]['building_id'];
                $('.section-charts').append('<div class="col-12"><div class="box box-default"><div class="box-header with-border"> <i class="fa fa-bar-chart-o"></i><h3 class="box-title">' + chartName + '</h3><div class="box-tools pull-right"> <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button></div></div><div class="box-body"><div id="chart_building_' + chartID + '" style="height: 300px;"></div></div></div></div>');
                var chartPlaceholder = $("#chart_building_" + response.enginesRecords[i]['engine_id']);
                generateChart(chartPlaceholder, chartData, chartOptions);
            }
            
            //  prepareAndGenerateCharts(reqChartArray);

        });

        function generateChart(chartPlaceholder, chartData, chartOptions) {
            $.plot(chartPlaceholder, chartData, chartOptions);
        }

    });

</script>
