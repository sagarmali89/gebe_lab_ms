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
            <div class="col-xs-12">
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
<!-- <script src="<?php //echo base_url('assets/bower_components/Flot/jquery.flot.axislabels.js') ?>"></script> -->
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.Flot.resize.js') ?>"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $(".generate-table-element").on('change blur keypress keydown keyup' ,function(){
            // var year = $('#year').val();
            // var month = $('#month').val();
            var boilers = $('#boilers').val();
            $('#ppcw-boilers').empty();
            //if((year != "" && year != null && year.length == 4) && (month != "" && month != null) && (boilers != "" && boilers != null)) {
            if(boilers != "" && boilers != null) {
                var tableHead = "";
                // first row of thead
                // THIS IS YEAR ROW //
                tableHead += '<thead><tr><th rowspan="2">&nbsp;</th><th colspan="3">&nbsp;</th>';
                for (var i = 0; i < boilers.length; i++) {  
                    tableHead += '<th colspan="7" style="background-color:'+getRandomColor(i)+' !important; ">'+$('#boilers option[value="'+boilers[i]+'"]').text()+'</th>';
                }
                tableHead += '</tr>'

                // second row of thead
                // THIS IS month ROW //
                tableHead += '<tr><th>&nbsp;</th><th colspan="3">&nbsp;</th>';
                for (var i = 0; i < boilers.length; i++) {                    
                    tableHead += '<th rowspan="3">pH</th><th rowspan="2">COND</th><th>Chloride</th><th>P-Alkalinity</th><th>Phosphate</th><th>Sulfite</th><th rowspan="3">Clarity</th>';
                }
                tableHead += '</tr>'

                // third row of thead
                tableHead += '<tr><th>&nbsp;</th><th>Date</th><th>Time</th><th>Sampler</th>';
                for (var i = 0; i < boilers.length; i++) {                    
                    tableHead += '<th>Cl</th><th>CaCO<sub>3</sub></th><th>PO<sub>4</sub></th><th>SO<sub>3</sub></th>';
                }
                tableHead += '</tr>'

                // fourth row of thead
                tableHead += '<tr><th>&nbsp;</th><th>dd-mm-yyyy</th><th>hh:mm A</th><th></th>';
                for (var i = 0; i < boilers.length; i++) {                    
                    tableHead += '<th>&#956;S</th><th>mg/L</th><th>mg/L</th><th>mg/L</th><th>mg/L</th>';
                }
                tableHead += '</tr></thead>'

                tableHead += '<tbody></tbody>';

                $('#ppcw-boilers').html(tableHead);
                $('#table-container').show();
                appendNewRow();
            }
        });

        $('#year').inputFilter(function(value){return /^\d*$/.test(value);});

        $('#boilers').select2({
            'placeholder' : 'select boilers'
        });

        $(".generate-table-element").trigger('change');
    });

    function saveChange(thatEle, rowno){
        var element = $(thatEle);
        var eleType = element[0].nodeName.toLowerCase();
        var eleNameAsArray = element.attr('name');
        var eleBoiler = element.data('boiler');
        var eleIdx = $(''+eleType+'[name="'+eleNameAsArray+'"]').index(element);

        var boilers = $('#boilers').val();

        var date = $('#ppcw-boilers tbody tr:nth-child('+rowno+') input[name="date[]"]').val();
        var time = $('#ppcw-boilers tbody tr:nth-child('+rowno+') input[name="time[]"]').val();
        var sampler = $('#ppcw-boilers tbody tr:nth-child('+rowno+') input[name="sampler[]"]').val();
        
        if ((eleNameAsArray == "date[]" || eleNameAsArray == "time[]" || eleNameAsArray == "sampler[]") && (date != "" && time != "" && sampler != "" && boilers.length > 0)) {
            var postData = {
                boilers : boilers,
                date : date,
                time : time,
                sampler : sampler
            }

            $.post('<?php echo base_url('power_plant_cooling_water_boiler/getPPCWBoilersRecords') ?>', postData, function(response){
                if (response && response != null) {
                    oldData = JSON.parse(response);
                }
                
                $("#ppcw-boilers tbody tr:nth-child("+rowno+") input, #ppcw-boilers tbody tr:nth-child("+rowno+") select").each(function(){
                    if($(this).attr('name') != 'date[]' && $(this).attr('name') != 'time[]' && $(this).attr('name') != 'sampler[]'){
                        $(this).removeAttr('disabled');
                        if (oldData && oldData.length > 0) {
                            var thisName = $(this).attr('name');
                            var thisNameAsDB = "ppcwb_"+thisName.substring(0, thisName.length-2);    
                            var thisBoiler = $(this).data('boiler');
                            for (var i = 0; i < oldData.length; i++) {
                                if ((oldData[i][thisNameAsDB] != null || oldData[i][thisNameAsDB] != "") && oldData[i]['ppcwb_boiler'] == thisBoiler) {
                                    $(this).val(oldData[i][thisNameAsDB]).trigger('blur');
                                }   
                            }
                        } else {
                            $(this).val("").trigger('blur');
                        }
                    }
                });
            });
        }

        if ((eleNameAsArray != "date[]" && eleNameAsArray != "time[]" && eleNameAsArray != "sampler[]") && (date != "" && time != "" && sampler != "" && boilers.length > 0)) {

            var eleNameAsDB = eleNameAsArray.substring(0, eleNameAsArray.length-2);
            var eleValue = element.val();
            var postData = {
                date : date,
                time : time,
                sampler : sampler,
                boiler : eleBoiler,
                column : eleNameAsDB,
                value : eleValue
            }
            if (postData.date != "" && postData.time != "" && postData.boiler != "") {
                $.post('<?php echo base_url('power_plant_cooling_water_boiler/saveChanges') ?>', postData, function(response){
                    response = JSON.parse(response);
                    notify(response);
                });
            }
        }
    }   

    function appendNewRow(){
        var boilers = $('#boilers').val();
        var tableBody = '';
        tableBody += '<tr><td><span class="btn btn-xs btn-success" onclick="appendNewRow(this)"><i class="fa fa-plus"></i></span><span class="btn btn-xs btn-danger" onclick="deleteRow(this)"><i class="fa fa-trash"></i></span></td><td><input class="datepicker" type="text" name="date[]" value=""/></td><td><input type="text" name="time[]" class="timepicker"/></td><td><input type="text" name="sampler[]"/></td>';
        for (var i = 0; i < boilers.length; i++) {                    
            tableBody += '<td><input class="digit" type="text" name="ph[]" data-boiler="'+boilers[i]+'" disabled/></td><td><input class="digit" type="text" name="cond[]" data-boiler="'+boilers[i]+'" disabled/></td><td><input class="digit" type="text" name="chloride[]" data-boiler="'+boilers[i]+'" disabled/></td><td><input class="digit" type="text" name="palkalinity[]" data-boiler="'+boilers[i]+'" disabled/></td><td><input class="digit" type="text" name="phosphate[]" data-boiler="'+boilers[i]+'" disabled/></td><td><input class="digit" type="text" name="sulfite[]" data-boiler="'+boilers[i]+'" disabled/></td><td><select name="clarity[]" data-boiler="'+boilers[i]+'" disabled><option value="" selected disabled></option><option value="Clear">Clear</option><option value="L-Turb">L-Turb</option><option value="Turbid">Turbid</option></select></td>';
        }
        tableBody += '</tr>'

        $('#ppcw-boilers tbody').append(tableBody);

        var rowCount = $('#ppcw-boilers tbody tr').length;

        initialiseInputsAndRules(rowCount);
    }

    function deleteRow(thatbtn){
        var deleteWhereData = {
            boilers : $('#boilers').val(),
            date : null,
            time : null,
            sampler : null
        }

        var thatRow = $(thatbtn).parent().parent(); 
        var hasRecord = false;
        thatRow.children().find('input, select').each(function(){
            if ($(this).attr('name') == "date[]") {
                deleteWhereData.date = $(this).val();
            } else if($(this).attr('name') == "time[]"){
                deleteWhereData.time = $(this).val();
            } else if($(this).attr('name') == "sampler[]"){
                deleteWhereData.sampler = $(this).val();
            } else if($(this).val() != "" && $(this).val() != null){
                hasRecord = true;
            }
        });

        var deleteResult = null;
        if (hasRecord && deleteWhereData.date != null && deleteWhereData.time != null) {
            $.post('<?php echo base_url('power_plant_cooling_water_boiler/deletePPCEBoilersRecord'); ?>', deleteWhereData, function(response){
                deleteResult = JSON.parse(response);
                notify(deleteResult);
            });
        }
       
        if ((!hasRecord) || deleteResult == null || deleteResult.class == 'success') {
            thatRow.remove();
            if($('#ppcw-boilers tbody tr').length < 1){
                appendNewRow();
            }
        }
    }

    (function() {
        function scrollHorizontally(e) {
            e = window.event || e;
            var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
            document.getElementById('table-container').scrollLeft -= (delta*40); // Multiplied by 40
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

    (function($) {
      $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
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

    function initialiseInputsAndRules(rowno){
        $('#ppcw-boilers tbody tr:nth-child('+rowno+') .append-new-row').click(function(){
            appendNewRow();
        });

        $('#ppcw-boilers tbody tr:nth-child('+rowno+') .digit').inputFilter(function(value){return /^-?\d*[.,]?\d*$/.test(value);});

        $('#ppcw-boilers tbody tr:nth-child('+rowno+') .datepicker').datepicker({
            dateFormat: 'd M yy',
            //beforeShowDay: enableAllTheseDays
        });
        
        $('#ppcw-boilers tbody tr:nth-child('+rowno+') .datepicker').keydown(function(e){
           e.preventDefault();
        });
        
        $('#ppcw-boilers tbody tr:nth-child('+rowno+') input[name="ph[]"]').blur(function(){
            if ($(this).val() != "") {
                var phVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(phVal);
            }
        });

        $('#ppcw-boilers tbody tr:nth-child('+rowno+') .timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 1,
            dynamic: true,
            dropdown: false,
            scrollbar: false
        });

        $('#ppcw-boilers tbody tr:nth-child('+rowno+') .timepicker').on('keypress', function (event) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
               event.preventDefault();
               return false;
            }
        });

        $("#ppcw-boilers tbody tr:nth-child("+rowno+") input, #ppcw-boilers tbody tr:nth-child("+rowno+") select").change(function(){
            saveChange(this, rowno);
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

    function notify(response){
        if (response.class == 'success') {
            var timeout = 500;
        } else if(response.class == 'warning') {
            var timeout = 750;
        } else if(response.class == 'danger'){
            var timeout = 0;
        }

        $.notify({
            message: response.msg,
        },{
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