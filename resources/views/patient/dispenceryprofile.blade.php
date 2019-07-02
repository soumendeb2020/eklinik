@extends('layouts.app')
@section('content')
<!-- <div class="container"> -->
<!-- MAIN CONTENT -->
<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/main.css') }}">
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

    function submitDispenceryForm(){ 
        var pqid = '{{$qid}}';
        url = "{!! URL::to('closeDispencery') !!}";
        $.ajax({
            url: url,
            async: false,
            type: 'POST',
            data: {_token: "{{ csrf_token() }}", pqid:pqid },
        }).done(function (response) {
            if(response == 1){
                window.location.href = "{{ URL::to('dispensary/') }}";
            }
        });
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
                                            <span><i class="fa fa-clock-o"></i> 8.00</span> <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php if(count($othpqlist) > 0){ ?>
                                    <?php foreach($othpqlist as $key => $list){ ?>
                                        <li class="parent_li" role="treeitem">
                                            <span class="label label-success" title="Collapse this branch"><i class="fa fa-lg fa-minus-circle"></i> Tue, Jan 8: 8.00 hours</span>
                                            <ul role="group">
                                                <li>
                                                    <span><i class="fa fa-clock-o"></i> 6.00</span> <a href="javascript:void(0);">Appointment</a>
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-clock-o"></i> 2.00</span> <a href="javascript:void(0);">Appointment</a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php } ?>    
                                <?php } ?>
                                {{--
                                <li class="parent_li" role="treeitem">
                                    <span class="label label-success" title="Collapse this branch"><i class="fa fa-lg fa-plus-circle"></i> Mon, Jan 7: 8.00 hours</span>
                                    <ul role="group">
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 8.00</span> <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent_li" role="treeitem">
                                    <span class="label label-success" title="Collapse this branch"><i class="fa fa-lg fa-minus-circle"></i> Tue, Jan 8: 8.00 hours</span>
                                    <ul role="group">
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 6.00</span> <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 2.00</span> <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent_li" role="treeitem">
                                    <span class="label label-warning" title="Collapse this branch"><i class="fa fa-lg fa-minus-circle"></i> Wed, Jan 9: 6.00 hours</span>
                                    <ul role="group">
                                        <li>
                                            <span><i class="fa fa-clock-o"></i> 3.00</span> <a href="javascript:void(0);">Appointment</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span><i class="fa fa-clock-o"></i> 3.00</span> <a href="javascript:void(0);">Appointment</a>
                                </li>
                                --}}
                            </ul>
                        </li>
                        {{--
                        <li class="parent_li" role="treeitem">
                            <span class="label label-danger" title="Collapse this branch"><i class="fa fa-lg fa-minus-circle"></i> Wed, Jan 9: 4.00 hours</span>
                            <ul role="group">
                                <li>
                                    <span><i class="fa fa-clock-o"></i> 2.00</span> <a href="javascript:void(0);">Appointment</a>
                                </li>
                            </ul>
                        </li>
                        --}}
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
                    {{--
                    <div class="col-md-3">
                        <input type="button" onclick="openlabForm();" class="btn btn-success" name="btnAddMore" value="Go to Laboratory"><br><br>
                    </div>
                    --}}
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
                                            <li class="active"><a href="#tab1" data-toggle="tab" rel="tooltip" data-placement="top" data-original-title="" title="">Dispencery</a></li>
                                            {{-- <li><a href="#tab2" data-toggle="tab" rel="tooltip" data-placement="top" data-original-title="" title="">Laboratory</a></li> --}}
                                        </ul>
                                        <div class="tab-content padding-10">
                                            
                                            <div class="tab-pane in active" id="tab1">
                                                <input type="hidden" name="pid" value="{{ $patientData['queueId'] }}" >  
                                                <div class="form-group">
                                                    <label for="inputName"><strong>Prescription</strong></label>
                                                    <table id="myTable" class=" table order-list">
                                                        <thead>
                                                            <tr>
                                                                <td>SL No</td>
                                                                <td>Drugs</td>
                                                                <td>Quantity</td>
                                                                <td>Dossage</td>
                                                                <td>Description</td>
                                                                <td>Note</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="newEmpDt" >
                                                            @if (!empty($drugs))
                                                                @foreach ($drugs as $d)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{$d->drugs}}</td>
                                                                        <td>{{$d->qty}}</td>
                                                                        <td>{{$d->dossage}}</td>
                                                                        <td>{{$d->description}}</td>
                                                                        <td>{{$d->note}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5">No Drugs Exist Prescription</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                        <tfoot>
                                                            <tr> 
                                                                <td>SL No</td>
                                                                <td>Drugs</td>
                                                                <td>Quantity</td>
                                                                <td>Dossage</td>
                                                                <td>Description</td>
                                                                <td>Note</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div> 
                                                <div class="form-group" style="text-align: right;">
                                                    {{-- <input type="button" class="btn btn-default" onclick="addPrescription();" id="addrows" value="Add Row"> --}}
                                                </div>

                                                @if ($consult->medical_certificate == 1 )
                                                    <div class="form-group">
                                                        <label class="col-md-4" for="inputName" style="padding-right: 50px;">Medical Certificate</label>
                                                        <div class="col-md-8">
                                                            <input type="button" class="btn btn-default" onclick="javascript:demoFromHTML('fromHTMLtestdiv','medical-certificate.pdf','mc')" id="addrowsms" value="Download PDF">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style=" height: 30px"></div>
                                                @endif
                                                
                                                @if ($consult->time_slip == 1 )
                                                    <div class="form-group">
                                                        <label class="col-md-4" for="inputName" style="padding-right: 50px;">Time Slip</label>
                                                        <div class="col-md-8">
                                                            <input type="button" class="btn btn-default" onclick="javascript:demoFromHTML('fromHTMLtestdiv','time-slip.pdf','ts')" id="addrowsts" value="Download PDF">
                                                        </div>    
                                                    </div>
                                                    <div class="form-group" style=" height: 30px"></div>
                                                @endif
                                                <div class="form-group">
                                                    <button style="margin-left: 75%; width: 120px" type="button" class="btn btn-primary submitBtn" onclick="submitDispenceryForm()">Close</button>
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
                            <h4 class="modal-title" id="myModalLabel">Laboratory</h4>
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
                                <div class="row">
                                    <div class="col-md-12">Remarks</div>
                                    <div class="col-md-12 ">
                                        <textarea type="text" class="form-control" id="remarks" name="remarks" placeholder="Describe symptoms of patient "></textarea>
                                    </div>
                                    <div style="height: 20px; width: 100%; float: left;"></div>
                                    <div class="col-md-12">Tests</div>
                                    <div class="col-sm-6">
                                        <input name="bloodtest" id="bloodtest" type="checkbox" />
                                        <span>Blood Test</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="lipids" id="lipids" type="checkbox" />
                                        <span>Lipids</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="electrolytestest" id="electrolytestest" type="checkbox" />
                                        <span>Electrolytes Test</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="renalfunction" id="renalfunction" type="checkbox" />
                                        <span>Renal Function</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="fbs" id="fbs" type="checkbox" />
                                        <span>FBS</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="ultrasound" id="ultrasound" type="checkbox" />
                                        <span>Ultrasound</span>
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

<div id="fromHTMLtestdiv">

</div>


<script src="{{ URL::asset('js/basic.js') }}"></script>
<script src="{{ URL::asset('js/jspdf.debug.js') }}"></script>

<!-- PAGE RELATED PLUGIN(S)--> 
<script type="text/javascript">
    
    function demoFromHTML(divid,fname,dwntype) {
        
        if(dwntype == 'mc'){
            var url = "{!! URL::to('downloadmedicalcertificate') !!}";
        } else if(dwntype == 'ts'){
            var url = "{!! URL::to('dispencerytimeslip') !!}";
        }
        
        //url = "{!! URL::to('downloadmedicalcertificate') !!}";
        var qid = '{{$qid}}';

        $.ajax({
            url: url,
            async: false,
            type: 'POST',
            data: {_token: "{{ csrf_token() }}", qid: qid},
        }).done(function (response) {
            
            $('#fromHTMLtestdiv').html(response);
            var pdf = new jsPDF('p', 'pt', 'a4');
            pdf.addHTML(document.querySelector('#' + divid), function() {
                pdf.save(fname);
            });
        });
        $('#fromHTMLtestdiv').html('');
    }
     
    function passConstoDispancery(id){
        var APP_URL = '{!! json_encode(url('/consultations/')) !!}';
        //alert(APP_URL);
        url = "{!! URL::to('consultancyPassForm') !!}";
        $.ajax({
            url: url,
            async: false,
            type: 'POST',
            data: {_token: "{{ csrf_token() }}", id: id},
        }).done(function (response) {
            if(response == 0){
                $('#passToCons').css('display','none');
                window.location.href = "{{ URL::to('consultations/') }}";
            } else {
                window.location.href = "{{ URL::to('consultations/') }}";
            }
        });

    }



    $(document).ready(function () {
        //#######################################
        $("#is_medical_certificate").prop("checked", false);
        $("#is_time_slip").prop("checked", false);

        $('#txtFrom').val('');
        $('#txtTo').val('');
        $('#totDays').val('');
        $('#txtFroms').val('');
        $('#startTime').val('');
        $('#endTime').val('');
        $('#tothour').val('');
        /////////////////////////////////////////
        $('#medical_certificate').val(0);
        $('#time_slip').val(0);

        $('#stdate').val('');
        $('#enddate').val('');
        $('#totaldays').val('');
        $('#onlydate').val('');
        $('#sttime').val('');
        $('#endtime').val('');
        $('#totaltime').val('');
        //#######################################
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
        //$('.selectpicker').selectpicker();
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css" />

<script type="text/javascript">
    $(function () {
        $("#txtFrom").datepicker({
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            minDate: 'today',
            onSelect: function (selected) {
                var dt = new Date(selected);
                $('#stdate').val(selected);
                dt.setDate(dt.getDate() + 1);
                $("#txtTo").datepicker("option", "minDate", dt);

                if( $('#txtTo').val() != '' ){
                    var txtstart = new Date($('#txtFrom').val());
                    var txtend = new Date($('#txtTo').val());
                    var diff = (txtend - txtstart);
                    var days = diff/1000/60/60/24;
                    //alert(days);
                    $('#totDays').val( days + " Days" );
                    $('#totaldays').val(days);
                } else {
                    $('#totDays').val('');
                    $('#totaldays').val('');
                }
            }
        });

        $("#txtTo").datepicker({
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            minDate: 'today' + 1,
            onSelect: function (selected) {
                var dt = new Date(selected);
                $('#enddate').val(selected);
                dt.setDate(dt.getDate() - 1);
                $("#txtFrom").datepicker("option", "maxDate", dt);

                if( $('#txtFrom').val() != '' ){
                    var txtstart = new Date($('#txtFrom').val());
                    var txtend = new Date($('#txtTo').val());
                    var diff = (txtend - txtstart);
                    var days = diff/1000/60/60/24;
                    //alert(days);
                    $('#totDays').val( days + " Days" );
                    $('#totaldays').val(days);
                } else {
                    $('#totDays').val('');
                    $('#totaldays').val('');
                }
            }
        });

        $("#txtFroms").datepicker({
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            minDate: 'today',
            onSelect: function (selected) {
                var dt = new Date(selected);
                $('#onlydate').val(selected);
                dt.setDate(dt.getDate() + 1);
                $("#txtTo").datepicker("option", "minDate", dt);
            }
        });
    });
    $(function() {
        //$('#startTime').timepicker({ 'scrollDefault': 'now' });
        //$('#endTime').timepicker({ 'scrollDefault': 'now' });

        $("#startTime").timepicker({
            controlType: 'select',
            'timeFormat': 'H:i',
            oneLine: true,
        });

        $("#endTime").timepicker({
            controlType: 'select',
            'timeFormat': 'H:i',
            oneLine: true,
        });

        /*
        var $minimumStartTime = $("startTime").val();
        var $minimumEndTime = $("endTime").val();

        $.timepicker.timeRange(
            $minimumStartTime,
            $minimumEndTime,
            {
                minInterval: (1000*60*60), // 1hr
                timeFormat: 'HH:mm',
                start: {}, // start picker options
                end: {} // end picker options
            }
        )
        */

    });
</script>
    
@endsection
