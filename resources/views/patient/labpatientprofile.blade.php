@extends('layouts.app')
@section('content')
<!-- <div class="container"> -->
<!-- MAIN CONTENT -->

<style>
    div.anonymous, div.end_user, div.agent, div.manager {
display: none;
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>

<script>
    function addPrescription(){
        var newTr = '<tr>'+
                        '<td>'+
                            '<input type="text" id="drugs[]" name="drugs[]" class="form-control drugsprescription" name="dose0">'+
                        '</td>'+
                        '<td>'+
                            '<select type="text" id="qty[]" name="qty[]" class="form-control qtyprescription" name="quantity0">'+
                                '<?php for($k = 1; $k <= 10; $k++){ ?>'+
                                '<option value="<?php echo $k; ?>"><?php echo $k; ?></option>'+
                                '<?php } ?>'+
                            '</select>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="dossage[]" name="dossage[]" class="form-control dossageprescription" name="dose0">'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="desc[]" name="desc[]" class="form-control descprescription" name="description0">'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="note[]" name="note[]" class="form-control noteprescription" name="note0">'+
                        '</td>'+
                        '<td>'+
                            '<input type="button" id="" name="" class="ibtnDel btn btn-md btn-danger " value="Delete">'+
                        '</td>'+
                    '</tr>';

        $('.newEmpDt').append(newTr);
    }
   
    function submitPrescriptionForm(){
        
        
        var consSubmit = $("#consSubmit").val();
        var pqid = '{{ $patientData['queueId'] }}';  
        
        var symptomp = $("textarea#symptompdt").val();
        var qno = $("#qno").val();
        var temperature = $("#temperature").val();
        var temperature = $("#temperature").val();
        var temperature = $("#temperature").val();
        var blood_presure = $("#blood_presure").val();
        var blood_sugar = $("#blood_sugar").val();
        var result = $("#result").val();
        
        if($("#is_medical_certificate").prop('checked') == true){
            var is_medical_certificate = 'yes';
            var medical_certificate = $("#medical_certificate").val();
        } else {
            var is_medical_certificate = '';
            var medical_certificate = $("#medical_certificate").val();
        }
        
        if($("#is_time_slip").prop('checked') == true){
            var is_time_slip = 'yes';
            var time_slip = $("#time_slip").val();
        } else {
            var is_time_slip = '';
            var time_slip = $("#time_slip").val();
        }
        
        var drugs = [];
        $('.drugsprescription').each(function(){
            drugs.push({ value: this.value }); 
        });
        
        var qty = [];
        $('.qtyprescription').each(function(){
            qty.push({ value: this.value }); 
        });
        
        var dossage = [];
        $('.dossageprescription').each(function(){
            dossage.push({ value: this.value }); 
        });
        
        var desc = [];
        $('.descprescription').each(function(){
            desc.push({ value: this.value }); 
        });
        
        var note = [];
        $('.noteprescription').each(function(){
            note.push({ value: this.value }); 
        });
        
        url = "{!! URL::to('savePrescription') !!}";
        $.ajax({
            url: url,
            async: false,
            type: 'POST',
            data: {_token: "{{ csrf_token() }}", consSubmit: consSubmit, pqid: pqid, symptomp: symptomp, qno: qno, temperature: temperature, blood_presure: blood_presure, blood_sugar: blood_sugar, result: result, is_medical_certificate: is_medical_certificate, medical_certificate: medical_certificate, is_time_slip: is_time_slip, time_slip: time_slip, drugs: drugs, qty: qty, dossage: dossage, desc: desc, note: note},
        }).done(function (response) {
            $('#consSubmit').val(response);
        });

        //$('#prescriptionForm').submit();
    }
    
    function addBloodtest(){
        // '<td><span id="incre"></span></td>'+
        var newTr = '<tr>'+
                        '<td><input type="date" name="btdate[]" id="btdate[]" class="btdate" ></td>'+
                        '<td><input type="text" name="btglucose[]" id="btglucose[]" class="form-control btglucose" ></td>'+
                        '<td><input type="text" name="bthb[]" id="bthb[]" class="form-control bthb" ></td>'+
                        '<td><input type="text" name="btrefno[]" id="btrefno[]" class="form-control btrefno" ></td>'+
                        '<td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete"></td>'+
                    '</tr>';

        $('.newEmpBT').append(newTr);
    }
    
    function submitBloodtest(){
        

        var pqid = '{{ $patientData['queueId'] }}';  
        var symptomp = $("#btsypt").val();
                
        var btdate = [];
        $('.btdate').each(function(){
            btdate.push({ value: this.value }); 
        });
        
        var btglucose = [];
        $('.btglucose').each(function(){
            btglucose.push({ value: this.value }); 
        });
        
        var bthb = [];
        $('.bthb').each(function(){
            bthb.push({ value: this.value }); 
        });
        
        var btrefno = [];
        $('.btrefno').each(function(){
            btrefno.push({ value: this.value }); 
        });
                
        url = "{!! URL::to('saveBloodtest') !!}";
        $.ajax({
            url: url,
            async: false,
            type: 'POST',
            data: {_token: "{{ csrf_token() }}", pqid: pqid, symptomp: symptomp, btdate: btdate, btglucose: btglucose, bthb: bthb, btrefno: btrefno},
        }).done(function (response) {
            //$('#consSubmit').val(response);
        });
        //$('#BloodtestForm').submit();
    }
    
    function deleteCurTr(dt){
        $(dt).parent('tr').remove();
    }
    
    function openlabForm(){
        $('#labForm').modal('show');
    }
    
    function submitLaboratoryRequestForm(){
        $('#laboratoryrequestForm').submit(); 
    }
    
    
    
</script>    

<input type="hidden" name="consSubmit" id="consSubmit" value="0">
<input type="hidden" name="bloodTestSubmit" id="bloodTestSubmit" value="0">
<input type="hidden" name="electroTestSubmit" id="electroTestSubmit" value="0">
<input type="hidden" name="fbsSubmit" id="fbsSubmit" value="0">
<input type="hidden" name="lipidSubmit" id="lipidSubmit" value="0">
<input type="hidden" name="renalSubmit" id="renalSubmit" value="0">
<input type="hidden" name="ultrasoundSubmit" id="ultrasoundSubmit" value="0">

<input type="hidden" name="patQids" id="patQids" value="{{ $patientData['queueId'] }}">
<input type="hidden" name="patSymptopms" id="patSymptopms" value="{{ $patientData['pqueue']->symptopms }}">
<div class="emp-profile">
    <div method="post">
        <div class="row">
            <div class="col-md-2">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="">
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file">
                    </div>
                </div>
                <div class="tree">
                    <ul role="tree">
                        <li class="parent_li" role="treeitem">
                            <span title="Collapse this branch"><i class="fa fa-lg fa-history"></i> History</span>
                            <ul role="group">
                                <li class="parent_li" role="treeitem">
                                    <span class="label label-success" title="Collapse this branch"><i class="fa fa-lg fa-plus-circle"></i> Mon, Jan 7: 8.00 hours</span>
                                    <ul role="group">
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 8.00</span> – <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent_li" role="treeitem">
                                    <span class="label label-success" title="Collapse this branch"><i class="fa fa-lg fa-minus-circle"></i> Tue, Jan 8: 8.00 hours</span>
                                    <ul role="group">
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 6.00</span> – <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 2.00</span> – <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent_li" role="treeitem">
                                    <span class="label label-warning" title="Collapse this branch"><i class="fa fa-lg fa-minus-circle"></i> Wed, Jan 9: 6.00 hours</span>
                                    <ul role="group">
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 3.00</span> – <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li><li>
                                    <span><i class="fa fa-clock-o"></i> 3.00</span> – <a href="javascript:void(0);">Appointment</a>
                                </li>
                            </ul>
                        </li>
                        <li class="parent_li" role="treeitem">
                            <span class="label label-danger" title="Collapse this branch"><i class="fa fa-lg fa-minus-circle"></i> Wed, Jan 9: 4.00 hours</span>
                            <ul role="group">
                                <li>
                                    <span><i class="fa fa-clock-o"></i> 2.00</span> – <a href="javascript:void(0);">Appointment</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <header>
                    <span class="widget-icon"> <i class="fa fa-sitemap"></i> </span>
                    <h2>Family </h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->
                    <!-- widget content -->
                    <div class="widget-body">
                        <div class="tree smart-form">
                            <ul role="tree">
                                <li>
                                    <span><i class="fa fa-lg fa-folder-close"></i> Spouse</span>

                                </li>
                                <li class="parent_li" role="treeitem">
                                    <span title="Collapse this branch"><i class="fa fa-lg fa-folder-open"></i> Children</span>
                                    <ul role="group">		
                                        <li>
                                            <span> Arif Haikal</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end widget content -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-head">
                    
                    <div class="col-md-3">  
                        <h5 style="font-size: 13px !important ;"> Name </h5>
                        <h6 style="font-size: 12px !important ;"> {{ $patientData['patientdet']->name }} </h6>
                        
                        <p>Patient Status</p>
                        <a href="">{{ ucfirst($patientData['patientdet']->utype) }}</a><br>

                        <p>Department</p>
                        <a href="">{{ $patientData['patientdet']->dept_name }}</a><br> 
                    </div>
                    
                    <div class="col-md-3">
                        <p>Queue Number</p>
                        <a href="">{{ $patientData['pqueue']->token_no }}</a><br>

                        <p>Email</p>
                        <a href=""> {{ $patientData['email'] }} </a><br>
                        
                        <p>Phone</p>
                        <a href=""> {{ $patientData['phone'] }} </a><br>
                    </div>
                    
                    <div class="col-md-3">
                        <p>IC Num</p>
                        <a href="">{{ $patientData['pqueue']->ic_number }}</a><br>
                        
                        <p>Date of birth</p>
                        <a href="">{{ $patientData['dob'] }}</a><br>

                        <p>Age</p>
                        <a href="">{{ $patientData['age'] }}</a><br>
                    </div> 
                    
                    <div class="col-md-3">
                        <!--<input type="button" onclick="openlabForm();" class="btn btn-success" name="btnAddMore" value="Go to Laboratory"><br><br>-->
                        <!-- <input type="submit" class=" btn btn-warning" name="btnAddMore" value="Go to Dispensary"> -->
                    </div>
                    <div class="col-md-12">
                        <div class="jarviswidget" id="135d560a5563120bd63103310c8a48ba" data-widget-editbutton="false">
                            <header>
                                <h2></h2>
                            </header>
                            <div>
                                <div class="jarviswidget-editbox"></div>
                                <div class="widget-body ">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs  bordered">
                                            <!-- <li class="active"><a href="#tab1" data-toggle="tab" rel="tooltip" data-placement="top" data-original-title="" title="">Consultation</a></li> -->
                                            <li class="active"><a href="#tab2" data-toggle="tab" rel="tooltip" data-placement="top" data-original-title="" title="">Laboratory</a></li>
                                        </ul>
                                        <div class="tab-content padding-10">
                                            <!--
                                            <div class="tab-pane in active" id="tab1">
                                                <form id="prescriptionForm" action="{{ action('PatientController@savePrescription') }}" method="post" >
                                                    <input type="hidden" name="pid" value="{{ $patientData['queueId'] }}" >
                                                    <div class="form-group " align="right">
                                                        <div class="col-md-7 ">
                                                        </div>

                                                        <div class="col-md-4 ">
                                                            <label for="inputName">Queue Number</label>  
                                                            <input type="text" class="form-control" value="{{ $patientData['pqueue']->token_no }}" id="qno" name="qno" placeholder="Patients queue no">
                                                        </div>
                                                        <div class="col-md-1"><button class="btn btn-success"><i class="glyphicon glyphicon-bell"></i></button>					                                            </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="inputName">Symptomps</label>
                                                            <textarea class="form-control" id="symptompdt" name="symptomp" placeholder="Describe symptoms of patient "> {{ $patientData['pqueue']->symptopms }} </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="inputName">Diagnose</label><br>
                                                            <label class="col-md-2" for="inputName">Temperature</label>
                                                            <input class="col-md-2" type="text" id="temperature" name="temperature" placeholder="(C)">
                                                            <label class="col-md-2" for="inputName">Blood Pressure</label>
                                                            <input class="col-md-2" type="text" id="blood_presure" name="blood_presure" placeholder="(mmHg)">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <br>
                                                            <label class="col-md-2" for="inputName">Blood Sugar Level</label>
                                                            <input class="col-md-2" type="text" id="blood_sugar" name="blood_sugar" placeholder="(mmol/L)">
                                                            <div class="col-md-1">
                                                                <a href="#" data-toggle="modal" data-target="#modChart" data-source="70,53,20,90,44,62,30,30,30,50,55,0" data-target-source="34">
                                                                    <span class="fa fa-history"></span> History
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="inputName">Result</label>
                                                            <input class="form-control" id="result" name="result" placeholder="Diagnose result ">  </div>
                                                    </div>
                                                    <div class="form-group">   
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="inputName">Prescription</label>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table id="myTable" class=" table order-list">
                                                                        <thead>
                                                                            <tr>
                                                                                <td>Drugs</td>
                                                                                <td>Quantity</td>
                                                                                <td>Dossage</td>
                                                                                <td>Description</td>
                                                                                <td>Note</td>
                                                                                <td>Action</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="newEmpDt" >
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr> </tr>
                                                                            <tr> </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                    <div class="col-md-1 pull-right" style="text-align: left;">
                                                                        <span class="col-md-1 pull-right" style="text-align: left;">
                                                                            <input type="button" class="btn btn-default" onclick="addPrescription();" id="addrows" value="Add Row">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div class="clearfix"></div>
                                                        </div> 
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-16">
                                                            <label for="inputName">Medical Certificate</label>
                                                            <input type="checkbox" id="is_medical_certificate" name="is_medical_certificate" value="yes">
                                                            <input type="text" class="form-control" id="medical_certificate" name="medical_certificate" placeholder="How many days">
                                                        </div>
                                                        <div class="col-md-16">
                                                            <label for="inputName">Time Slip</label>
                                                            <input type="checkbox" id="is_time_slip" name="is_time_slip" value="yes">
                                                            <input type="text" class="form-control" id="time_slip" name="time_slip" placeholder="How many hours">
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-primary submitBtn" onclick="submitPrescriptionForm()">SUBMIT</button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </form>
                                            </div>
                                            -->
                                            <div class="active" class="tab-pane" id="tab2">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-7 ">
                                                        </div>

                                                        <div class="col-md-4 ">
                                                            <label for="inputName">Queue Number</label>  
                                                            <input type="text" readonly="" class="form-control" value="{{ $patientData['pqueue']->token_no }}" id="qno" name="qno" placeholder="Patients queue no">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button onclick="passLabFtoCons('{{ $patientData['queueId'] }}')" class="btn btn-success"><i class="glyphicon glyphicon-bell"></i></button>
                                                        </div>
                                                        <div id="passToCons" class="col-md-12" style="display: none; color: red; text-align: right">Please Fill Laboratory Report To Complete.</div>
                                                    </div>
                                                </div>    
                                                <div class="form-group">
                                                    @if ($labreqCount == 1)
                                                    <label for="inputName">Remarks </label>
                                                    <input class="form-control" readonly="" placeholder="" value="{{ $labreq->remarks }}" >
                                                    @endif
                                                </div>
                                                <div class="active" id="tabs" class="ui-tabs ui-corner-all ui-widget ui-widget-content">
                                                    @if ($labreqCount == 0)
                                                    <ul role="tablist" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">
                                                        <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="tabs-a" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true">
                                                            <a href="#tabs-a" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">Blood Test</a>
                                                        </li>
                                                        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-b" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
                                                            <a href="#tabs-b" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Electrolytes Test</a>
                                                        </li>
                                                        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-c" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
                                                            <a href="#tabs-c" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">FBS</a>
                                                        </li>
                                                        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-d" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
                                                            <a href="#tabs-d" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Lipids</a>
                                                        </li>
                                                        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-e" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false">
                                                            <a href="#tabs-e" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Renal Function</a>
                                                        </li>
                                                        <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-f" aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false">
                                                            <a href="#tabs-f" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-6">Ultrasound</a>
                                                        </li>
                                                    </ul>
                                                    @elseif ($labreqCount == 1)
                                                        <ul role="tablist" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">
                                                            @if ($labreq->bloodtest == 1)
                                                            <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="tabs-a" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true">
                                                                <a href="#tabs-a" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">Blood Test</a>
                                                            </li>
                                                            @endif

                                                            @if ($labreq->electrolytestest == 1)
                                                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-b" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
                                                                <a href="#tabs-b" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Electrolytes Test</a>
                                                            </li>
                                                            @endif

                                                            @if ($labreq->fbs == 1)
                                                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-c" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
                                                                <a href="#tabs-c" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">FBS</a>
                                                            </li>
                                                            @endif

                                                            @if ($labreq->lipids == 1)
                                                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-d" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
                                                                <a href="#tabs-d" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Lipids</a>
                                                            </li>
                                                            @endif

                                                            @if ($labreq->renalfunction == 1)
                                                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-e" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false">
                                                                <a href="#tabs-e" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Renal Function</a>
                                                            </li>
                                                            @endif

                                                            @if ($labreq->ultrasound == 1)
                                                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-f" aria-labelledby="ui-id-6" aria-selected="false" aria-expanded="false">
                                                                <a href="#tabs-f" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-6">Ultrasound</a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    @endif
                                                    
                                                    
                                                    @if ($labreqCount == 0)
                                                    <?php /*
                                                    <div id="tabs-a" aria-labelledby="ui-id-1" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="false">
                                                        <form id="BloodtestForm" action="{{ action('PatientController@saveBloodtest') }}" method="post" >
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                                            <input type="hidden" name="btpid" id="btpid" value="{{ $patientData['queueId'] }}" >
                                                            <input type="hidden" name="btsypt" id="btsypt" value="{{ $patientData['pqueue']->symptopms }}">
                                                            <div class="form-group">
                                                                <div class="col-md-12"> 
                                                                    <label for="inputName">Inquery</label>
                                                                    <div role="form">
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <table id="myTable" class=" table blood-list">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <!--<td>No</td>-->
                                                                                            <td>Date</td>
                                                                                            <td>Glucose</td>
                                                                                            <td>HB</td>
                                                                                            <td>Ref.No</td>
                                                                                            <td>Action</td>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody class="newEmpBT">
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                        </tr>
                                                                                        <tr>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                                <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                    <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                        <input type="button" class="btn btn-default" onclick="addBloodtest();" value="Add Row">
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div> 
                                                            </div>			
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-primary submitBtn" onclick="submitBloodtest()">SUBMIT</button>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </form>    
                                                    </div>

                                                    <div id="tabs-b" aria-labelledby="ui-id-2" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="inputName">Inquery</label>
                                                                <div role="form">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <table id="myTable" class=" table electro-list">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>No</td>
                                                                                        <td>Date</td>
                                                                                        <td>Bicarbonate</td>
                                                                                        <td>Chloride</td>
                                                                                        <td>Ref.No</td>
                                                                                        <td>Action</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                    </tr>
                                                                                    <tr>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                            <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                    <input type="button" class="btn btn-default" id="addElectroTest" value="Add Row">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>

                                                    <div id="tabs-c" aria-labelledby="ui-id-3" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="inputName">Inquery</label>
                                                                <div role="form">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <table id="myTable" class=" table FBS-list">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>No</td>
                                                                                        <td>Date</td>
                                                                                        <td>FBS</td>
                                                                                        <td>Ref.No</td>
                                                                                        <td>Action</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody> </tbody>
                                                                                <tfoot>
                                                                                    <tr></tr>
                                                                                    <tr></tr>
                                                                                </tfoot>
                                                                            </table>
                                                                            <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                    <input type="button" class="btn btn-default" id="addFBSTest" value="Add Row">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div> 
                                                        </div>			
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>

                                                    <div id="tabs-d" aria-labelledby="ui-id-4" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="inputName">Inquery</label>
                                                                <form role="form">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <table id="myTable" class=" table lipids-list">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>No</td>
                                                                                        <td>Date</td>
                                                                                        <td>HDL Cholesterol</td>
                                                                                        <td>LDL Cholesterol</td>
                                                                                        <td>Total Cholesterol</td>
                                                                                        <td>Total Cholesterol/HDL ratio</td>
                                                                                        <td>Triglyceride</td>
                                                                                        <td>GGGG</td>
                                                                                        <td>Ref.No</td>
                                                                                        <td>Action</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody> </tbody>
                                                                                <tfoot>
                                                                                    <tr> </tr>
                                                                                    <tr> </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                            <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                    <input type="button" class="btn btn-default" id="addLipidsTest" value="Add Row">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <div class="clearfix"></div>
                                                                </form>
                                                            </div> 
                                                        </div>			
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>

                                                    <div id="tabs-e" aria-labelledby="ui-id-5" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="inputName">Inquery</label>
                                                                <div role="form">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <table id="myTable" class=" table renal-list">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>No</td>
                                                                                        <td>Date</td>
                                                                                        <td>Urea</td>
                                                                                        <td>Creatinine</td>
                                                                                        <td>Uric Acid</td>
                                                                                        <td>Calcium</td>
                                                                                        <td>Corrected Calcium</td>
                                                                                        <td>Phospate</td>
                                                                                        <td>Ref.No</td>
                                                                                        <td>Action</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody> </tbody>
                                                                                <tfoot>
                                                                                    <tr> </tr>
                                                                                    <tr> </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                            <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                    <input type="button" class="btn btn-default" id="addRenalTest" value="Add Row">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div> 
                                                        </div>			
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>

                                                    <div id="tabs-f" aria-labelledby="ui-id-6" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label for="inputName">Inquery</label>
                                                                <div role="form">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <table id="myTable" class=" table ultra-list">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>No</td>
                                                                                        <td>Date</td>
                                                                                        <td>Presentation &amp; Lie</td>
                                                                                        <td>Heart Rate</td>
                                                                                        <td>Biparietal Diameter</td>
                                                                                        <td>Femur Length</td>
                                                                                        <td>Estimated Present </td>
                                                                                        <td>Sex</td>
                                                                                        <td>Abnormalities</td>
                                                                                        <td>Ref.No</td>
                                                                                        <td>Action</td>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr> </tr>
                                                                                    <tr> </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                            <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                    <input type="button" class="btn btn-default" id="addUltraTest" value="Add Row">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div> 
                                                        </div>			
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                     */ ?>
                                                    
                                                    @elseif ($labreqCount == 1)
                                                        @if ($labreq->bloodtest == 1)
                                                            <div id="tabs-a" aria-labelledby="ui-id-1" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="false">
                                                                <!--<input type="text" name="_token" value="{{ csrf_token() }}" >-->
                                                                <input type="hidden" name="btpid" id="btpid" value="{{ $patientData['queueId'] }}" >
                                                                <input type="hidden" name="btsypt" id="btsypt" value="{{ $patientData['pqueue']->symptopms }}">
                                                                <div class="form-group">
                                                                    <div class="col-md-12"> 
                                                                        <label for="inputName">Blood Test</label>
                                                                        <div role="form">
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <table id="myTable" class=" table blood-list">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <!--<td>No</td>-->
                                                                                                <td>Date</td>
                                                                                                <td>Glucose</td>
                                                                                                <td>HB</td>
                                                                                                <td>Ref.No</td>
                                                                                                <!-- <td>Action</td> -->
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="newEmpBT">
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <input type="date" name="btdate" id="btdate" name="btdate">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="btglucose" id="btglucose" class="form-control btglucose">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="bthb" id="bthb" class="form-control bthb">
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" name="btrefno" id="btrefno" class="form-control btrefno">
                                                                                                </td>
                                                                                                <!-- <td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete"></td>-->
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr></tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <!--
                                                                                    <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                        <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                            <input type="button" class="btn btn-default" onclick="addBloodtest();" value="Add Row">
                                                                                        </span>
                                                                                    </div>
                                                                                    -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                    </div> 
                                                                </div>			
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-primary submitBtn" onclick="submitLaboratoryTest()">SUBMIT</button>
                                                                </div>
                                                                <div class="clearfix"></div>  
                                                            </div>
                                                        @endif
                                                        
                                                        @if ($labreq->electrolytestest == 1)
                                                            <div id="tabs-b" aria-labelledby="ui-id-2" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label for="inputName">Electrolytes Test</label>
                                                                        <div role="form">
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <table id="myTable" class=" table electro-list">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <!-- <td>No</td> -->
                                                                                                <td>Date</td>
                                                                                                <td>Bicarbonate</td>
                                                                                                <td>Chloride</td>
                                                                                                <td>Ref.No</td>
                                                                                                <!-- <td>Action</td> -->
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>                                                                         
                                                                                            <tr>
                                                                                                <!--<td><span id="incre">1</span></td>-->
                                                                                                <td>
                                                                                                    <input type="date" name="elecdate" id="elecdate" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="bicarbonate" id="bicarbonate" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="chloride" id="chloride" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="elecrefno" id="elecrefno" >
                                                                                                </td>
                                                                                                <!--<td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete"></td>-->
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr>
                                                                                            </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <!--
                                                                                    <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                        <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                            <input type="button" class="btn btn-default" id="addElectroTest" value="Add Row">
                                                                                        </span>
                                                                                    </div>
                                                                                    -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-primary submitBtn" onclick="submitLaboratoryTest()">SUBMIT</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        @endif
                                                        
                                                        @if ($labreq->fbs == 1)
                                                            <div id="tabs-c" aria-labelledby="ui-id-3" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label for="inputName">FBS</label>
                                                                        <div role="form">
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <table id="myTable" class=" table FBS-list">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <!--<td>No</td>-->
                                                                                                <td>Date</td>
                                                                                                <td>FBS</td>
                                                                                                <td>Ref.No</td>
                                                                                                <!--<td>Action</td>-->
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody> 
                                                                                            <tr>
                                                                                                <!--<td><span id="incre">1</span></td>-->
                                                                                                <td>
                                                                                                    <input type="date" id="fbsdate" name="fbsdate" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="fbs" id="fbs" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="fbsrefno" id="fbsrefno" >
                                                                                                </td>
                                                                                                <!--<td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete"></td>-->
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr></tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <!--
                                                                                    <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                        <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                            <input type="button" class="btn btn-default" id="addFBSTest" value="Add Row">
                                                                                        </span>
                                                                                    </div>
                                                                                    -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                    </div> 
                                                                </div>			
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-primary submitBtn" onclick="submitLaboratoryTest()">SUBMIT</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        @endif
                                                        
                                                        @if ($labreq->lipids == 1)
                                                            <div id="tabs-d" aria-labelledby="ui-id-4" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label for="inputName">Lipids</label>
                                                                        <form role="form">
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <table id="myTable" class=" table lipids-list">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <!--<td>No</td>-->
                                                                                                <td>Date</td>
                                                                                                <td>HDL Cholesterol</td>
                                                                                                <td>LDL Cholesterol</td>
                                                                                                <td>Total Cholesterol</td>
                                                                                                <td>Total Cholesterol/HDL ratio</td>
                                                                                                <td>Triglyceride</td>
                                                                                                <td>GGGG</td>
                                                                                                <td>Ref.No</td>
                                                                                                <!--<td>Action</td>-->
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody> 
                                                                                            <tr>
                                                                                                <!--<td><span id="incre">1</span></td>-->
                                                                                                <td>
                                                                                                    <input type="date" id="lipdate" name="lipdate" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" id="hdl_Cholesterol" name="hdl_Cholesterol" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="ldl_Cholesterol" id="ldl_Cholesterol" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="total_Cholesterol" id="total_Cholesterol" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="total_Cholesterol_ratio" id="total_Cholesterol_ratio" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="triglyceride" id="triglyceride" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="gggg" id="gggg" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="liprefno" id="liprefno" >
                                                                                                </td>
                                                                                                <!--<td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete"></td>-->
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr> </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <!--
                                                                                    <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                        <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                            <input type="button" class="btn btn-default" id="addLipidsTest" value="Add Row">
                                                                                        </span>
                                                                                    </div>
                                                                                    -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <div class="clearfix"></div>
                                                                        </form>
                                                                    </div> 
                                                                </div>			
                                                                <div class="col-md-2">
                                                                    <button type="button" class="btn btn-primary submitBtn" onclick="submitLaboratoryTest()">SUBMIT</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        @endif
                                                        
                                                        @if ($labreq->renalfunction == 1)
                                                            <div id="tabs-e" aria-labelledby="ui-id-5" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label for="inputName">Renal Function</label>
                                                                        <div role="form">
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <table id="myTable" class=" table renal-list">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <!--<td>No</td>-->
                                                                                                <td>Date</td>
                                                                                                <td>Urea</td>
                                                                                                <td>Creatinine</td>
                                                                                                <td>Uric Acid</td>
                                                                                                <td>Calcium</td>
                                                                                                <td>Corrected Calcium</td>
                                                                                                <td>Phospate</td>
                                                                                                <td>Ref.No</td>
                                                                                                <!--<td>Action</td>-->
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody> 
                                                                                            <tr>
                                                                                                <!--<td><span id="incre"></span></td>-->
                                                                                                <td>
                                                                                                    <input type="date" id="rfdate" class="rfdate" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="urea" id="urea" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="creatinine" id="creatinine" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="uric_acid" id="uric_acid" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="calcium" id="calcium" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="corrected_calcium" id="corrected_calcium" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="phospate" id="phospate" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="rfrefno" id="rfrefno" >
                                                                                                </td>
                                                                                                <!--<td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete"></td>-->
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr> </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <!--
                                                                                    <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                        <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                            <input type="button" class="btn btn-default" id="addRenalTest" value="Add Row">
                                                                                        </span>
                                                                                    </div>
                                                                                    -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                    </div> 
                                                                </div>			
                                                                <div class="col-md-2">
                                                                    <button type="button" class="btn btn-primary submitBtn" onclick="submitLaboratoryTest()">SUBMIT</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        @endif
                                                        
                                                        @if ($labreq->ultrasound == 1)
                                                            <div id="tabs-f" aria-labelledby="ui-id-6" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label for="inputName">Ultrasound</label>
                                                                        <div role="form">
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <table id="myTable" class=" table ultra-list">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <!--<td>No</td>-->
                                                                                                <td>Date</td>
                                                                                                <td>Presentation &amp; Lie</td>
                                                                                                <td>Heart Rate</td>
                                                                                                <td>Biparietal Diameter</td>
                                                                                                <td>Femur Length</td>
                                                                                                <td>Estimated Present </td>
                                                                                                <td>Sex</td>
                                                                                                <td>Abnormalities</td>
                                                                                                <td>Ref.No</td>
                                                                                                <!--<td>Action</td>-->
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>                                                                             
                                                                                            <tr>
                                                                                                <!--<td><span id="incre"></span></td>-->
                                                                                                <td>
                                                                                                    <input type="date" id="usdate" name="usdate" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="presentation_lie" id="presentation_lie" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="heart_rate" id="heart_rate" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="biparietal_diameter" id="biparietal_diameter" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="femur_length" id="femur_length" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="estimated_present" id="estimated_present" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="sex" id="sex" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="abnormalities" id="abnormalities" >
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input type="text" class="form-control" name="usrefno" id="usrefno" >
                                                                                                </td>
                                                                                                <!--<td><input type="button" class="ibtnDel btn btn-md btn-danger " value="Delete"></td>-->
                                                                                            </tr>
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr> </tr>
                                                                                            <tr> </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                    <!--
                                                                                    <div class="col-md-1 pull-right" style="text-align: left;">
                                                                                        <span class="col-md-1 pull-right" style="text-align: left;">
                                                                                            <input type="button" class="btn btn-default" id="addUltraTest" value="Add Row">
                                                                                        </span>
                                                                                    </div>
                                                                                    -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                    </div> 
                                                                </div>			
                                                                <div class="col-md-2">
                                                                    <button type="button" class="btn btn-primary submitBtn" onclick="submitLaboratoryTest()">SUBMIT</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>    
                                        </div>
                                        <hr class="simple">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="modal fade" id="modalForm" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Consultation Information</h4>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <p class="statusMsg"></p>
                            <div role="form">
                                <div class="form-group " align="right">
                                    <div class="col-md-7 ">
                                    </div>
                                    <div class="col-md-4 ">
                                        <label for="inputName">Queue Number</label>
                                        <input type="text" class="form-control" id="inputName" placeholder="Patient's queue no">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="inputName">Symptomps</label>
                                        <textarea type="text" class="form-control" id="inputName" placeholder="Describe symptoms of patient ">Cirit Birit</textarea></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="inputName">Diagnose</label>
                                        <textarea type="text" class="form-control" id="inputName" placeholder="Your patient was diagnose with..">Pedih Ulu Hati</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="inputName">Alergy</label>
                                        <textarea type="text" class="form-control" id="inputName" placeholder="Your patient was diagnose with..">G6PD</textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="inputName">Drugs</label>
                                        <div id="field_div">

                                            <button class="btn btn-success" onclick="add_field();"><i class="glyphicon glyphicon-plus"></i></button>
                                        </div> </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PAGE FOOTER -->
            <!--Modal -->
            <div class="modal fade" id="genModel1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Generate </h4>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row smart-form">
                                    <table id="myTable" class=" table order-list">
                                        <thead>
                                            <tr>
                                                <td class="col-md-2">Name</td>

                                                <td class="col-md-2">Sex</td>

                                                <td class="col-md-3">IC Number/Passport</td>
                                                <td class="col-md-1">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="col-md-1 pull-right" style="text-align: left;">
                                        <input type="button" class="btn btn-default" id="addrow" value="Add Row">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="labForm" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <!--<h4 class="modal-title" id="myModalLabel">Remarks</h4>-->
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">X</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form id="laboratoryrequestForm" action="{{ action('PatientController@laboratoryrequest') }}" method="post" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                <input type="hidden" name="labreqpid" value="{{ $patientData['queueId'] }}" >
                                <div class="clearfix"></div>
                                <div role="form">
                                    <div class="form-group " align="right">
                                        <div style="text-align: left;" class="col-md-12">Remarks</div>
                                        <div class="col-md-12 ">
                                            <textarea type="text" class="form-control" id="remarks" name="remarks" placeholder="Describe symptoms of patient "></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div role="form">
                                    <div class="form-group " align="right">
                                        <div style="text-align: left;" class="col-md-12">Tests</div>
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <fieldset style="text-align: left;" class="col-sm-6">
                                                    <label>
                                                        <input name="bloodtest" id="bloodtest" type="checkbox" />
                                                        <span>Blood Test</span>
                                                    </label>
                                                </fieldset>
                                                <fieldset style="text-align: left;" class="col-sm-6">
                                                    <label>
                                                        <input name="lipids" id="lipids" type="checkbox" />
                                                        <span>Lipids</span>
                                                    </label>
                                                </fieldset>
                                            </div>

                                            <div class="row">
                                                <fieldset style="text-align: left;" class="col-sm-6">
                                                    <label>
                                                        <input name="electrolytestest" id="electrolytestest" type="checkbox" />
                                                        <span>Electrolytes Test</span>
                                                    </label>
                                                </fieldset>
                                                <fieldset style="text-align: left;" class="col-sm-6">
                                                    <label>
                                                        <input name="renalfunction" id="renalfunction" type="checkbox" />
                                                        <span>Renal Function</span>
                                                    </label>
                                                </fieldset>
                                            </div>

                                            <div class="row">
                                                <fieldset style="text-align: left;" class="col-sm-6">
                                                    <label>
                                                        <input name="fbs" id="fbs" type="checkbox" />
                                                        <span>FBS</span>
                                                    </label>
                                                </fieldset>
                                                <fieldset style="text-align: left;" class="col-sm-6">
                                                    <label>
                                                        <input name="ultrasound" id="ultrasound" type="checkbox" />
                                                        <span>Ultrasound</span>
                                                    </label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary submitBtn" onclick="submitLaboratoryRequestForm()">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->
</div>

<form id="laboratoryPassForm" action="{{ action('PatientController@laboratoryPassForm') }}" method="post" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
    <input type="hidden" name="labreqpid" value="{{ $patientData['queueId'] }}" >
</form>


    <!-- PAGE RELATED PLUGIN(S)--> 
    <script type="text/javascript">
        function passLabFtoCons(id){
            url = "{!! URL::to('laboratoryPassForm') !!}";
            $.ajax({
                url: url,
                async: false,
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", id: id},
            }).done(function (response) {
                if(response == 0){
                    $('#passToCons').css('display','none');
                } else {
                    window.location.href = "{{ URL::to('laboratory/') }}";
                }
            });
            
        }
        
        function submitLaboratoryTest(){

            var pqid = '{{ $patientData["queueId"] }}'; 
            var btsypt = $("#btsypt").val();

            var btdate = $("#btdate").val();
            var btglucose = $("#btglucose").val();
            var bthb = $("#bthb").val();
            var btrefno = $("#btrefno").val();

            var elecdate = $("#elecdate").val();
            var bicarbonate = $("#bicarbonate").val();
            var chloride = $("#chloride").val();
            var elecrefno = $("#elecrefno").val();

            var fbsdate = $("#fbsdate").val();
            var fbs = $("#fbs").val();
            var fbsrefno = $("#fbsrefno").val();

            var lipdate = $("#lipdate").val();
            var hdl_Cholesterol = $("#hdl_Cholesterol").val();
            var ldl_Cholesterol = $("#ldl_Cholesterol").val();
            var total_Cholesterol = $("#total_Cholesterol").val();
            var total_Cholesterol_ratio = $("#total_Cholesterol_ratio").val();
            var triglyceride = $("#triglyceride").val();
            var gggg = $("#gggg").val();
            var liprefno = $("#liprefno").val();

            var rfdate = $("#rfdate").val();
            var urea = $("#urea").val();
            var creatinine = $("#creatinine").val();
            var uric_acid = $("#uric_acid").val();
            var calcium = $("#calcium").val();
            var corrected_calcium = $("#corrected_calcium").val();
            var phospate = $("#phospate").val();
            var rfrefno = $("#rfrefno").val();

            var usdate = $("#usdate").val();
            var presentation_lie = $("#presentation_lie").val();
            var heart_rate = $("#heart_rate").val();
            var biparietal_diameter = $("#biparietal_diameter").val();
            var femur_length = $("#femur_length").val();
            var estimated_present = $("#estimated_present").val();
            var sex = $("#sex").val();
            var abnormalities = $("#abnormalities").val();
            var usrefno = $("#usrefno").val();
            
                        
            url = "{!! URL::to('saveLaboratorytest') !!}";
            $.ajax({
                url: url,
                async: false,
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", pqid: pqid, btsypt: btsypt, btdate: btdate, btglucose: btglucose, bthb: bthb, btrefno: btrefno, elecdate: elecdate, bicarbonate: bicarbonate, chloride: chloride, elecrefno: elecrefno, fbsdate: fbsdate, fbs: fbs, fbsrefno: fbsrefno, lipdate: lipdate, hdl_Cholesterol: hdl_Cholesterol, ldl_Cholesterol: ldl_Cholesterol, total_Cholesterol: total_Cholesterol, total_Cholesterol_ratio: total_Cholesterol_ratio, triglyceride: triglyceride, gggg: gggg, liprefno: liprefno, rfdate: rfdate, urea: urea, creatinine: creatinine, uric_acid: uric_acid, calcium: calcium, corrected_calcium: corrected_calcium, phospate: phospate, rfrefno: rfrefno, usdate: usdate, presentation_lie: presentation_lie, heart_rate: heart_rate, biparietal_diameter: biparietal_diameter, femur_length: femur_length, estimated_present: estimated_present, sex: sex, abnormalities: abnormalities, usrefno: usrefno},
            }).done(function (response) {
                $.toast({
                    heading: 'Success',
                    text: 'Data Updated Successfully.',
                    icon: 'success'
                })
            });

            //$('#prescriptionForm').submit();

        }
        
        $(document).ready(function () {
            var counter = 0;
            $("#addrow").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="text" class="form-control" id="select-country" name="drug' + counter + '" list="listCountry"/><datalist id="listCountry"><option>Paracetamol 120 mg/5 ml Syrup*(10)(10/22)</option><option>Albendazole 200 mg/5 ml Suspension(200)(12/23)</option><option>Acriflavin 0.1% Lotion(100)(9/21)</option></datalist></td>';
                cols += '<td><select type="text" class="form-control" name="quantity' + counter + '">  <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="note' + counter + '"/></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);
                counter++;
            });
            $("table.order-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
            //add blood test
            var counter = 0;
            $("#addBloodTest").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
                //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
                cols += '<td><span id="incre"></span></td>';
                cols += '<td><input type="date" name="day' + counter + '"></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="note' + counter + '"/></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.blood-list").append(newRow);
                counter++;
            });
            $("table.blood-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
            //add electro test
            var counter = 0;
            $("#addElectroTest").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
                //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
                cols += '<td><span id="incre"></span></td>';
                cols += '<td><input type="date" name="day' + counter + '"></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="note' + counter + '"/></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.electro-list").append(newRow);
                counter++;
            });
            $("table.electro-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
            //add FBS test
            var counter = 0;
            $("#addFBSTest").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
                //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
                cols += '<td><span id="incre"></span></td>';
                cols += '<td><input type="date" name="day' + counter + '"></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.FBS-list").append(newRow);
                counter++;
            });

            $("table.FBS-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
            //add lipids test
            var counter = 0;
            $("#addLipidsTest").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
                //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
                cols += '<td><span id="incre"></span></td>';
                cols += '<td><input type="date" name="day' + counter + '"></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.lipids-list").append(newRow);
                counter++;
            });

            $("table.lipids-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
            //add renal test
            var counter = 0;
            $("#addRenalTest").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
                //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
                cols += '<td><span id="incre"></span></td>';
                cols += '<td><input type="date" name="day' + counter + '"></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.renal-list").append(newRow);
                counter++;
            });

            $("table.renal-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
            //add ultra test
            var counter = 0;
            $("#addUltraTest").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";
                //cols += '<td><select class="form-control"  id="select-country" data-live-search="true" name="drug' + counter + '><option data-tokens="china">China</option><option data-tokens="malayasia">Malayasia</option><option data-tokens="singapore">Singapore</option></select></td>';
                cols += '<td><span id="incre"></span></td>';
                cols += '<td><input type="date" name="day' + counter + '"></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="dose' + counter + '"/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.ultra-list").append(newRow);
                counter++;
            });

            $("table.ultra-list").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
            // reference: http://www.chartjs.org/docs/
            $('#modChart').on('shown.bs.modal', function (event) {
                var link = $(event.relatedTarget);
                // get data source
                var source = link.attr('data-source').split(',');
                // get title
                var title = link.html();
                // get labels
                var table = link.parents('table');
                var labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

                $('#' + table.attr('id') + '>thead>tr>th').each(function (index, value) {
                    // without first column
                    if (index > 0) {
                        labels.push($(value).html());
                    }
                });
                // get target source
                var target = [];
                $.each(labels, function (index, value) {
                    target.push(link.attr('data-target-source'));
                });
                // Chart initialisieren
                var modal = $(this);
                var canvas = modal.find('.modal-body canvas');
                modal.find('.modal-title').html(title);
                var ctx = canvas[0].getContext("2d");
                var chart = new Chart(ctx).Line({
                    responsive: true,
                    labels: labels,
                    datasets: [{
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: source
                        }, {
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "#F7464A",
                            pointColor: "#FF5A5E",
                            pointStrokeColor: "#FF5A5E",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "red",
                            data: target
                        }]
                }, {});
            }).on('hidden.bs.modal', function (event) {
                // reset canvas size
                var modal = $(this);
                var canvas = modal.find('.modal-body canvas');
                canvas.attr('width', '568px').attr('height', '300px');
                // destroy modal
                $(this).data('bs.modal', null);
            });

            $('.box-item').draggable({
                cursor: 'move',
                helper: "clone"
            });

            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            function filterFunction() {
                var input, filter, ul, li, a, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                div = document.getElementById("myDropdown");
                a = div.getElementsByTagName("a");
                for (i = 0; i < a.length; i++) {
                    if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                    } else {
                        a[i].style.display = "none";
                    }
                }
            }

            $("#container1").droppable({
                drop: function (event, ui) {
                    var itemid = $(event.originalEvent.toElement).attr("itemid");
                    $('.box-item').each(function () {
                        if ($(this).attr("itemid") === itemid) {
                            $(this).appendTo("#container1");
                        }
                    });
                }
            });

            $("#container2").droppable({
                drop: function (event, ui) {
                    var itemid = $(event.originalEvent.toElement).attr("itemid");
                    $('.box-item').each(function () {
                        if ($(this).attr("itemid") === itemid) {
                            $(this).appendTo("#container2");
                        }
                    });
                }
            });

            pageSetUp();
            "use strict";
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var hdr = {
                left: 'title',
                center: 'month,agendaWeek,agendaDay',
                right: 'prev,today,next'
            };
            var initDrag = function (e) {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim(e.children().text()), // use the element's text as the event title
                    description: $.trim(e.children('span').attr('data-description')),
                    icon: $.trim(e.children('span').attr('data-icon')),
                    className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
                };
                // store the Event Object in the DOM element so we can get to it later
                e.data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                e.draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            };

            var addEvent = function (title, priority, description, icon) {
                title = title.length === 0 ? "Untitled Event" : title;
                description = description.length === 0 ? "No Description" : description;
                icon = icon.length === 0 ? " " : icon;
                priority = priority.length === 0 ? "label label-default" : priority;
                var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
                        icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();
                $("#event-container").effect("highlight", 800);
                initDrag(html);
            };

            /* initialize the external events
             -----------------------------------------------------------------*/
            $('#external-events > li').each(function () {
                initDrag($(this));
            });
            $('#add-event').click(function () {
                var title = $('#title').val(),
                        priority = $('input:radio[name=priority]:checked').val(),
                        description = $('#description').val(),
                        icon = $('input:radio[name=iconselect]:checked').val();

                addEvent(title, priority, description, icon);
            });
            /* initialize the calendar
             -----------------------------------------------------------------*/
            $('#calendar').fullCalendar({
                header: hdr,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped
                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);
                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                select: function (start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.fullCalendar('renderEvent', {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        }, true // make the event "stick"
                                );
                    }
                    calendar.fullCalendar('unselect');
                },
                events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1),
                        description: 'long description',
                        className: ["event", "bg-color-greenLight"],
                        icon: 'fa-check'
                    }, {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        className: ["event", "bg-color-red"],
                        icon: 'fa-lock'
                    }, {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d - 3, 16, 0),
                        allDay: false,
                        className: ["event", "bg-color-blue"],
                        icon: 'fa-clock-o'
                    }, {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d + 4, 16, 0),
                        allDay: false,
                        className: ["event", "bg-color-blue"],
                        icon: 'fa-clock-o'
                    }, {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false,
                        className: ["event", "bg-color-darken"]
                    }, {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false,
                        className: ["event", "bg-color-darken"]
                    }, {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false,
                        className: ["event", "bg-color-darken"]
                    }, {
                        title: 'Smartadmin Open Day',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        className: ["event", "bg-color-darken"]
                    }],
                eventRender: function (event, element, icon) {
                    if (!event.description == "") {
                        element.find('.fc-title').append("<br/><span class='ultra-light'>" + event.description +
                                "</span>");
                    }
                    if (!event.icon == "") {
                        element.find('.fc-title').append("<i class='air air-top-right fa " + event.icon +
                                " '></i>");
                    }
                },
                windowResize: function (event, ui) {
                    $('#calendar').fullCalendar('render');
                }
            });
            /* hide default buttons */
            $('.fc-right, .fc-center').hide();
            $('#calendar-buttons #btn-prev').click(function () {
                $('.fc-prev-button').click();
                return false;
            });
            $('#calendar-buttons #btn-next').click(function () {
                $('.fc-next-button').click();
                return false;
            });
            $('#calendar-buttons #btn-today').click(function () {
                $('.fc-today-button').click();
                return false;
            });
            $('#mt').click(function () {
                $('#calendar').fullCalendar('changeView', 'month');
            });
            $('#ag').click(function () {
                $('#calendar').fullCalendar('changeView', 'agendaWeek');
            });
            $('#td').click(function () {
                $('#calendar').fullCalendar('changeView', 'agendaDay');
            });
            $('.selectpicker').selectpicker();
        })
        $(document).ready(function () {
            $('.tree > ul').attr('role', 'tree').find('ul').attr('role', 'group');
            $('.tree').find('li:has(ul)').addClass('parent_li').attr('role', 'treeitem').find(' > span').attr('title', 'Collapse this branch').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(':visible')) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').removeClass().addClass('fa fa-lg fa-plus-circle');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').removeClass().addClass('fa fa-lg fa-minus-circle');
                }
                e.stopPropagation();
            });
        })

        $('#tabs').tabs();
        $('#tabs2').tabs();
    </script>

@endsection
