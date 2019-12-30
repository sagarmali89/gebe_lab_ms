<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />

<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/fixedcolumns/3.3.0/css/fixedColumns.dataTables.min.css' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

<style type="text/css">
    div[data-notify="container"] {
        max-width: 200px !important;
        padding: 5px !important;
    }

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

    #analysis-records tr:first-child th{
        background-color: rgba(0,0,0,0.25);
        font-size: 100%;
        padding: 5px;
    }
    #analysis-records tr th{
        background-color: rgba(0,0,0,0.05);
        padding: 2.5px;
    }

/*    #analysis-records td, #analysis-records th{
        text-align: center;
        border: 1px solid rgba(255,255,255,1);
    }
*/
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

/*    #analysis-records tr td:nth-child(1) input, #analysis-records tr td:nth-child(2) input{
        width: 105px;
    }
*/
    #analysis-records tr td:nth-child(1) input:disabled{
        background-color: #FFF; 
    }

    #analysis-records tr td input.invalid{
        border: 1px solid rgba(255,0,0,0.5);
        color: red;
    }


/*    #analysis-records{
      table-layout: fixed; 
      width: auto;
      *margin-left: -100px;
    }
    
    #analysis-records td:first-child, #analysis-records th:first-child {
      position:absolute;
      *position: relative; 
      left:0; 
      width:110px;
    }
    .outer {
        position:relative
    }
    .inner {
      overflow-x:scroll;
      overflow-y:visible;
      width:auto; 
      margin-left:100px;
      min-height: 200px;
    }
*/
    .ui-timepicker-standard a {
        padding: 0px !important;
        margin: 0px !important;
        font-size: 80%;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> GEBE LABORATORY REPORT <br/>
        <small>CHEMSTRY AND MICROBIOLOGY ANALYSIS CONSUMER LOCATIONS</small>
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
                        <div class="form-group col-md-3">
                            <label for="consumer" class="control-label">Consumer</label>
                            <select class="form-control generate-table-element" id="consumer">
                                <option value="0" selected disabled>Select Consumer</option>
                                <?php foreach ($conRecords as $consumer): ?>
                                    <option value="<?php echo $consumer->con_id ?>"><?php echo $consumer->con_first_name ?> <?php echo $consumer->con_last_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_from" class="control-label">Date From</label>
                            <input type="text" value='' class="form-control generate-table-element datepicker" id="date_from" />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_to" class="control-label">Date To</label>
                            <input type="text" value='' class="form-control generate-table-element datepicker" id="date_to" />
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
                    <div class="box-body outer">
                        <div id="alert-container">
                            <div class="alert alert-info">Please Select <strong>Consumer</strong> And <strong>From-To Dates</strong> For Manage Analysis Records</div>
                        </div>
                        <div id="table-container" class="inner">
                            <form autocomplete="off">
                            <table id="analysis-records" class="table table-responsive nowrap display dataTable cell-border" width="100%">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Time</th>
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
                                        <th><span style="min-width: 50px; display: block;">&nbsp;</span></th>
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
                                        <th>&nbsp;</th>
                                        <th>HR</th>
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
    </section>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="<?php echo base_url('assets/plugins/tablenavigator-master/src/jquery.tablenavigator.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-notify-master/bootstrap-notify.min.js') ?>"></script>
<script type="text/javascript">

    $(document).ready(function() {

        $('#analysis-records').DataTable({
            "searching": false,
            "bFilter" : false,
            "ordering": false,
            "lengthChange": false,
            "paging": false,
            "bInfo" : false,
            scrollY:        "190px",
            scrollX:        true,
            scrollCollapse: true,
            fixedColumns:   {
                leftColumns: 1,
                rightColumns: 0
            },
            "columnDefs": [
                { "width": "200px", "targets": [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20] }
            ]
        });

        $(".datepicker").keydown(function(e){
           e.preventDefault();
        });

        $(".datepicker").datepicker({
            dateFormat: 'd M yy'
        });


        $(".generate-table-element").change(function(){
            if(($('#consumer').val() != "" && $('#consumer').val() != null && $('#consumer').val() != 0) && $('#date_from').val() != "" && $('#date_to').val() != "") {
                var dateFrom = new Date($('#date_from').val()); 
                var dateTo = new Date($('#date_to').val()); 
                var Difference_In_Time = dateTo.getTime() - dateFrom.getTime(); 
                var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

                if (Difference_In_Days < 0) {
                    $(this).val("");
                    $('#analysis-records').DataTable().clear().draw();
                    $("#alert-container").html('<div class="alert alert-danger"><strong>Date To</strong> should be grater than <strong>Date From</strong></div>');
                    $("#alert-container").show();
                } 
                // else if (Difference_In_Days > 9) {
                //     $(this).val("");
                //     $('#analysis-records').DataTable().clear().draw();
                //     $("#alert-container").html('<div class="alert alert-danger">you can only manage 10 days record at once</strong></div>');
                //     $("#alert-container").show();
                // } 
                else {
                    var postData = {
                        consumer : $('#consumer').val(),
                        date_from : $('#date_from').val(),
                        date_to : $('#date_to').val() 
                    }

                    $.post('<?php echo base_url('analysis/getAnalysisRecords') ?>', postData, function(response){

                        response = JSON.parse(response);

                        var oldAnaRecords = [];


                        if (response.length > 0) {
                            for (var i = 0; i < response.length; i++) {
                                oldAnaRecords[response[i]['ana_date']] = response[i];
                            }
                        }

                        $('#analysis-records').DataTable().clear().draw();

                        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
                       
                        for (var i = 0; i <= Difference_In_Days; i++) {
                            var newTime = new Date((new Date(dateFrom)).valueOf() + 1000*3600*24*i);
                            var formattedDate = newTime.getDate()+" "+monthNames[newTime.getMonth()]+" "+newTime.getFullYear();

                            if (oldAnaRecords[formattedDate] !== undefined) {
                                record = oldAnaRecords[formattedDate];
                                for (var k in record){
                                    if (record.hasOwnProperty(k)) {
                                        if(record[k] == null){
                                            record[k] = "";
                                        } 
                                    }
                                }

                                statusHTML = '<select name="status[]"><option value="" disabled></option>';
                                if (record.ana_status != "Closed" && record.ana_status != "No Water" && record.ana_status != "Rain") {
                                    statusHTML += '<option value="" selected></option>';
                                } else {
                                    statusHTML += '<option value=""></option>';
                                }

                                if (record.ana_status == "Closed") {
                                    statusHTML += '<option value="Closed" selected>Closed</option>';
                                } else {
                                    statusHTML += '<option value="Closed">Closed</option>';
                                }
                                if (record.ana_status == "No Water") {
                                    statusHTML += '<option value="No Water" selected>No Water</option>';
                                } else {
                                    statusHTML += '<option value="No Water">No Water</option>';
                                }
                                if (record.ana_status == "Rain") {
                                    statusHTML += '<option value="Rain" selected>Rain</option>';
                                } else {
                                    statusHTML += '<option value="Rain">Rain</option>';
                                }
                                statusHTML += '</select>';


                                $('#analysis-records').DataTable().row.add([
                                    '<input style="width:70px; border: none; background-color:rgba(0,0,0,0) !important; " type="text" name="date[]" value="'+formattedDate+'" disabled/>',
                                    statusHTML,
                                    '<input class="timepicker" type="text" name="time[]" value="'+record.ana_time+'"/>',
                                    '<input class="digit" type="text" name="temp[]" value="'+record.ana_temp+'"/>',
                                    '<input class="digit" type="text" name="ph[]" value="'+record.ana_ph+'"/>',
                                    '<input class="digit" type="text" name="cond[]" value="'+record.ana_cond+'"/>',
                                    '<input class="digit" type="text" name="tds[]" value="'+record.ana_tds+'" readonly/>',
                                    '<input class="digit" type="text" name="chload[]" value="'+record.ana_chload+'"/>',
                                    '<input class="digit" type="text" name="talk[]" value="'+record.ana_talk+'"/>',
                                    '<input class="digit" type="text" name="cahard[]" value="'+record.ana_cahard+'"/>',
                                    '<input class="digit" type="text" name="iron[]" value="'+record.ana_iron+'"/>',
                                    '<input class="digit" type="text" name="silica[]" value="'+record.ana_silica+'"/>',
                                    '<input class="digit" type="text" name="alum[]" value="'+record.ana_alum+'"/>',
                                    '<input class="digit" type="text" name="turb[]" value="'+record.ana_turb+'"/>',
                                    '<input class="digit" type="text" name="chlone[]" value="'+record.ana_chlone+'"/>',
                                    '<input class="digit" type="text" name="lsi[]" value="'+record.ana_lsi+'"/>',
                                    '<input class="digit" type="text" name="color[]" value="'+record.ana_color+'"/>',
                                    '<input class="digit" type="text" name="lead[]" value="'+record.ana_lead+'"/>',
                                    '<input class="digit" type="text" name="tc[]" value="'+record.ana_tc+'"/>',
                                    '<input class="digit" type="text" name="ec[]" value="'+record.ana_ec+'"/>',
                                    '<input class="digit" type="text" name="ent[]" value="'+record.ana_ent+'"/>',
                                    '<input class="digit" type="text" name="hpc[]" value="'+record.ana_hpc+'"/>',
                                    '<input class="digit" type="text" name="clost[]" value="'+record.ana_clost+'"/>',
                                    '<input class="digit" type="text" name="leg[]" value="'+record.ana_leg+'"/>'
                                ]).draw();
                            } else {
                                $('#analysis-records').DataTable().row.add([
                                    '<input style="width:70px; border: none; background-color:rgba(0,0,0,0) !important; " type="text" name="date[]" value="'+formattedDate+'" disabled/>',
                                    '<select name="status[]"><option value="" selected disabled></option><option value="Closed">Closed</option><option value="No Water">No Water</option><option value="Rain">Rain</option></select>',
                                    '<input type="text" name="time[]" class="timepicker"/>',
                                    '<input class="digit" type="text" name="temp[]"/>',
                                    '<input class="digit" type="text" name="ph[]"/>',
                                    '<input class="digit" type="text" name="cond[]"/>',
                                    '<input class="digit" type="text" name="tds[]" readonly/>',
                                    '<input class="digit" type="text" name="chload[]"/>',
                                    '<input class="digit" type="text" name="talk[]"/>',
                                    '<input class="digit" type="text" name="cahard[]"/>',
                                    '<input class="digit" type="text" name="iron[]"/>',
                                    '<input class="digit" type="text" name="silica[]"/>',
                                    '<input class="digit" type="text" name="alum[]"/>',
                                    '<input class="digit" type="text" name="turb[]"/>',
                                    '<input class="digit" type="text" name="chlone[]"/>',
                                    '<input class="digit" type="text" name="lsi[]"/>',
                                    '<input class="digit" type="text" name="color[]"/>',
                                    '<input class="digit" type="text" name="lead[]"/>',
                                    '<input class="digit" type="text" name="tc[]"/>',
                                    '<input class="digit" type="text" name="ec[]"/>',
                                    '<input class="digit" type="text" name="ent[]"/>',
                                    '<input class="digit" type="text" name="hpc[]"/>',
                                    '<input class="digit" type="text" name="clost[]"/>',
                                    '<input class="digit" type="text" name="leg[]"/>'
                                ]).draw();
                            }
                        }

                        $("#alert-container").hide();

                        setValidationRulesAndPlugins();

                        if (response.length > 0) {
                            $('#analysis-records input').trigger('blur');
                        }

                        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
                    });
                }
            }
        });
    });


    function saveChange(thatEle){
        var element = $(thatEle);
        var eleType = element[0].nodeName.toLowerCase();
        var eleNameAsArray = element.attr('name');

        var eleIdx = $(''+eleType+'[name="'+eleNameAsArray+'"]').index(element);

        var date = "";
        $('#analysis-records input[name="date[]"]').each(function(){
            if ($('#analysis-records input[name="date[]"]').index(this) == eleIdx) {
                date = $(this).val();
            }
        });

        var consumer = $('#consumer').val();

        var eleNameAsDB = eleNameAsArray.substring(0, eleNameAsArray.length-2);
        var eleValue = element.val();

        if (date != "" && consumer != "") {
            var postData = {
                date : date,
                consumer : consumer,
                column : eleNameAsDB,
                value : eleValue 
            }

            $.post('<?php echo base_url('analysis/saveChanges') ?>', postData, function(response){
                response = JSON.parse(response);
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
                    delay: 500,
                    timer: 500,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                });
            });
        }
    }   


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

    function setValidationRulesAndPlugins(){

        $(".digit").inputFilter(function(value){return /^-?\d*[.,]?\d*$/.test(value);});
        
        $('input[name="temp[]"]').blur(function(){
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

        $('input[name="ph[]"]').blur(function(){
            if ($(this).val() != "") {
                var phVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(phVal);
            }
        });

        $('input[name="cond[]"]').blur(function(){
            var condIdx = $('input[name="cond[]"]').index(this);
            if ($(this).val() != "") {
                var conVal = Math.round($(this).val());
                $(this).val(conVal);
                $('input[name="tds[]"]').each(function(){
                    var tdsVal = conVal * 0.51;
                    if ($('input[name="tds[]"]').index(this) == condIdx) {
                        $(this).val(tdsVal);
                    }
                });
                if (conVal > 1000) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $('input[name="tds[]"]').each(function(){
                    if ($('input[name="tds[]"]').index(this) == condIdx) {
                        $(this).val("");
                    }
                });
                $(this).removeClass('invalid');
            }
        });

        $('input[name="chload[]"]').blur(function(){
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

        $('input[name="talk[]"], input[name="cahard[]"]').blur(function(){
            if ($(this).val() != "") {
                var thisVal = Math.round($(this).val());
                $(this).val(thisVal);
            }
        });

        $('input[name="iron[]"]').blur(function(){
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

        $('input[name="silica[]"]').blur(function(){
            if ($(this).val() != "") {
                var silVal = parseFloat($(this).val()).toFixed(2);
                $(this).val(silVal);
            }
        });

        $('input[name="alum[]"]').blur(function(){
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

        $('input[name="turb[]"]').blur(function(){
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

        $('input[name="chlone[]"]').blur(function(){
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

        $('input[name="lsi[]"]').blur(function(){
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

        $('input[name="color[]"]').blur(function(){
            if ($(this).val() != "") {
                var colorVal = Math.round($(this).val());
                $(this).val(colorVal);
                if (colorVal > 15) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            } else {
                $(this).removeClass('invalid');
            }
        });

        $('input[name="lead[]"]').blur(function(){
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

        $('input[name="tc[]"], input[name="ec[]"], input[name="ent[]"], input[name="clost[]"]').blur(function(){
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

        $('input[name="hpc[]"]').blur(function(){
            if ($(this).val() != "") {
                var hpcVal = Math.round($(this).val());
                $(this).val(hpcVal);
            }
        });

        $('input[name="leg[]"]').blur(function(){
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

        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 1,
            dynamic: true,
            dropdown: false,
            scrollbar: false
        });

        $('#analysis-records tbody .datepicker').each(function(){
            $(this).datepicker("refresh");
        });

        $("#analysis-records").tableNavigator({
            input:true,
            background:'#cb4b16'
        });

        $("#analysis-records input, #analysis-records select").change(function(){
            saveChange(this);
        });
    }
</script>