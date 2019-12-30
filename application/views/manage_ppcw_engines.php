<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<style type="text/css">
    div[data-notify="container"] {
        max-width: 200px !important;
        padding: 5px !important;
        margin-top: 50px !important;
    }

    .nowrap {
        white-space:nowrap;
    }

    #ppcw-boilers>thead>tr:first-child>th{
        font-size: 110%;
        font-weight: bold;
    }

    #ppcw-boilers>thead>tr>th{
        background-color: rgba(60, 141, 188, 0.2);
        font-size: 90%;
        padding: 5px;
        text-align: center;
        border: 1px solid rgba(0,0,0,0.1); 
    }

    #ppcw-boilers>tbody>tr>td{
        text-align: center;
        border: 1px solid rgba(0,0,0,0.1); 
    }

    #ppcw-boilers>thead>tr:last-child>th{
        background-color: rgba(60, 141, 188, 0.05);
        font-size: 90%;
        padding: 5px;
    }

    .outer {
        position:relative
    }

    .inner {
        overflow-x:scroll;
        overflow-y:visible;
        width:auto; 
        margin-left:327.5px;
    }

    #ppcw-boilers{
        table-layout: fixed; 
        width: auto;
        *margin-left: -100px;
    }

    #ppcw-boilers thead tr th, #ppcw-boilers tbody tr td{
        min-width: 80px !important;
        max-width: 80px !important;
    }

    #ppcw-boilers thead tr th:nth-child(1), #ppcw-boilers tbody tr td:nth-child(1){
        position:absolute;
        *position: relative;
        left:0px; 
        max-width:75px !important;
        min-width:75px !important;
    }

    #ppcw-boilers thead tr:nth-child(1) th:nth-child(2), #ppcw-boilers thead tr:nth-child(2) th:nth-child(2){
        position:absolute;
        *position: relative;
        left:75px; 
        max-width:260px !important;
        min-width:260px !important;
    }

    #ppcw-boilers thead tr:nth-child(3) th:nth-child(2), #ppcw-boilers thead tr:nth-child(4) th:nth-child(2),
    #ppcw-boilers tbody tr td:nth-child(2){
        position:absolute;
        *position: relative;
        left:75px; 
        max-width:100px !important;
        min-width:100px !important;
    }

    #ppcw-boilers thead tr:nth-child(3) th:nth-child(3), #ppcw-boilers thead tr:nth-child(4) th:nth-child(3),
    #ppcw-boilers tbody tr td:nth-child(3){
        position:absolute;
        *position: relative;
        left:175px; 
        max-width:80px !important;
        min-width:80px !important;
    }

    #ppcw-boilers thead tr:nth-child(3) th:nth-child(4), #ppcw-boilers thead tr:nth-child(4) th:nth-child(4),
    #ppcw-boilers tbody tr td:nth-child(4){
        position:absolute;
        *position: relative;
        left:255px; 
        max-width:80px !important;
        min-width:80px !important;
    }

    .ui-timepicker-standard a {
        padding: 0px !important;
        margin: 0px !important;
        font-size: 80%;
    }


    #ppcw-boilers>tbody>tr>td .btn{
        display: inline-block;
        margin: auto 2.5px;
    }

    #ppcw-boilers>tbody>tr>td input, #ppcw-boilers>tbody>tr>td select{
        min-width: 100%;
        max-width: 100%;
        min-height: 25px;
        max-height: 25px;
    }

    #ppcw-boilers tbody tr td input, #ppcw-boilers tbody tr td select{
        text-align: center;
    }   

    #ppcw-boilers tbody tr td select:disabled{
        background-color: #EBEBE4;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        color: black !important;
    }
    #ppcw-boilers tr td input.invalid{
        border: 1px solid rgba(255,0,0,0.5);
        color: red;
    }
</style>

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
            ?>
            <div class="col-xs-12" style="display:none">
                <div class="row">
                    <form autocomplete="off">
                        <div class="form-group col-md-6">
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
            <div class="col-12">
                <div class="box">
                    <!-- <div class="box-header">
                        <h3 class="box-title">CHEMSTRY AND MICROBIOLOGY ANALYSIS CONSUMER LOCATIONS</h3>
                        <button class="btn btn-sm btn-success pull-right">Save Changes</button>
                    </div> -->
                    <!-- /.box-header -->
                    <div class="box-body outer">
                        <div id="table-container" class="inner" style="display: none;">
                            <form autocomplete="off">
                                <table id="ppcw-boilers" class="table-bordered">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="<?php echo base_url('assets/plugins/tablenavigator-master/src/jquery.tablenavigator.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-notify-master/bootstrap-notify.min.js') ?>"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.time.js') ?>"></script>
<!-- <script src="<?php //echo base_url('assets/bower_components/Flot/jquery.flot.axislabels.js')                         ?>"></script> -->
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.resize.js') ?>"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $(".generate-table-element").on('change blur keypress keydown keyup', function () {
            // var year = $('#year').val();
            // var month = $('#month').val();
            var boilers = $('#boilers').val();
            $('#ppcw-boilers').empty();
            $.post('<?php echo base_url('power_plant_cooling_water_engine/getPPCWEgineBulidRecords') ?>', {}, function (response) {
                if (response && response != null) {
                    oldData = JSON.parse(response);
                    var totalEngines = oldData.totalEngines;
                    var engineRecords = oldData.engineRecords;
                    var totalBuildings = oldData.totalBuildings;
                    var buildingRecords = oldData.buildingRecords;



                    var tableHead = "";
                    // first row of thead
                    // for engine
                    tableHead += '<thead>';
                    tableHead += '<tr><th rowspan="2">&nbsp;</th><th colspan="3">Date | Time | Sampler</th>';
                    tableHead += '<th colspan="' + totalEngines + '" style="background-color:' + getRandomColor(i) + ' !important; ">Engines</th>';
                    // for building
                    tableHead += '<th colspan="' + totalBuildings + '" style="background-color:' + getRandomColor(i) + ' !important; ">Buildings</th>';
                    tableHead += '</tr>'

                    tableHead += '<tr><th>&nbsp;</th><th colspan="3">dd-mm-yyyy    |   hh:mm A</th>';
                    for (var i = 0; i < engineRecords.length; i++) {
                        tableHead += '<th>' + engineRecords[i].engine_name + '</th>';
                    }
                    // tableHead += '</tr>'
                    for (var i = 0; i < buildingRecords.length; i++) {
                        tableHead += '<th>' + buildingRecords[i].building_name + '</th>';
                    }
                    tableHead += '</tr>'
                    tableHead += '</tr></thead>'

                    tableHead += '<tbody></tbody>';
                    $('#ppcw-boilers').html(tableHead);
                    $('#table-container').show();
                    appendNewRow();


                }
            });

        });
        $('#year').inputFilter(function (value) {
            return /^\d*$/.test(value);
        });
        $('#boilers').select2({
            'placeholder': 'select boilers'
        });
        $(".generate-table-element").trigger('change');
    });
    function saveChange(thatEle, rowno) {
        var element = $(thatEle);
        var eleType = element[0].nodeName.toLowerCase();
        var eleNameAsArray = element.attr('name');
        // var eleBoiler = element.data('boiler');
        var type = element.data('type'); // engine or building
        var type_id = element.data('id'); // engine or building id
        var eleIdx = $('' + eleType + '[name="' + eleNameAsArray + '"]').index(element);
        var boilers = $('#boilers').val();
        var date = $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') input[name="date[]"]').val();
        var time = $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') input[name="time[]"]').val();
        var sampler = $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') input[name="sampler[]"]').val();
        if ((eleNameAsArray == "date[]" || eleNameAsArray == "time[]" || eleNameAsArray == "sampler[]") && (date != "" && time != "" && sampler != "")) {
            var postData = {
                //  type: type,
                date: date,
                time: time,
                sampler: sampler,
                //  type_id: type_id
            }

            $.post('<?php echo base_url('power_plant_cooling_water_engine/getPPCWEnginesRecords') ?>', postData, function (response) {
                if (response && response != null) {
                    oldData = JSON.parse(response);
                }

                $("#ppcw-boilers tbody tr:nth-child(" + rowno + ") input, #ppcw-boilers tbody tr:nth-child(" + rowno + ") select").each(function () {
                    if ($(this).attr('name') != 'date[]' && $(this).attr('name') != 'time[]' && $(this).attr('name') != 'sampler[]') {
                        $(this).removeAttr('disabled');
                        if (oldData && oldData != [] && oldData.length > 0) {
                            // console.log('in if');
                            // console.log(oldData);
                            var thisName = $(this).attr('name');
                            //  var thisNameAsDB = "ppcwb_" + thisName.substring(0, thisName.length - 2);
                            //   var thisBoiler = $(this).data('boiler');
                            for (var i = 0; i < oldData.length; i++) {
                                if ((oldData[i].ppcwe_details_type_id != null && oldData[i].ppcwe_details_type_value != "" && $(this).data('id') == oldData[i].ppcwe_details_type_id)) {
                                    $(this).val(oldData[i].ppcwe_details_type_value).trigger('blur');
                                }
                            }
                        } else {
                            //   console.log('in else');
                            $(this).val("").trigger('blur');
                        }
                    }
                });
            });
        }

        if ((eleNameAsArray != "date[]" && eleNameAsArray != "time[]" && eleNameAsArray != "sampler[]") && (date != "" && time != "" && sampler != "")) {

            var eleNameAsDB = eleNameAsArray.substring(0, eleNameAsArray.length - 2);
            var eleValue = element.val();
            var postData = {
                date: date,
                time: time,
                sampler: sampler,
                type: type,
                type_id: type_id,
                column: eleNameAsDB,
                type_value: eleValue
            }
            if (postData.date != "" && postData.time != "" && postData.boiler != "") {
                $.post('<?php echo base_url('power_plant_cooling_water_engine/saveChanges') ?>', postData, function (response) {
                    response = JSON.parse(response);
                    notify(response);
                });
            }
        }
    }

    function appendNewRow() {
        $.post('<?php echo base_url('power_plant_cooling_water_engine/getPPCWEgineBulidRecords') ?>', {}, function (response) {
            if (response && response != null) {
                var oldData = JSON.parse(response);
                var totalEngines = oldData.totalEngines;
                var engineRecords = oldData.engineRecords;
                var totalBuildings = oldData.totalBuildings;
                var buildingRecords = oldData.buildingRecords;
                //  console.log(engineRecords);

                // var boilers = $('#boilers').val();
                var tableBody = '';
                tableBody += '<tr><td><span class="btn btn-xs btn-success" onclick="appendNewRow(this)"><i class="fa fa-plus"></i></span><span class="btn btn-xs btn-danger" onclick="deleteRow(this)"><i class="fa fa-trash"></i></span></td><td><input class="datepicker" type="text" name="date[]" value=""/></td><td><input type="text" name="time[]" class="timepicker"/></td><td><input type="text" name="sampler[]"/></td>';
                for (var i = 0; i < engineRecords.length; i++) {
                    tableBody += '<td><input class="digit" type="text" data-id="' + engineRecords[i].engine_id + '" data-type="engine" name="' + engineRecords[i].engine_name + '[]" disabled/></td></td>';
                }
                for (var i = 0; i < buildingRecords.length; i++) {
                    tableBody += '<td><input class="digit" type="text" data-id="' + buildingRecords[i].building_id + '" data-type="building" name="' + buildingRecords[i].building_name + '[]" disabled/></td></td>';
                }
                tableBody += '</tr>'

                $('#ppcw-boilers tbody').append(tableBody);
                var rowCount = $('#ppcw-boilers tbody tr').length;
                initialiseInputsAndRules(rowCount);
            }
        });
    }

    function deleteRow(thatbtn) {
        var deleteWhereData = {
            boilers: $('#boilers').val(),
            date: null,
            time: null,
            sampler: null
        }

        var thatRow = $(thatbtn).parent().parent();
        var hasRecord = false;
        thatRow.children().find('input, select').each(function () {
            if ($(this).attr('name') == "date[]") {
                deleteWhereData.date = $(this).val();
            } else if ($(this).attr('name') == "time[]") {
                deleteWhereData.time = $(this).val();
            } else if ($(this).attr('name') == "sampler[]") {
                deleteWhereData.sampler = $(this).val();
            } else if ($(this).val() != "" && $(this).val() != null) {
                hasRecord = true;
            }
        });
        var deleteResult = null;
        if (hasRecord && deleteWhereData.date != null && deleteWhereData.time != null) {
            $.post('<?php echo base_url('power_plant_cooling_water_engine/deletePPCEEnginesRecord'); ?>', deleteWhereData, function (response) {
                deleteResult = JSON.parse(response);
                notify(deleteResult);
            });
        }

        if ((!hasRecord) || deleteResult == null || deleteResult.class == 'success') {
            thatRow.remove();
            if ($('#ppcw-boilers tbody tr').length < 1) {
                appendNewRow();
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
    function initialiseInputsAndRules(rowno) {
        $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') .append-new-row').click(function () {
            appendNewRow();
        });
        $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') .digit').inputFilter(function (value) {
            return /^-?\d*[.,]?\d*$/.test(value);
        });
        $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') .datepicker').datepicker({
            dateFormat: 'd M yy',
            //beforeShowDay: enableAllTheseDays
        });
        $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') .datepicker').keydown(function (e) {
            e.preventDefault();
        });
        $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') input[name="ph[]"]').blur(function () {
            if ($(this).val() != "") {
                var phVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(phVal);
            }
        });
        $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') .timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 1,
            dynamic: true,
            dropdown: false,
            scrollbar: false
        });
        $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') .timepicker').on('keypress', function (event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        });
        $("#ppcw-boilers tbody tr:nth-child(" + rowno + ") input, #ppcw-boilers tbody tr:nth-child(" + rowno + ") select").change(function () {
            saveChange(this, rowno);
        });




        $('#ppcw-boilers tbody tr:nth-child(' + rowno + ') input.digit[type="text"]').blur(function () {
            if ($(this).val() != "") {
                var tempVal = parseFloat($(this).val()).toFixed(1);
                $(this).val(tempVal);
                if (tempVal < 670 || tempVal > 1000) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });





    }

    // function enableAllTheseDays(date) {
    //     var enableDays = getDaysInMonth();
    //     var sdate = $.datepicker.formatDate( 'd-m-yy', date)
    //     if($.inArray(sdate, enableDays) != -1) {
    //         return [true];
    //     }
    //     return [false];
    // }


    // function getDaysInMonth() {
    //     var year = $('#year').val();
    //     var month = 11;
    //     var date = new Date(Date.UTC(year, month, 1));

    //     console.log(date);

    //     function pad(s) { return (s < 10) ? '0' + s : s; }
    //     var days = [];
    //     while (date.getMonth() === month) {
    //         var d = new Date(date);
    //         days.push([pad(d.getDate()), pad(d.getMonth()), d.getFullYear()].join('-'));
    //         date.setDate(date.getDate() + 1);
    //     }
    //     return days;
    // }

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

    function getRandomColor(i) {
        var colors = ['#C6E0B4', '#FFC000', '#00B0F0', '#217346', '#FFFF00', '#BDD7EE', '#C6E0B4', '#FFC000', '#00B0F0', '#217346', '#FFFF00', '#BDD7EE'];
        return colors[i];
    }





</script>