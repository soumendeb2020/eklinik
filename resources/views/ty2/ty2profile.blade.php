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

<input type="hidden" name="patQids" id="patQids" value="1">
<input type="hidden" name="patSymptopms" id="patSymptopms" value="qwert">
<div class="emp-profile">
    <div method="post">
        <div class="row">
            <div class="col-md-2">
                <div class="profile-img">
                    {{--
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="">
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file">
                    </div>
                    --}}
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-head">
                    {{--
                    <div class="col-md-3">  
                        <h5 style="font-size: 13px !important ;"> Name </h5>
                        <h6 style="font-size: 12px !important ;"> Name </h6>
                        
                        <p>Patient Status</p>
                        <a href="">Patient Status</a><br>

                        <p>Department</p>
                        <a href="">Department</a><br> 
                    </div>
                    
                    <div class="col-md-3">
                        <p>Queue Number</p>
                        <a href="">Queue Number</a><br>

                        <p>Email</p>
                        <a href=""> Email </a><br>
                        
                        <p>Phone</p>
                        <a href=""> Phone </a><br>
                    </div>
                    
                    <div class="col-md-3">
                        <h5>IC Num</h5>
                        <a href="">IC Num</a><br>
                        
                        <h5>Date of birth</h5>
                        <a href="">Date of birth</a><br>

                        <h5>Age</h5>
                        <a href="">Age</a><br>
                    </div>
                    --}}
                    <div class="col-md-12">
                        
                        <div class="row">
                            <div class="col-md-3">Company : </div>
                            <div class="col-md-9"><a href="JavaScript:Void(0);">{{ $company->name }}</a></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">Address : </div>
                            <div class="col-md-9"><a href="JavaScript:Void(0);">{{ $company->addr1 }}, {{ $company->addr2 }}, {{ $company->addr3 }}</a></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">Queue Number : </div>
                            <div class="col-md-9"><a href="JavaScript:Void(0);">{{ $ty2que->queueno }}</a></div>
                        </div> 
                        <br>
                        <div class="row">
                            <div class="col-md-3">Recept Number : </div>
                            <div class="col-md-9">
                                <input style="width: 50%" type="text" name="glreceiptno" id="glreceiptno" value="" >
                                <span id="saveGrRecepno" style=" color: red; display: none">Receipt No Cannot Blank</span>
                                <button type="button" name="save" onclick="savedataGroup()" >Save</button>
                            </div>
                        </div> 
                        <br>
                    </div>
                    <script>
                        function savedataGroup(){
                            var receptno = $('#glreceiptno').val();
                            if(receptno != ''){
                                $('#saveGrRecepno').css('display','none');
                                var ty2qid = $('#ty2qid').val();
                                url = "{!! URL::to('savety2groupreceipt') !!}";
                                $.ajax({
                                    url: url,
                                    async: false,
                                    type: 'POST',
                                    data: {_token: "{{ csrf_token() }}", receptno: receptno, ty2qid: ty2qid},
                                }).done(function (response) {
                                     location.reload(true);    
                                });
                            } else {
                                $('#saveGrRecepno').css('display','none');
                            }
                        }
                        
                        function savedataSingle(ids){
                            var receptno = $('#receiptno' + ids).val();
                            if(receptno != ''){
                                $('#recpno' + ids).css('display','none');
                                url = "{!! URL::to('savety2receipt') !!}";
                                $.ajax({
                                    url: url,
                                    async: false,
                                    type: 'POST',
                                    data: {_token: "{{ csrf_token() }}", receptno: receptno, ty2qid: ids},
                                }).done(function (response) {
                                     //location.reload(true);    
                                     $('#recepttd'+ids).html(receptno);
                                     $('#save' +ids).hide();
                                     $('#insbutton' +ids).html('<button type="button" name="print" onclick="myPrint(' + ids + ')">Print</button>');
                                });
                            } else {
                                $('#recpno' + ids).css('display','block');
                            }
                        }
                    </script>    
                    <input type="hidden" class="delAllval" name="ty2qid" id="ty2qid" value="{{$ty2que->id}}" >
                    <input type="hidden" class="delAllval" name="companyid" id="companyid" value="{{$company->id}}" >
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
                                            <li class="active"><a href="#tab1" data-toggle="tab" rel="tooltip" data-placement="top" data-original-title="" title="">TY2</a></li>
                                        </ul>
                                        <div class="tab-content padding-10">
                                            
                                            <div class="tab-pane in active" id="tab1">
                                                <input type="hidden" name="pid" value="1" >  
                                                <div class="form-group">
                                                    <label for="inputName"><strong> </strong></label>
                                                    <table id="myTable" class=" table order-list">
                                                        <thead>
                                                            <tr> 
                                                                <td>No</td>
                                                                <td>Date</td>
                                                                <td>Patient Name</td>
                                                                <td>ICNo /Passport No</td>
                                                                <td>Receipt No</td>
                                                                <td>Action</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="newEmpDt" >
                                                            @if(!empty($employees))
                                                                @foreach ($employees as $e)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{ date('d-M-y', strtotime($e->created_at)) }}</td>
                                                                        <td>{{$e->name}}</td>
                                                                        <td>{{$e->ic_number}}</td>
                                                                        
                                                                        @if (!empty($e->receipt_no))
                                                                        <td id="recepttd{{$e->id}}">{{$e->receipt_no}}</td>
                                                                        @else
                                                                        <td id="recepttd{{$e->id}}">
                                                                            <input style="width: 100%" type="text" name="receiptno" id="receiptno{{$e->id}}" value="" >
                                                                            <span id="recpno{{$e->id}}" style=" color: red; display: none">Receipt No Cannot Blank</span>
                                                                        </td>
                                                                        @endif
                                                                         
                                                                        <td id="insbutton{{$e->id}}">
                                                                            @if (empty($e->receipt_no))
                                                                                <button id="save{{$e->id}}" type="button" name="save" onclick="savedataSingle('{{$e->id}}')" >Save</button>
                                                                            @else
                                                                                <button type="button" name="print" onclick="myPrint('{{$e->id}}')">Print</button>
                                                                                <span id="plist{{$e->id}}" data-id="{{$e->id}}" data-rno="{{$e->receipt_no}}" data-rdate="{{$e->receipt_date}}" data-edate="{{$e->expiry_date}}" data-name="{{$e->name}}" data-ic="{{$e->ic_number}}" data-addr1="{{$company->addr1}}" data-addr2="{{$company->addr2}}" data-addr3="{{$company->addr3}}" ></span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="6">No Employee Exist </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                        <tfoot>
                                                            <tr> 
                                                                <td>No</td>
                                                                <td>Date</td>
                                                                <td>Patient Name</td>
                                                                <td>ICNo /Passport No</td>
                                                                <td>Receipt No</td>
                                                                <td>Action</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div> 
                                                <div class="form-group" style="text-align: right;">
                                                </div>
                                                {{--
                                                <div class="form-group">
                                                    <label class="col-md-4" for="inputName" style="padding-right: 50px;">Medical Certificate</label>
                                                    <div class="col-md-8">
                                                        <input type="button" class="btn btn-default" onclick="javascript:demoFromHTML('fromHTMLtestdiv','medical-certificate.pdf','mc')" id="addrowsms" value="Download PDF">
                                                    </div>
                                                </div>
                                                <div class="form-group" style=" height: 30px"></div>

                                                <div class="form-group">
                                                    <label class="col-md-4" for="inputName" style="padding-right: 50px;">Time Slip</label>
                                                    <div class="col-md-8">
                                                        <input type="button" class="btn btn-default" onclick="javascript:demoFromHTML('fromHTMLtestdiv','time-slip.pdf','ts')" id="addrowsts" value="Download PDF">
                                                    </div>    
                                                </div>
                                                <div class="form-group" style=" height: 30px"></div>
                                                <div class="form-group">
                                                    <button style="margin-left: 75%; width: 120px" type="button" class="btn btn-primary submitBtn" onclick="myPrint()">Print Certificate</button>
                                                </div>
                                                --}}
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
        </div>
    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->
</div>




<script>
    function myPrint(id) { 
        var plist = document.getElementById("plist" + id);
        var id = plist.getAttribute("data-id");
        var rno = plist.getAttribute("data-rno");
        var rdate = plist.getAttribute("data-rdate");
        var edate = plist.getAttribute("data-edate");
        var name = plist.getAttribute("data-name");
        var ic = plist.getAttribute("data-ic");
        var addr1 = plist.getAttribute("data-addr1");
        var addr2 = plist.getAttribute("data-addr2");
        var addr3 = plist.getAttribute("data-addr3");
        
        url = "{!! URL::to('createPrintHtml') !!}";
        $.ajax({
            url: url,
            async: false,
            type: 'POST',
            data: {_token: "{{ csrf_token() }}", id: id, rno: rno, rdate: rdate, edate: edate, name: name, ic: ic, addr1: addr1, addr2: addr2, addr3: addr3 },
        }).done(function (response) {
            var content = '';
            var printWindow = response;
            var myWindow = window.open('', '', 'height=800,width=1100');
            myWindow.document.write('<html><head><title>my div</title>');
            myWindow.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><link rel="stylesheet" type="text/css" media="print" href="http://infrastep.com/eklinik/public/css/print-main.css">');
            myWindow.document.write('</head><body >');
            myWindow.document.write(printWindow);
            myWindow.document.write('</body></html>');
            myWindow.document.close(); // necessary for IE >= 10
            myWindow.onload=function(){ // necessary if the div contain images
                myWindow.focus(); // necessary for IE >= 10
                myWindow.print();
                myWindow.close();
            };
        });
    }
</script>
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
                    <input type="hidden" name="labreqpid" value="1" >
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
    });
</script>
@endsection
