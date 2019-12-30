<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-<?php echo $pageIcon; ?>"></i> <?php echo $pageTitle; ?><br/>
            <small>Add/Edit</small>
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
                            <label for="year" class="control-label">Year</label>
                            <select class="form-control generate-table-element" id="year" name="filter_year">
                                <?php foreach ($years as $year): ?>
                                    <option value="<?php echo $year; ?>"<?php
                                    if ($filter_year) {
                                        echo ($filter_year == $year) ? " selected" : "";
                                    } else {
                                        echo (date('Y') == $year) ? " selected" : "";
                                    }
                                    ?> ><?php echo $year; ?></option>
                                        <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <?php $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'); ?>
                            <label for="month" class="control-label">Month</label>
                            <select class="form-control generate-table-element" id="month" name="filter_month">
                                <?php foreach ($months as $month): ?>
                                    <option value="<?php echo $month; ?>"<?php
                                    if ($filter_month) {
                                        echo ($filter_month == $month) ? " selected" : "";
                                    } else {
                                        echo (date('F') == $month) ? " selected" : "";
                                    }
                                    ?> ><?php echo $month; ?></option>
                                        <?php endforeach ?>
                            </select>
                        </div>
                        <!--<input type="submit">-->
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body outer">
                        <div class="inner">
                            <table id="ppcw-engines" class="table-bordered">
                                <?php
                                $tableBody = '';
                                $tableBody .= '<thead><tr>';
                                $tableBody .= '<th>Date Time</td>';
                                $tableBody .= '<th>Sampler</th>';
                                foreach ($engineRecords as $e_rec_head) {
                                    $tableBody .= '<td>' . $e_rec_head->engine_name . '</td>';
                                }
                                foreach ($buildingRecords as $b_rec_head) {
                                    $tableBody .= '<td>' . $b_rec_head->building_name . '</td>';
                                }
                                $tableBody .= '</tr></thead>';
                                echo $tableBody;
                                $tableBody = '';

                                foreach ($ppcw_engines_records as $ppcw_row) {
                                    $tableBody .= '<tr>';
                                    $tableBody .= '<th>' . $ppcw_row->ppcwe_datetime . '</td>';
                                    $tableBody .= '<th>' . $ppcw_row->ppcwe_sampler . '</td>';

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

<script>
    $(document).ready(function () {

        $('#ppcw-engines').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'excel',
            ],
            columnDefs: [{
                    targets: -1,
                    visible: false
                }]
        });
        $('.generate-table-element').on('change', function () {
            console.log('changed');
            $('#filter-form').submit();
        });

    });

</script>
