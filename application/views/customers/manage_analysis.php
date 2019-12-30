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

    #analysis-records tr td:nth-child(1) input:disabled{
        background-color: #FFF; 
    }

    #analysis-records tr td input.invalid{
        border: 1px solid rgba(255,0,0,0.5);
        color: red;
    }

    #analysis-records tr td select:disabled{
        background-color: #EBEBE4 !important;
        border: 1px solid rgba(0,0,0,0.1) !important;
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
        width:20px !important;
    }

    #analysis-records tr td:nth-child(1) .btn.btn-xs{
        cursor: pointer;
        border-radius: 0px !important;
        height: 20px !important;
        margin: auto 2.5px;
    } 

    #analysis-records td:nth-child(2), #analysis-records th:nth-child(2) {
        position:absolute;
        *position: relative; /*ie7*/
        left:75px; 
        width:100px;
    }

    #analysis-records td:nth-child(3), #analysis-records th:nth-child(3) {
        position:absolute;
        *position: relative; /*ie7*/
        left:175px; 
        width:75px;
    }

    .outer {
        position:relative
    }
    .inner {
        overflow-x:scroll;
        overflow-y:visible;
        width:auto; 
        margin-left:240px;
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

            //  print_r($custRecords);
            //   die();
            ?>
            <div class="col-xs-12">
                <div class="row">
                    <form autocomplete="off">
                        <div class="form-group col-md-3">
                            <label for="wa_type" class="control-label">Customer</label>
                            <select class="form-control get_wa_subtypes generate-table-element2" id="customer">
                                <option selected="" readonly>Select Customer</option>
                                <?php foreach ($custRecords as $row): ?>
                                    <option value="<?php echo $row->con_id ?>"><?php echo $row->full_name . ' (' . $row->con_area_name . ')'; ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>


                        <!--                        <div class="form-group col-md-3">
                                                    <label for="customer" class="control-label">Consumer</label>
                                                    <select class="form-control generate-table-element" id="customer">
                                                        <option value="0" selected disabled>Select Consumer</option>
                        <?php foreach ($conRecords as $customer): ?>
                                                                    <option value="<?php echo $customer->con_id ?>"><?php echo $customer->con_first_name ?> <?php echo $customer->con_last_name ?></option>
                        <?php endforeach ?>
                                                    </select>
                                                </div>-->
                        <!-- <div class="form-group col-md-5">
                            <h4 style="margin-top: 0px !important;">
                                <strong>select type of charts should be visible:</strong>
                            </h4>
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
                        </div> -->
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
                                            <th>Action</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <!--<th>Status</th>-->
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
                                            <!--microbilogy-->
                                            <th >Total Coli</th>
                                            <th >E. coli</th>
                                            <th>Enterococci</th>
                                            <th >Clostridium</th>
                                            <th >Legionella</th>
                                            <th >Heterotrophic Plate Count</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <!--<th>&nbsp;</th>-->
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
                                            <th>0</th>
                                            <th>0</th>
                                            <th>0</th>
                                            <th>0</th>
                                            <th>0</th>
                                            <th><500</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>HR</th>
                                            <!--<th>&nbsp;</th>-->
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
<!-- <script src="<?php //echo base_url('assets/bower_components/Flot/jquery.flot.axislabels.js')      ?>"></script> -->
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.resize.js') ?>"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $(".generate-table-element").change(function () {
            if ($('#customer').val() != "" && $('#customer').val() != null && $('#customer').val() != 0) {
                $('#analysis-records tbody').html("");
                appendNewRow();
            }
        });
        $(".generate-table-element2").change(function () {
            // console.log('clicked');
            if ($(this).val() != "" && $(this).val() != null && $(this).val() != 0) {
                $('#analysis-records tbody').html("");
                appendNewRow();
            }
        });


        // $('.chartIsVisible:checkbox').click(function(){
        //     showChart();
        // });
    });

    function saveChange(thatEle, rowno) {
        var element = $(thatEle);
        var eleType = element[0].nodeName.toLowerCase();
        var eleNameAsArray = element.attr('name');
        var eleIdx = $('' + eleType + '[name="' + eleNameAsArray + '"]').index(element);
        var customer = $('#customer').val();
        // var wa_type = $('#wa_type').val();
        // var wa_subtype = $('#wa_subtype').val();

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

        if ((eleNameAsArray == "date[]" || eleNameAsArray == "time[]") && (date != "" && time != "" && customer != "")) {
            var postData = {
                issingle: true,
                customer_id: $('#customer').val(),
                //   wa_type: wa_type,
                //  wa_subtype: wa_subtype,
                date: date,
                time: time
            }
            $.post('<?php echo base_url('Water_Analysis_Customers/getAnalysisRecords') ?>', postData, function (response) {
                if (response && response != null) {
                    oldData = JSON.parse(response);
                }

                $("#analysis-records tbody tr:nth-child(" + rowno + ") input, #analysis-records tbody tr:nth-child(" + rowno + ") select").each(function () {
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

        if ((eleNameAsArray != "date[]" && eleNameAsArray != "time[]") && (date != "" && time != "" && customer != "")) {
            var eleNameAsDB = eleNameAsArray.substring(0, eleNameAsArray.length - 2);
            var eleValue = element.val();
            var postData = {
                date: date,
                time: time,
                customer_id: customer,
                // wa_type: wa_type,
                //   wa_subtype: wa_subtype,
                column: eleNameAsDB,
                value: eleValue
            }
            if (date != "" && time != "" && customer != "") {
                $.post('<?php echo base_url('Water_Analysis_Customers/saveChanges') ?>', postData, function (response) {
                    response = JSON.parse(response);
                    notify(response);
                    //showChart();
                });
            }
        }
    }

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

    function deleteRow(thatbtn) {
        var deleteWhereData = {
            customer_id: $('#customer').val(),
            date: null,
            time: null
        }

        var thatRow = $(thatbtn).parent().parent();
        var hasRecord = false;
        thatRow.children().find('input, select').each(function () {
            if ($(this).attr('name') == "date[]") {
                deleteWhereData.date = $(this).val();
            } else if ($(this).attr('name') == "time[]") {
                deleteWhereData.time = $(this).val();
            } else if ($(this).val() != "" && $(this).val() != null) {
                hasRecord = true;
            }
        });

        var deleteResult = null;
        if (hasRecord && deleteWhereData.date != null && deleteWhereData.time != null) {
            $.post('<?php echo base_url('Water_Analysis_Customers/deleteAnalysisRecord'); ?>', deleteWhereData, function (response) {
                deleteResult = JSON.parse(response);
                notify(deleteResult);
            });
        }

        if ((!hasRecord) || deleteResult == null || deleteResult.class == 'success') {
            thatRow.remove();
            if ($('#analysis-records tbody tr').length < 1) {
                appendNewRow();
            }
        }
    }

    function appendNewRow(thatbtn) {
        // if (thatbtn) {
        //     var thatRow = $(thatbtn).parent().parent(); 
        //     console.log(thatRow);
        // }

        var newRowHtml = '<tr><td><span class="btn btn-xs btn-success" onclick="appendNewRow(this)"><i class="fa fa-plus"></i></span><span class="btn btn-xs btn-danger" onclick="deleteRow(this)"><i class="fa fa-trash"></i></span></td><td><input class="datepicker" type="text" name="date[]" value=""/></td><td><input type="text" name="time[]" class="timepicker"/></td><td><input class="digit" type="text" name="temp[]" disabled/></td><td><input class="digit" type="text" name="ph[]" disabled/></td><td><input class="digit" type="text" name="cond[]" disabled/></td><td><input class="digit" type="text" name="tds[]" disabled readonly/></td><td><input class="digit" type="text" name="chload[]" disabled/></td><td><input class="digit" type="text" name="talk[]" disabled/></td><td><input class="digit" type="text" name="cahard[]" disabled/></td><td><input class="digit" type="text" name="iron[]" disabled/></td><td><input class="digit" type="text" name="silica[]" disabled/></td><td><input class="digit" type="text" name="alum[]" disabled/></td><td><input class="digit" type="text" name="turb[]" disabled/></td><td><input class="digit" type="text" name="chlone[]" disabled/></td><td><input class="digit" type="text" name="lsi[]" disabled/></td><td><input class="digit" type="text" name="color[]" disabled/></td><td><input class="digit" type="text" name="lead[]" disabled/></td><td><input class="digit" type="text" name="tc[]" disabled/></td><td><input class="digit" type="text" name="ec[]" disabled/></td><td><input class="digit" type="text" name="ent[]" disabled/></td><td><input class="digit" type="text" name="hpc[]" disabled/></td><td><input class="digit" type="text" name="clost[]" disabled/></td><td><input class="digit" type="text" name="leg[]" disabled/></td>\n\
<td><input type="text" name="bact_total_coli[]" disabled/></td>\n\
<td><input type="text" name="bact_e_coli[]" disabled/></td>\n\
<td><input type="text" name="bact_enterococci[]" disabled/></td>\n\
<td><input type="text" name="bact_clostridium[]" disabled/></td>\n\
<td><input type="text" name="bact_legionella[]" disabled/></td>\n\
<td><input type="text" name="bact_heterotrophic_plate_count[]" disabled/></td>\n\
\n\
</tr>';

        $('#analysis-records tbody').append(newRowHtml);

        var rowCount = $('#analysis-records tbody tr').length;

        initialiseInputsAndRules(rowCount);
    }

    function initialiseInputsAndRules(rowno) {
        $('#analysis-records tbody tr:nth-child(' + rowno + ') .append-new-row').click(function () {
            appendNewRow();
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') .digit').inputFilter(function (value) {
            return /^-?\d*[.,]?\d*$/.test(value);
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') .datepicker').datepicker({
            dateFormat: 'd M yy'
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') .datepicker').keydown(function (e) {
            e.preventDefault();
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="temp[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="ph[]"]').blur(function () {
            if ($(this).val() != "") {
                var phVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(phVal);
            }
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="cond[]"]').blur(function () {
            var condIdx = $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="cond[]"]').index(this);
            if ($(this).val() != "") {
                var conVal = Math.round($(this).val());
                $(this).val(conVal);
                var tdsVal = parseFloat(conVal * 0.51).toFixed(2);
                $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="tds[]"]').each(function () {
                    if ($('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="tds[]"]').index(this) == condIdx) {
                        $(this).val(tdsVal);
                    }
                });
                if (conVal > 1000) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="tds[]"]').each(function () {
                    if ($('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="tds[]"]').index(this) == condIdx) {
                        $(this).val("");
                    }
                });
                $(this).removeClass('invalid');
            }
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="chload[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="talk[]"], input[name="cahard[]"]').blur(function () {
            if ($(this).val() != "") {
                var thisVal = Math.round($(this).val());
                $(this).val(thisVal);
            }
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="iron[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="silica[]"]').blur(function () {
            if ($(this).val() != "") {
                var silVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(silVal);
            }
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="alum[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="turb[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="chlone[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="lsi[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="color[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="lead[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="tc[]"], input[name="ec[]"], input[name="ent[]"], input[name="clost[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="hpc[]"]').blur(function () {
            if ($(this).val() != "") {
                var hpcVal = Math.round($(this).val());
                $(this).val(hpcVal);
            }
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') input[name="leg[]"]').blur(function () {
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

        $('#analysis-records tbody tr:nth-child(' + rowno + ') .timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 1,
            dynamic: true,
            dropdown: false,
            scrollbar: false
        });

        $('#analysis-records tbody tr:nth-child(' + rowno + ') .timepicker').on('keypress', function (event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });

        $("#analysis-records tbody tr:nth-child(" + rowno + ") input, #analysis-records tbody tr:nth-child(" + rowno + ") select").change(function () {
            saveChange(this, rowno);
        });
    }

    function notify(response) {
        if (response.class == 'success') {
            var timeout = 500;
        } else if (response.class == 'warning') {
            var timeout = 750;
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

</script>