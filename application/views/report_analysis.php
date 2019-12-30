<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<style type="text/css">
    div[data-notify="container"] {
        max-width: 200px !important;
        padding: 5px !important;
        margin-top: 50px !important;
    }

    #analysis-records tr:first-child th{
        background-color: rgba(0,0,0,0.25);
        font-size: 100%;
        padding: 5px;
    }
    #analysis-records tr th{
        background-color: rgba(0,0,0,0.05);
        padding: 2.5px;
    }

    #analysis-records td, #analysis-records th{
        text-align: center;
        border: 1px solid rgba(255,255,255,1);
        min-width: 75px;
    }

    .nowrap {
        white-space:nowrap;
    }    

    #analysis-records tr td input{
        margin: 0px;
        width: 75px;
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 0px !important;
        text-align: center;
    }

    #analysis-records tr td:nth-child(2) input{
        width: 100%;
    }


    #analysis-records tr td:nth-child(1) input, #analysis-records tr td:nth-child(2) input{
        width: 100%;
    }

    #analysis-records tr td:nth-child(1) input:disabled{
        background-color: #FFF; 
    }

    #analysis-records tr td input.invalid{
        border: 1px solid rgba(255,0,0,0.5);
        color: red;
    }


    #analysis-records{
        table-layout: fixed; 
        width: auto;
        *margin-left: -100px;/*ie7*/
    }

    #analysis-records td:first-child, #analysis-records th:first-child {
        position:absolute;
        *position: relative; /*ie7*/
        left:0; 
        width:110px;
    }

    #analysis-records td:nth-child(2), #analysis-records th:nth-child(2) {
        position:absolute;
        *position: relative; /*ie7*/
        left:110px; 
        width:100px;
    }

    .outer {
        position:relative
    }
    .inner {
        overflow-x:scroll;
        overflow-y:visible;
        width:auto; 
        margin-left:200px;
        min-height: 200px;
    }

    .ui-timepicker-standard a {
        padding: 0px !important;
        margin: 0px !important;
        font-size: 80%;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-<?php echo $pageIcon; ?>" aria-hidden="true"></i> <?php echo $pageTitle; ?><small>View Report /Update Records</small></h1>
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
                    <form autocomplete="off">
                        <div class="form-group col-md-3">
                            <label for="wa_type" class="control-label">Type</label>
                            <select class="form-control get_wa_subtypes" id="wa_type">
                                <option selected="" readonly>Select Analysis Type</option>
                                <?php foreach ($wa_types as $row): ?>
                                    <option value="<?php echo $row->wa_id ?>"><?php echo $row->wa_name ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3 ">  
                            <label for="wa_subtype" class="control-label ">Sub Type</label>
                            <select class="form-control subtypes generate-table-element" id="wa_subtype">
                                <option></option>
                            </select>
                        </div>
                        <!--                        <div class="form-group col-md-3">
                                                    <label for="consumer" class="control-label">Consumer</label>
                                                    <select class="form-control generate-table-element" id="consumer">
                                                        <option value="0" selected disabled>Select Consumer</option>
                        <?php foreach ($conRecords as $consumer): ?>
                                                                                    <option value="<?php echo $consumer->con_id ?>"><?php echo $consumer->con_first_name ?> <?php echo $consumer->con_last_name ?></option>
                        <?php endforeach ?>
                                                    </select>
                                                </div>-->
                        <div class="form-group col-md-2">
                            <label for="date_from" class="control-label">Date From</label>
                            <input type="text" value='' value="<?php echo $this->session->userdata('analysisWhereData')['dateFrom']; ?>" class="form-control generate-table-element datepicker" id="date_from" />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_to" class="control-label">Date To</label>
                            <input type="text" value='' value="<?php echo $this->session->userdata('analysisWhereData')['dateTo']; ?>" class="form-control generate-table-element datepicker" id="date_to" />
                        </div>

                        <div class="form-group col-md-5">
                            <h5 style="margin-top: 0px !important;">
                                <strong>Charts to Show:</strong>
                            </h5>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="TEMP">TEMP
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="pH">pH
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="CONDUCTIVITY & TDS">CONDUCTIVITY & TDS
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="CHLORIDE">CHLORIDE
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="HARDNESS">HARDNESS
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="IRON & ALUMINIUM">IRON & ALUMINIUM
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="SILICA">SILICA
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="TURBIDITY & CLRORINE">TURBIDITY & CLRORINE
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="chartIsVisible" value="Microbiology">Microbiology
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <!-- <div class="box-header">
                        <h3 class="box-title">CHEMSTRY AND MICROBIOLOGY ANALYSIS CONSUMER LOCATIONS</h3>
                        <button class="btn btn-sm btn-success pull-right">Save Changes</button>
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body outer">
                        <div id="table-container" class="inner">
                            <form autocomplete="off">
                                <table id="analysis-records" class="table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Temp</th>
                                            <th>pH</th>
                                            <th>COND</th>
                                            <th>TDS</th>
                                            <th>CHLOAD</th>
                                            <th>TALK</th>
                                            <th>Ca HARD</th>
                                            <th>IRON</th>
                                            <th>SILICA</th>
                                            <th>ALUM</th>
                                            <th>TURB</th>
                                            <th>CHLONE</th>
                                            <th>LSI</th>
                                            <th>COLOR</th>
                                            <th>LEAD</th>
                                            <th>TC</th>
                                            <th>EC</th>
                                            <th>ENT</th>
                                            <th>HPC</th>
                                            <th>CLOST</th>
                                            <th>LEG</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th><40</th>
                                            <th>&nbsp;</th>
                                            <th><1000</th>
                                            <th>&nbsp;</th>
                                            <th><150</th>
                                            <th colspan="2"></th>
                                            <th><0.20</th>
                                            <th>&nbsp;</th>
                                            <th><0.20</th>
                                            <th><4.00</th>
                                            <th>>0.3<2.0</th>
                                            <th>>0.2</th>
                                            <th><15</th>
                                            <th><0.010</th>
                                            <th>0</th>
                                            <th>0</th>
                                            <th>0</th>
                                            <th>500</th>
                                            <th>0</th>
                                            <th>10</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>HR</th>
                                            <th>&nbsp;</th>
                                            <th>&deg;C</th>
                                            <th>&nbsp;</th>
                                            <th>&micro;S</th>
                                            <th>&nbsp;</th>
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </form>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="<?php echo base_url('assets/plugins/tablenavigator-master/src/jquery.tablenavigator.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-notify-master/bootstrap-notify.min.js') ?>"></script>

<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.time.js') ?>"></script>
<!-- <script src="<?php //echo base_url('assets/bower_components/Flot/jquery.flot.axislabels.js')       ?>"></script> -->
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.resize.js') ?>"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $(".datepicker").datepicker({
            dateFormat: 'd M yy'
        });

        $(".datepicker").keydown(function (e) {
            e.preventDefault();
        });

        $(".generate-table-element").change(function () {

            // if(($('#consumer').val() != "" && $('#consumer').val() != null && $('#consumer').val() != 0) && $('#date_from').val() != "" && $('#date_to').val() != "") {
            if (($('#wa_subtype').val() != "" && $('#wa_subtype').val() != null && $('#wa_subtype').val() != 0) && $('#date_from').val() != "" && $('#date_to').val() != "") {
                $('#analysis-records tbody').empty();
                var dateFrom = new Date($('#date_from').val());
                var dateTo = new Date($('#date_to').val());
                var Difference_In_Time = dateTo.getTime() - dateFrom.getTime();
                var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

                if (Difference_In_Days < 0) {
                    alert("'date to' should be grater than 'date from'");
                    $(this).val("");
                    $('#analysis-records tbody').empty();
                    showChart();
                } else {
                    var postData = {
                        // consumer : $('#consumer').val(),
                        wa_type: $('#wa_type').val(),
                        wa_subtype: $('#wa_subtype').val(),
                        date_from: $('#date_from').val(),
                        date_to: $('#date_to').val()
                    }
                    $.post('<?php echo base_url('Water_Analysis/getAnalysisRecords') ?>', postData, function (response) {
                        response = JSON.parse(response);
                        if (response.length > 0) {
                            var sortedArray = [];
                            var newSortArrayByDate = [];
                            var currentSortDate = null;
                            for (var i = 0; i < response.length; i++) {
                                if (currentSortDate == null) {
                                    currentSortDate = response[i]['ana_date'];
                                    newSortArrayByDate.push(response[i]);
                                } else if (currentSortDate == response[i]['ana_date']) {
                                    newSortArrayByDate.push(response[i]);
                                } else {
                                    newSortArrayByDate.sort((a, b) => (a.ana_time_for_sort > b.ana_time_for_sort) ? 1 : ((b.ana_time_for_sort > a.ana_time_for_sort) ? -1 : 0));
                                    sortedArray.push(newSortArrayByDate);
                                    currentSortDate = response[i]['ana_date'];
                                    newSortArrayByDate = [];
                                    newSortArrayByDate.push(response[i]);
                                }

                                if (i == (response.length - 1)) {
                                    newSortArrayByDate.sort((a, b) => (a.ana_time_for_sort > b.ana_time_for_sort) ? 1 : ((b.ana_time_for_sort > a.ana_time_for_sort) ? -1 : 0));
                                    sortedArray.push(newSortArrayByDate);
                                }
                            }
                            for (var i = 0; i < sortedArray.length; i++) {
                                for (var j = 0; j < sortedArray[i].length; j++) {
                                    record = sortedArray[i][j];
                                    filledHtml = '<tr>';
                                    filledHtml += '<td><input type="text" name="date[]" value="' + record.ana_date + '" readonly/></td>';
                                    filledHtml += '<td><input type="text" name="time[]" value="' + record.ana_time + '" readonly/></td>';
                                    filledHtml += '<td><select name="status[]"><option value="" disabled></option>';
                                    if (record.ana_status == "Closed") {
                                        filledHtml += '<option value="Closed" selected>Closed</option>';
                                    } else {
                                        filledHtml += '<option value="Closed">Closed</option>';
                                    }
                                    if (record.ana_status == "Closed") {
                                        filledHtml += '<option value="No Water" selected>No Water</option>';
                                    } else {
                                        filledHtml += '<option value="No Water">No Water</option>';
                                    }
                                    if (record.ana_status == "Closed") {
                                        filledHtml += '<option value="Rain" selected>Rain</option>';
                                    } else {
                                        filledHtml += '<option value="Rain">Rain</option>';
                                    }
                                    filledHtml += '</select></td>';
                                    filledHtml += '<td><input class="digit" type="text" name="temp[]" value="' + record.ana_temp + '"/></td><td><input class="digit" type="text" name="ph[]" value="' + record.ana_ph + '"/></td><td><input class="digit" type="text" name="cond[]" value="' + record.ana_cond + '"/></td><td><input class="digit" type="text" name="tds[]" value="' + record.ana_tds + '" readonly/></td><td><input class="digit" type="text" name="chload[]" value="' + record.ana_chload + '"/></td><td><input class="digit" type="text" name="talk[]" value="' + record.ana_talk + '"/></td><td><input class="digit" type="text" name="cahard[]" value="' + record.ana_cahard + '"/></td><td><input class="digit" type="text" name="iron[]" value="' + record.ana_iron + '"/></td><td><input class="digit" type="text" name="silica[]" value="' + record.ana_silica + '"/></td><td><input class="digit" type="text" name="alum[]" value="' + record.ana_alum + '"/></td><td><input class="digit" type="text" name="turb[]" value="' + record.ana_turb + '"/></td><td><input class="digit" type="text" name="chlone[]" value="' + record.ana_chlone + '"/></td><td><input class="digit" type="text" name="lsi[]" value="' + record.ana_lsi + '"/></td><td><input class="digit" type="text" name="color[]" value="' + record.ana_color + '"/></td><td><input class="digit" type="text" name="lead[]" value="' + record.ana_lead + '"/></td><td><input class="digit" type="text" name="tc[]" value="' + record.ana_tc + '"/></td><td><input class="digit" type="text" name="ec[]" value="' + record.ana_ec + '"/></td><td><input class="digit" type="text" name="ent[]" value="' + record.ana_ent + '"/></td><td><input class="digit" type="text" name="hpc[]" value="' + record.ana_hpc + '"/></td><td><input class="digit" type="text" name="clost[]" value="' + record.ana_clost + '"/></td><td><input type="text" name="leg[]" value="' + record.ana_leg + '"/></td></tr>';
                                    $('#analysis-records tbody').append(filledHtml);
                                }
                            }
                            initialiseInputsAndRules();
                            $('#analysis-records input').trigger('blur');
                        } else {
                            notify({'class': 'warning', 'msg': 'No records available within selected days of consumers!'})
                        }
                        showChart();
                    });
                }
            } else {
                showChart();
            }
        });

        $('.chartIsVisible:checkbox').click(function () {
            showChart();
        });
    });

    function saveChange(thatEle) {
        var element = $(thatEle);
        var eleType = element[0].nodeName.toLowerCase();
        var eleNameAsArray = element.attr('name');
        var eleIdx = $('' + eleType + '[name="' + eleNameAsArray + '"]').index(element);
        //  var consumer = $('#consumer').val();
        var wa_type = $('#wa_type').val();
        var wa_subtype = $('#wa_subtype').val();

        var date = "";
        $('#analysis-records input[name="date[]"]').each(function () {
            if ($('#analysis-records input[name="date[]"]').index(this) == eleIdx) {
                date = $(this).val();
            }
        });

        var time = "";
        $('#analysis-records input[name="time[]"]').each(function () {
            if ($('#analysis-records input[name="time[]"]').index(this) == eleIdx) {
                time = $(this).val();
            }
        });

        if ((eleNameAsArray == "date[]" || eleNameAsArray == "time[]") && (date != "" && time != "" && wa_subtype != "")) {
            var postData = {
                issingle: true,
                // consumer: $('#consumer').val(),
                wa_type: $('#wa_type').val(),
                wa_subtype: $('#wa_subtype').val(),
                date: date,
                time: time
            }
            $.post('<?php echo base_url('Water_Analysis/getAnalysisRecords') ?>', postData, function (response) {
                if (response && response != null) {
                    oldData = JSON.parse(response);
                }
                $("#analysis-records tbody tr input, #analysis-records tbody tr select").each(function () {
                    if ($(this).attr('name') != 'date[]' && $(this).attr('name') != 'time[]') {
                        $(this).removeAttr('disabled');
                        if (oldData) {
                            var thisName = $(this).attr('name');
                            var thisNameAsDB = "ana_" + thisName.substring(0, thisName.length - 2);
                            if (oldData[thisNameAsDB] != null || oldData[thisNameAsDB] != "") {
                                $(this).val(oldData[thisNameAsDB]).trigger('blur');
                            }
                        } else {
                            $(this).val("").trigger('blur');
                        }
                    }
                });
            });
        }

        if ((eleNameAsArray != "date[]" && eleNameAsArray != "time[]") && (date != "" && time != "" && wa_subtype != "")) {
            var eleNameAsDB = eleNameAsArray.substring(0, eleNameAsArray.length - 2);
            var eleValue = element.val();
            var postData = {
                date: date,
                time: time,
                //  consumer: consumer,
                wa_type: wa_type,
                wa_subtype: wa_subtype,
                column: eleNameAsDB,
                value: eleValue
            }
            if (date != "" && time != "" && wa_subtype != "") {
                $.post('<?php echo base_url('Water_Analysis/saveChanges') ?>', postData, function (response) {
                    response = JSON.parse(response);
                    notify(response);
                    showChart();
                });
            }
        }
    }

    function initialiseInputsAndRules() {
        $('#analysis-records tbody tr .digit').inputFilter(function (value) {
            return /^-?\d*[.,]?\d*$/.test(value);
        });

        $('#analysis-records tbody tr input[name="temp[]"]').blur(function () {
            if ($(this).val() != "") {
                var tempVal = parseFloat($(this).val()).toFixed(1);
                $(this).val(tempVal);
                if (tempVal > 40) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="ph[]"]').blur(function () {
            if ($(this).val() != "") {
                var phVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(phVal);
            }
        });

        $('#analysis-records tbody tr input[name="cond[]"]').blur(function () {
            var condIdx = $('#analysis-records tbody tr input[name="cond[]"]').index(this);
            if ($(this).val() != "") {
                var conVal = Math.round($(this).val());
                $(this).val(conVal);
                var tdsVal = parseFloat(conVal * 0.51).toFixed(2);
                $('#analysis-records tbody tr input[name="tds[]"]').each(function () {
                    if ($('#analysis-records tbody tr input[name="tds[]"]').index(this) == condIdx) {
                        $(this).val(tdsVal);
                    }
                });
                if (conVal > 1000) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $('#analysis-records tbody tr input[name="tds[]"]').each(function () {
                    if ($('#analysis-records tbody tr input[name="tds[]"]').index(this) == condIdx) {
                        $(this).val("");
                    }
                });
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="chload[]"]').blur(function () {
            if ($(this).val() != "") {
                var chloadVal = Math.round($(this).val());
                $(this).val(chloadVal);
                if (chloadVal > 150) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="talk[]"], input[name="cahard[]"]').blur(function () {
            if ($(this).val() != "") {
                var thisVal = Math.round($(this).val());
                $(this).val(thisVal);
            }
        });

        $('#analysis-records tbody tr input[name="iron[]"]').blur(function () {
            if ($(this).val() != "") {
                var ironVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(ironVal);
                if (ironVal > 0.20) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="silica[]"]').blur(function () {
            if ($(this).val() != "") {
                var silVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(silVal);
            }
        });

        $('#analysis-records tbody tr input[name="alum[]"]').blur(function () {
            if ($(this).val() != "") {
                var alumVal = parseFloat($(this).val()).toFixed(3);
                $(this).val(alumVal);
                if (alumVal > 0.20) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="turb[]"]').blur(function () {
            if ($(this).val() != "") {
                var turbVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(turbVal);
                if (turbVal > 4.00) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="chlone[]"]').blur(function () {
            if ($(this).val() != "") {
                var chloneVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(chloneVal);
                if (chloneVal < 0.30 || chloneVal > 2.00) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="lsi[]"]').blur(function () {
            if ($(this).val() != "") {
                var lsiVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(lsiVal);
                if (lsiVal < 0) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="color[]"]').blur(function () {
            if ($(this).val() != "") {
                var colorVal = Math.round($(this).val());
                $(this).val(colorVal);
                if (colorVal < 15) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="lead[]"]').blur(function () {
            if ($(this).val() != "") {
                var leadVal = parseFloat($(this).val()).toFixed(1);
                $(this).val(leadVal);
                if (leadVal > 0) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="tc[]"], input[name="ec[]"], input[name="ent[]"], input[name="clost[]"]').blur(function () {
            if ($(this).val() != "") {
                var thisVal = Math.round($(this).val());
                $(this).val(thisVal);
                if (thisVal > 0) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr input[name="hpc[]"]').blur(function () {
            if ($(this).val() != "") {
                var hpcVal = Math.round($(this).val());
                $(this).val(hpcVal);
            }
        });

        $('#analysis-records tbody tr input[name="leg[]"]').blur(function () {
            if ($(this).val() != "") {
                var legVal = Math.round($(this).val());
                $(this).val(legVal);
                if (legVal > 10) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $("#analysis-records tbody tr input, #analysis-records tbody tr select").change(function () {
            saveChange(this);
        });
    }


// for horizontal scroll on table
    (function () {
        function scrollHorizontally(e) {
            e = window.event || e;
            var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
            document.getElementById('table-container').scrollLeft -= (delta * 40); // Multiplied by 40
            e.preventDefault();
        }
        if (document.getElementById('table-container').addEventListener) {
            // IE9, Chrome, Safari, Opera
            document.getElementById('table-container').addEventListener("mousewheel", scrollHorizontally, false);
            // Firefox
            document.getElementById('table-container').addEventListener("DOMMouseScroll", scrollHorizontally, false);
        } else {
            // IE 6/7/8
            document.getElementById('table-container').attachEvent("onmousewheel", scrollHorizontally);
        }
    })();

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


    // functions for initialize and generate line chart
    var previousPoint = null;

    $.fn.UseTooltip = function (xDatesArray) {
        $(this).bind("plothover", function (event, pos, item) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var x = item.datapoint[0];
                    var y = item.datapoint[1];
                    showTooltip(item.pageX, item.pageY, xDatesArray[x - 1] + "<br/>" + "<strong>" + y + "</strong> (" + item.series.label + ")");
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 20,
            border: '2px solid #000',
            padding: '2px',
            size: '10',
            'border-radius': '6px 6px 6px 6px',
            'background-color': '#fff',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

    function generateChart(ChartBox, xDatesArray, yDataArrays) {
        var yAxisDataArray = [];
        var xAxisDatesArray = [];
        for (var i = 0; i < yDataArrays.length; i++) {
            newData = [];
            for (var j = 0; j < yDataArrays[i].data.length; j++) {
                newData.push([j + 1, yDataArrays[i].data[j]]);
            }
            yAxisDataArray.push({
                label: yDataArrays[i].title,
                data: newData,
                color: yDataArrays[i].color,
                points: {fillColor: yDataArrays[i].color, show: true},
                lines: {show: true}
            });
        }
        for (var i = 0; i < xDatesArray.length; i++) {
            xAxisDatesArray.push([i + 1, xDatesArray[i]]);
        }
        $.plot($("#" + ChartBox), yAxisDataArray, {
            grid: {hoverable: true, clickable: false},
            legend: {
                noColumns: 0,
                labelFormatter: function (label, series) {
                    return "<font color=\"#000\" style=\"padding:5px;\">" + label + "</font>";
                },
                backgroundColor: "#FFF",
                backgroundOpacity: 0.9,
                labelBoxBorderColor: "#000",
                position: "nw"
            }
        });
        $("#" + ChartBox).UseTooltip(xDatesArray);
    }

    function showChart() {
        var reqChartArray = [];
        $('.section-charts').empty();
        $('.chartIsVisible:checkbox:checked').each(function () {
            var chartName = $(this).val();
            $('.section-charts').append('<div class="col-12"><div class="box box-default"><div class="box-header with-border"> <i class="fa fa-bar-chart-o"></i><h3 class="box-title">' + chartName + '</h3><div class="box-tools pull-right"> <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button></div></div><div class="box-body"><div id="' + chartName.replace(/[^A-Z0-9]+/ig, "_").toLowerCase() + '" style="height: 300px;"></div></div></div></div>');
            reqChartArray.push(chartName);
        });
        prepareAndGenerateCharts(reqChartArray);
    }

    function prepareAndGenerateCharts(reqChartArray) {
        if (reqChartArray.length > 0) {

            if (($('#wa_subtype').val() != "" && $('#wa_subtype').val() != null && $('#wa_subtype').val() != 0) && $('#date_from').val() != "" && $('#date_to').val() != "") {
                var postData = {wa_type: $('#wa_type').val(), wa_subtype: $('#wa_subtype').val(), date_from: $('#date_from').val(), date_to: $('#date_to').val()}
                $.post('<?php echo base_url('Water_Analysis/getAnalysisRecords') ?>', postData, function (response) {
                    response = JSON.parse(response);
                    //console.log(response);
                    if (response.length > 0) {
                        var sortedArray = [];
                        var newSortArrayByDate = [];
                        var currentSortDate = null;
                        for (var i = 0; i < response.length; i++) {
                            if (currentSortDate == null) {
                                currentSortDate = response[i]['ana_date'];
                                newSortArrayByDate.push(response[i]);
                            } else if (currentSortDate == response[i]['ana_date']) {
                                newSortArrayByDate.push(response[i]);
                            } else {
                                newSortArrayByDate.sort((a, b) => (a.ana_time_for_sort > b.ana_time_for_sort) ? 1 : ((b.ana_time_for_sort > a.ana_time_for_sort) ? -1 : 0));
                                sortedArray.push(newSortArrayByDate);
                                currentSortDate = response[i]['ana_date'];
                                newSortArrayByDate = [];
                                newSortArrayByDate.push(response[i]);
                            }

                            if (i == (response.length - 1)) {
                                newSortArrayByDate.sort((a, b) => (a.ana_time_for_sort > b.ana_time_for_sort) ? 1 : ((b.ana_time_for_sort > a.ana_time_for_sort) ? -1 : 0));
                                sortedArray.push(newSortArrayByDate);
                            }
                        }

                        var dateArray = [], tempData = [], phData = [], condData = [], tdsData = [], chloadData = [], talkData = [], cahardData = [], ironData = [], alumData = [], silicaData = [], turbData = [], chloneData = [], tcData = [], ecData = [], entData = [], hpcData = [], clostData = [], legData = [];

                        for (var i = 0; i < sortedArray.length; i++) {
                            for (var j = 0; j < sortedArray[i].length; j++) {
                                record = sortedArray[i][j];
                                dateArray.push(record.ana_date + " " + record.ana_time);
                                tempData.push(record.ana_temp);
                                phData.push(record.ana_ph);
                                condData.push(record.ana_cond);
                                tdsData.push(record.ana_tds);
                                chloadData.push(record.ana_chload);
                                talkData.push(record.ana_talk);
                                cahardData.push(record.ana_cahard);
                                ironData.push(record.ana_iron);
                                alumData.push(record.ana_alum);
                                silicaData.push(record.ana_silica);
                                turbData.push(record.ana_turb);
                                chloneData.push(record.ana_chlone);
                                tcData.push(record.ana_tc);
                                ecData.push(record.ana_ec);
                                entData.push(record.ana_ent);
                                hpcData.push(record.ana_hpc);
                                clostData.push(record.ana_clost);
                                legData.push(record.ana_leg);
                            }
                        }

                        reqChartItemsData = [];

                        for (var i = 0; i < reqChartArray.length; i++) {
                            var tempArray = [];
                            switch (reqChartArray[i]) {
                                case "TEMP":
                                    tempArray.push({title: "TEMP", color: "#5B9BD5", data: tempData});
                                    break;
                                case "pH":
                                    tempArray.push({title: "pH", color: "#5B9BD5", data: phData});
                                    break;
                                case "CONDUCTIVITY & TDS":
                                    tempArray.push({title: "COND", color: "#FFC000", data: condData});
                                    tempArray.push({title: "TDS", color: "#ED7D31", data: tdsData});
                                    break;
                                case "CHLORIDE":
                                    tempArray.push({title: "CHLORIDE", color: "#00B050", data: chloadData});
                                    break;
                                case "HARDNESS":
                                    tempArray.push({title: "TALK", color: "#5B9BD5", data: talkData});
                                    tempArray.push({title: "ca Hard", color: "#ED7D31", data: cahardData});
                                    break;
                                case "IRON & ALUMINIUM":
                                    tempArray.push({title: "IRON", color: "#7030A0", data: ironData});
                                    tempArray.push({title: "ALUM", color: "#C55A11", data: alumData});
                                    break;
                                case "SILICA":
                                    tempArray.push({title: "SILICA", color: "#67A2D8", data: silicaData});
                                    break;
                                case "TURBIDITY & CLRORINE":
                                    tempArray.push({title: "TURB", color: "#5B9BD5", data: turbData});
                                    tempArray.push({title: "CHLONE", color: "#ED7D31", data: chloneData});
                                    break;
                                case "Microbiology":
                                    tempArray.push({title: "TC", color: "#5B9BD5", data: turbData});
                                    tempArray.push({title: "EC", color: "#ED7D31", data: chloneData});
                                    tempArray.push({title: "ENT", color: "#A5A5A5", data: turbData});
                                    tempArray.push({title: "HPC", color: "#FFC000", data: chloneData});
                                    tempArray.push({title: "CLOST", color: "#4472C4", data: turbData});
                                    tempArray.push({title: "LEG", color: "#70AD47", data: chloneData});
                                    break;
                            }
                            reqChartItemsData[reqChartArray[i].replace(/[^A-Z0-9]+/ig, "_").toLowerCase()] = tempArray;
                        }

                        console.log(reqChartItemsData);

                        for (var k in reqChartItemsData) {
                            if (reqChartItemsData.hasOwnProperty(k)) {
                                generateChart(k, dateArray, reqChartItemsData[k]);
                            }
                        }
                    }
                });
            }
        }
    }

    //function for alert and message notifaction
    function notify(response) {
        if (response.class == 'success') {
            var timeout = 500;
        } else if (response.class == 'warning') {
            var timeout = 1000;
        } else if (response.class == 'danger') {
            var timeout = 0;
        }

        $.notify({
            message: response.msg,
        }, {
            element: 'body',
            position: null,
            type: response.class,
            placement: {
                from: "top",
                align: "right"
            },
            delay: timeout,
            timer: timeout,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
        });
    }
    $('.get_wa_subtypes').change(function () {
        var filterdata = {
            wa_type_id: $(this).val(),
        }
        $.post("<?php echo base_url(); ?>Water_Analysis/getWASubTypes", filterdata, function (response) {
            var data = JSON.parse(response);
            $('.subtypes').html(data.html);
        });
    });
</script>