@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->


<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-table fa-fw "></i>
                Eklinik <span> Dashboard </span>
            </h1>
        </div>
    </div>
    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div onclick="openAddPatientModal('outpatient');" class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Outpatient</div>
                            </div>
                        </div>
                    </div>
                    <a data-toggle="modal" data-target="#transModelex" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div onclick="openAddPatientModal('ty2');" class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shield fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>TY2</div>
                            </div>
                        </div>
                    </div>
                    <a data-toggle="modal" data-target="#ty2Model" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-pink">
                    <div onclick="openAddPatientModal('mother');" class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-female fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Ibu</div>
                            </div>
                        </div>
                    </div>
                    <a  data-toggle="modal" data-target="#motherModel" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div onclick="openAddPatientModal('child');" class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-child fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div>Kanak-Kanak</div>
                            </div>
                        </div>
                    </div>
                    <a data-toggle="modal" data-target="#kidsModel" href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12"/>
        </div>
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-4">
                <!-- Widget ID (each widget will need unique ID)-->
                <!-- Widget ID (each widget will need unique ID)-->
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header >
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Room 1 Queue List </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        <div class=" widget-body no-padding">
                            <table  class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-hide="phone">Queue Num</th>

                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Patient Name</th>

                                        <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1001</td>
                                        <td>Joyah bt Mat</td>
                                        <td><button type="button" class="btn btn-success btn-lg ">Serving</button></td>
                                    </tr>
                                    <tr>
                                        <td>1002</td>
                                        <td>Reza b Mat</td>
                                        <td><button type="button" class="btn btn-warning btn-lg ">Waiting</button></td>
                                </tbody>
                            </table>
                        </div>
                        <!-- end widget content -->
                    </div>
                </div>
                <!-- end widget -->
            </article>
            <!-- WIDGET END -->

            <!-- NEW WIDGET START -->
            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-4">
                <!-- Widget ID (each widget will need unique ID)-->
                <!-- Widget ID (each widget will need unique ID)-->
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header >
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Room 2 Queue List </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        <div class=" widget-body no-padding">
                            <table  class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-hide="phone">Queue Num</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Patient Name</th>
                                        <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2001</td>
                                        <td>Joyah bt Mat</td>
                                        <td><button type="button" class="btn btn-warning btn-lg ">Waiting</button></td>
                                    </tr>
                                    <tr>
                                        <td>2002</td>
                                        <td>Reza b Mat</td>
                                        <td><button type="button" class="btn btn-warning btn-lg ">Waiting</button></td>
                                </tbody>
                            </table>
                        </div>
                        <!-- end widget content -->
                    </div>
                </div>
                <!-- end widget -->
            </article>
            <!-- WIDGET END -->
            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-4">
                <!-- Widget ID (each widget will need unique ID)-->
                <!-- Widget ID (each widget will need unique ID)-->
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header >
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Counter 1 Queue List </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        <div class=" widget-body no-padding">
                            <table  class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-hide="phone">Queue Num</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Patient Name</th>
                                        <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1001</td>
                                        <td>Joyah bt Mat</td>
                                        <td><button type="button" class="btn btn-warning btn-lg ">Waiting</button></td>
                                    </tr>
                                    <tr>
                                        <td>2002</td>
                                        <td>Reza b Mat</td>
                                        <td><button type="button" class="btn btn-warning btn-lg ">Waiting</button></td>
                                </tbody>
                            </table>
                        </div>
                        <!-- end widget content -->
                    </div>
                </div>
                <!-- end widget -->
            </article>
        </div>			
        <!-- end widget div -->
</div>
<div class="row">
    <!-- end widget -->
    <!-- end row -->
</article>
<!-- WIDGET END -->
</section>
</div>
<!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->


<!-- ##################################  Out Patient Start   ################################################# -->
<div class="modal fade" id="transModel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" onclick="closemoDal();">
                    <span aria-hidden="true">x</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Registration</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="login-form" class="smart-form"  >
                    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}" >-->
                    <fieldset>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Category : </label>
                                <div class="col col-3">
                                   <label class="input">
                                       <select onchange="getCategorySearch(this.value);" class="delAllval" name="category" id="category">
                                            <option value="staffSection">Staff</option>
                                            <option value="dependentSection">Dependant</option>
                                            <option value="otherSection">Others</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section class="modalSearcSec" id="staffSection" >
                            <div class="row">
                                <label class="label col col-3">Search By : </label>
                                <div class="col col-3">
                                    <label class="input">
                                        <select class="searchcat searchcatstaffSection delAllval" name="searchcat" id="searchcat" >
                                            <option value="sid" >Staff Id</option>
                                            <option value="ic" >I/C</option>
                                            <option value="name" >Name</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col col-4">
                                    <label class="input"> 
                                        <input type="text" class="search searchstaffSection delAllval" name="search" id="search" value="">
                                    </label>
                                </div>
                                <div class="col col-2">
                                    <button type="button" onclick="getSearcResult();" class="btn btn-primary submitBtn">Search</button>
                                </div>
                            </div>
                        </section>
                        <section class="modalSearcSec" id="dependentSection" style="display: none" >
                            <div class="row">
                                <label class="label col col-3">Search By : </label>
                                <div class="col col-3">
                                    <label class="input">
                                        <select class="searchcat searchcatdependentSection delAllval" name="searchcat" id="searchcat" >
                                            <option value="ic" >I/C</option>
                                            <option value="name" >Name</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col col-4">
                                    <label class="input"> 
                                        <input type="text" class="search searchdependentSection delAllval" name="search" id="search" value="">
                                    </label>
                                </div>
                                <div class="col col-2">
                                    <button type="button" onclick="getSearcResult();" class="btn btn-primary submitBtn">Search</button>
                                </div>
                            </div>
                        </section>
                        <section class="modalSearcSec" id="otherSection" style="display: none" >
                            <div class="row">
                                <label class="label col col-3">Search By : </label>
                                <div class="col col-3">
                                    <label class="input">
                                        <select class="searchcat searchcatotherSection delAllval" name="searchcat" id="searchcat" >
                                            <option value="ic" >I/C</option>
                                            <option value="name" >Name</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col col-4">
                                    <label class="input"> 
                                        <input type="text" class="search searchotherSection delAllval" name="search" id="search" value="">
                                    </label>
                                </div>
                                <div class="col col-2">
                                    <button type="button" onclick="getSearcResult();" class="btn btn-primary submitBtn">Search</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-3"></div>
                                <div class="col col-4">
                                    <button type="button" onclick="addNewPatient();" class="btn btn-primary submitBtn submitBtn">Add New</button>
                                </div>
                            </div>
                        </section>
                        
                        <section>
                            <div class="row" id="regResult" style="display: none">
                                <label class="label col col-3">Result : </label>
                                <div class="col col-9">
                                    <table class="table table-striped table-bordered table-hover" width="100%">
                                        <tbody>
                                            <tr>
                                                <td rowspan="4">Staff</td>
                                                <td>Name: Nadia Izzati bt Hashim</td>
                                            </tr>
                                            <tr>
                                                <td>Staff Id: I0001</td>
                                            </tr>
                                            <tr>
                                                <td>Department: Ict</td>
                                            </tr>
                                            <tr>
                                                <td>I/C: 961231-12-5162</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Dependant: Ahzam bin Ismail</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row" id="newPatient" style="display: none">
                                <label class="label col col-3">New Patient : </label>
                                <div class="col col-9">
                                    <table class="table table-striped table-bordered table-hover" width="100%">
                                        <tbody>
                                            <tr>
                                                <td>Name: <input type="text" class="search searchstaffSection delAllval" onkeyup="getValuename(this.value);" name="pnamedt" id="pnamedt" value=""> </td>
                                            </tr>
                                            <tr>
                                                <td>I/C: <input type="text" class="search searchstaffSection delAllval" onkeyup="getValueicno(this.value);" name="icnodt" id="icnodt" value=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Queue Number : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" class="delAllval" name="queueno" id="queueno" value="">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Sympthoms : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" class="delAllval" name="sympthom" id="sympthom" value="">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Department: </label>
                                <div class="col col-3">
                                    <label class="input">
                                        <select class="searchcat searchcatdependentSection delAllval" name="department" id="department" >
                                            @foreach($department as $d)
                                                <option value="{{$d->id}}" >{{$d->name}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                    </fieldset>
                    <input type="hidden" class="delAllval" name="patType" id="patType" value="staffSection" >
                    <input type="hidden" class="delAllval" name="patCat" id="patCat" value="" >
                    <input type="hidden" class="delAllval" name="staff_id" id="staff_id" value="0" >
                    <input type="hidden" class="delAllval" class="delAllval" name="department_id" id="department_id" value="0" >
                    <input type="hidden" class="delAllval" name="icno" id="icno" value="" >
                    <input type="hidden" class="delAllval" name="pname" id="pname" value="" >
                    <input type="hidden" class="delAllval" name="isnew" id="isnew" value="0" >
                </form>
                <fieldset>
                    <section>
                        <div class="row">
                            <label class="label col col-12 saveQueAlert" style="color: red; font-weight: bold; display: none"></label>
                        </div>
                    </section>
                </fieldset>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="closemoDal();" >Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitPatientRegistrationForm()" >Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="transModelToken" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <fieldset>
                    <section>
                        <div class="row" id="regResults" style="display: block">
                            
                            <div class="col-md-12 text-center">
                                <h3><strong>Eklinik</strong></h3>
                                <p><strong id="cosuting" ></strong></p>
                                <p>Your Token No</p>
                                <h1><strong id="token"></strong></h1>
                                <p>Please Wait For Your Turn</p>
                                <p>Total Customer Waiting (5)</p>
                                <div class="">
                                    <div class="col-md-6 text-left" id="datef"></div>
                                    <div class="col-md-6 text-right" id="timef"></div>
                                </div>

                            </div>
                        </div>
                    </section>
                </fieldset>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    function openAddPatientModal(dt){
        $('#transModel').modal('show');
        $('#patCat').val(dt);
        
    }
    
    function closemoDal(){
        $("#category").val('');
        $("#searchcat").val('');
        $("#search").val('');
        $("#regResult").html('');
        $("#pnamedt").val('');
        $("#icnodt").val('');
        $("#sympthom").val('');
        $("#department").val('');
        $('.delAllval').val('');
        $("#isnew").val('');
        $('#transModel').modal('hide');
        //$('#transModelToken').modal('hide');
        $('.saveQueAlert').html('');
        $('.saveQueAlert').css('display','none');
    }
    
    function submitPatientRegistrationForm(){
        var patType = $("#patType").val();
        var cat = $("#patCat").val();
        var staff_id = $("#staff_id").val();
        var dept_id = $("#department_id").val();
        var ic_number = $("#icno").val();
        var name = $("#pname").val();
        var isnew = $("#isnew").val();
        var queueno = $("#queueno").val();
        var symptopms = $("#sympthom").val();
        var department_id = $("#department").val();
        
        var triger = 1;
        
        if(ic_number == ''){
            triger = 0;
        }
        if(triger){
            if(name == ''){
                triger = 0;
            }
        }

        if(triger){
            if(queueno == ''){
                triger = 0;
            }
        }

        if(triger){
            if(symptopms == ''){
                triger = 0;
            }
        }
        
        if(triger){
            if(department_id == ''){
                triger = 0;
            }
        }
        
        if(triger){
            $('.saveQueAlert').css('display','none');
            url = "{!! URL::to('saveNewPatient') !!}";
            $.ajax({
                url: url,
                async: false,
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", type: patType, cat: cat, staff_id: staff_id, dept_id: dept_id, ic_number: ic_number, name: name, queueno: queueno, symptopms: symptopms, department_id: department_id},
            }).done(function (response) {
                if(response != 0){
                    $('#cosuting').html(response['depart_name']);
                    $('#token').html(response['token_no']);
                    $('#datef').html(response['created_at']);
                    $('#timef').html(response['created_time']);
                    $('#transModel').modal('hide');
                    $('#transModelToken').modal('show');
                    $("#category").val('');
                    $("#searchcat").val('');
                    $("#search").val('');
                    $("#regResult").html('');
                    $("#pnamedt").val('');
                    $("#icnodt").val('');
                    $("#sympthom").val('');
                    $("#department").val('');
                    $('.delAllval').val('');
                    $("#isnew").val('');
                }
            });
        } else {
            $('.saveQueAlert').html('Alert : Please Fill All Fields or Check your all data is correct.');
            $('.saveQueAlert').css('display','block');
        }
    }
    
    function getValuename(dt){
        $("#pname").val(dt);
    }
    
    function getValueicno(dt){
        $("#icno").val(dt);
    }
    
    function addNewPatient(){
        $('#newPatient').css('display','block');
        $('#regResult').css('display','none');
        $('.modalSearcSec').css('display','none');
        $("#isnew").val(1);
    }
    
    
    function getCategorySearch(dt){
        $('#regResult').css('display','none');
        $('#newPatient').css('display','none');
        $('.modalSearcSec').css('display','none');
        $('#' + dt).css('display','block');
        $('#searchcat option:first').prop('selected',true);
        $("#search").val("");
        $("#patType").val(dt);
        $("#isnew").val(0);
    }
    
    function getSearcResult(){
        var pttype = $("#patType").val();
        var scat = $(".searchcat" + pttype).val();
        var sdt = $(".search" + pttype).val();
        var stype = $("#patType").val();
        $("#isnew").val(0);
        
        url = "{!! URL::to('getAddPatientResult') !!}";
        $.ajax({
            url: url,
            async: false,
            type: 'POST',
            data: {_token: "{{ csrf_token() }}", scat: scat, sdt: sdt, stype: stype},
        }).done(function (response) {
            $('#regResult').css('display','block');
            $('#regResult').html(response);
        });
        
        url = "{!! URL::to('getAddPatientResultdata') !!}";
        $.ajax({
            url: url,
            async: false,
            type: 'POST',
            data: {_token: "{{ csrf_token() }}", scat: scat, sdt: sdt, stype: stype},
        }).done(function (response) {
            if(response != 1){
                $("#staff_id").val(response['staffid']);
                $("#icno").val(response['ic']);
                $("#pname").val(response['name']);
            }
        });  
    }
    
</script>    
<!-- ##################################  Out Patient Start   ################################################# -->



<?php /* ?>
<div class="modal fade" id="transModel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Search</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="login-form" class="smart-form">
                    <fieldset>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Queue Number : </label>
                                <div class="col col-9">
                                        <label class="input"> <!--<i class="icon-append fa fa-user"></i>-->
                                        <input type="text" name="role" placeholder="Queue Number">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Search By : </label>
                                <div class="col col-3">
                                        <label class="input"><!-- <i class="icon-append fa fa-user"></i>-->
                                                <!--<input type="text" name="role">-->
                                        <select><option>Emp. No</option>
                                            <option>Name</option>
                                            <option>NRIC</option>
                                        </select>

                                    </label>
                                </div>
                                <div class="col col-6">
                                        <label class="input"> <!--<i class="icon-append fa fa-user"></i>-->
                                        <input type="text" name="search">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Sympthoms : </label>
                                <div class="col col-9">
                                        <label class="input"> <!--<i class="icon-append fa fa-lock"></i>-->
                                        <input type="text" name="sympthom">
                                    </label>
                                </div>
                            </div>
                        </section>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php */ ?>
@endsection
