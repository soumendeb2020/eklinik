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
                                <button type="button" name="save" onclick="savedataGroup()" >Save</button>
                            </div>
                        </div> 
                        <br>
                    </div>
                    <script>
                        function savedataGroup(){
                            var receptno = $('#glreceiptno').val();
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
                        }
                        
                        function savedataSingle(ids){
                            var receptno = $('#receiptno' + ids).val();
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
                            });
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
                                                            @if (!empty($employees))
                                                                @foreach ($employees as $e)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{ date('d-M-y', strtotime($ty2que->created_at)) }}</td>
                                                                        <td>{{$e->name}}</td>
                                                                        <td>{{$e->ic_number}}</td>
                                                                        
                                                                        @if (!empty($e->receipt_no))
                                                                        <td id="recepttd{{$e->recid}}">{{$e->receipt_no}}</td>
                                                                        @else
                                                                        <td id="recepttd{{$e->recid}}"><input style="width: 100%" type="text" name="receiptno" id="receiptno{{$e->recid}}" value="" ></td>
                                                                        @endif
                                                                         
                                                                        <td>
                                                                            @if (empty($e->receipt_no))
                                                                            <button id="save{{$e->recid}}" type="button" name="save" onclick="savedataSingle('{{$e->recid}}')" >Save</button>
                                                                            @endif
                                                                            <button type="button" name="print" onclick="myPrint('{{$e->recid}}')">Print</button>
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
                                                --}}
                                                <div class="form-group">
                                                    <button style="margin-left: 75%; width: 120px" type="button" class="btn btn-primary submitBtn" onclick="myPrint()">Print Certificate</button>
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
        </div>
    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->
</div>

<div id="printdiv">
    <div style=" display: none" class="container cntDevDiv">
        <div class="row">
            <div class="col-sm-1" style="width: 8.33333333%; float: left;padding-right: 15px;padding-left: 15px;"></div>
            <div class="col-sm-10" style="width: 83.33333333%; float: left;padding-right: 15px;padding-left: 15px;border-bottom: 2px solid #000;">
                <div class="col-sm-2 text-center" style="width: 16.66666667%;; float: left;padding-right: 15px;padding-left: 15px;">
                    <img id="logoImg" width="110" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGUAAAB7CAIAAADiwtlzAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF0WlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDUgNzkuMTYzNDk5LCAyMDE4LzA4LzEzLTE2OjQwOjIyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDE5LTA2LTA0VDExOjU1OjUwKzA1OjMwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDE5LTA2LTA0VDExOjU1OjUwKzA1OjMwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxOS0wNi0wNFQxMTo1NTo1MCswNTozMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDphNTJkMzhkZS1kZTE5LThjNDMtODI4Mi1kZDU5NzgwNmQ0MjkiIHhtcE1NOkRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDpmYjQwYzM4YS03NmRlLWJlNDEtYjgz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" alt="" />
                </div>
                <div class="col-sm-10"  style="width: 83.33333333%; float: left;padding-right: 15px;padding-left: 15px;">
                    <p class="txt text-center" style="margin: 0 0 10px;">BAHAGIAN KLINIKAL</p>
                    <p class="txt text-center" style="margin: 0 0 10px;">JABATAN PERKHIDMATAN KESIHATAN DAN PERSEKITARAN</p>
                    <p class="txt text-center" style="margin: 0 0 10px;">MAJLIS BANDARAYA PETALING JAYA</p>
                    <p class="txt text-center" style="margin: 0 0 10px;">No. 43, JALAN 8/1, 46050 PETALING JAYA, SELANGOR</p>
                    <p class="txt text-center" style="margin: 0 0 5px;">TEL: 03-7956 5017 &nbsp;&nbsp;/&nbsp;&nbsp;FAX: 03-7958 6481</p>
                </div>
            </div>
            <div class="col-sm-1" style="width: 8.33333333%; float: left;padding-right: 15px;padding-left: 15px;"></div>
        </div>
        <div class="row">
            <div class="col-sm-1" style="width: 8.33333333%; float: left;padding-right: 15px;padding-left: 15px;"></div>
            <div class="col-sm-10" style="width: 83.33333333%; float: left;padding-right: 15px;padding-left: 15px;">
                <div class="row">
                    <div class="col-sm-8" style="width: 66.66666667% float: left;padding-right: 15px;padding-left: 0px;">
                        <p>&nbsp;</p>
                        <p class="txt" style="margin: 0 0 10px;">Ruj (&nbsp;) dim.MBPJ/Kes(Klk)/T/B3/TY2</p>
                        <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;letter-spacing: 0.5px;">Kapada:-</p>
                        <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;letter-spacing: 0.5px;">Yang Berkenaan,</p>
                        <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;letter-spacing: 0.5px;">Tuan;Puan</p>
                    </div>
                    <div class="col-sm-4" style="width: 33.33333333%; float: left;padding-right: 0px;padding-left: 15px;">
                        <p>&nbsp;</p>
                        <p class="txt">Tarikh: .....................................</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-1" style="width: 8.33333333%; float: left;padding-right: 15px;padding-left: 15px;"></div>
        </div>
        <div class="row">
            <div class="col-sm-1" style="width: 8.33333333%; float: left;padding-right: 15px;padding-left: 15px;"></div>
            <div class="col-sm-10" style="width: 83.33333333%; float: left;padding-right: 15px;padding-left: 0px;">
                <p class="txt" style="line-height: 34px;margin: 0 0 10px;"><u>PENGESAHAN SUNTIKAN ANTI THYPHOID (TY2) UNTUK PENGENDALI MAKANAN</u></p>
                <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;letter-spacing: 0.5px;">Dengan segala hormatnya merujuk kepada perkara di atas.</p>
                <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;letter-spacing: 0.5px;">2. Adalah dirnaklumkan bahawa pengendali pengusaha roakanan seprti nama di bawah telah mendapal suntikan Anti Typhcid(TY2) seperti makulmat berikut :-</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p class="txt" style="line-height: 34px;margin: 0 0 0px;">Nama:.............................................................................. No. K.P/P.P:.................................................</p>
                <p class="txt" style="line-height: 34px;margin: 0 0 25px;">Nama & Alamat Tempat Kerja/Berniaga:</p>
                <p style="line-height: 34px;margin: 0 0 25px;">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                <p style="line-height: 34px;margin: 0 0 25px;">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                <p style="line-height: 34px;margin: 0 0 25px;">--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
                <table class="table table-bordered" style="border: 1px solid #000;margin-bottom: 80px;">
                    <tr>
                        <td style="border: 1px solid #000;">Tarikh Suntikan :.................................................................</td>
                        <td style="border: 1px solid #000;">Tarikh Tamat Suntikan :........................................................</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #000;">
                            <p class="txt">WAKTU SUNTIKAN</p>
                            <p class="txt">SESI PAGI / SESI PETANG </p>
                            <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;">Se asa : 10.00 Pg - 12.30 Tgh / 2.00 Ptg - 4.00 Ptg</p>
                            <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;">Khamis : 10.00 Pg - 12.30 Tgh / 2.00 Ptg - 4.00 Ptg</p>
                            <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;">Jumaal : 10.00 Pg - 12.30 Tgh / 2.00 Ptg - 4.00 Ptg</p>
                        </td>
                        <td style="border: 1px solid #000;">
                            <p class="txt">&nbsp;</p>
                            <p class="txt">&nbsp;</p>
                            <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 15px;">No. Resit : ............................................................................</p>
                            <p style="font-family: sans-serif;font-size: 18px;line-height: 34px;margin: 0 0 0px;">Tarikh Resit : .......................................................................</p>
                        </td>
                    </tr>
                </table>
                <p class="txt">
                    b.p. Pegawai Perubatan<br>
                    Bahagian Klinikal<br>
                    Jabatan Perkhidmatan Kesihatan Dan Persekitaran<br>
                    Majlis Bandaraya Petaling Jaya
                </p>
            </div>
            <div class="col-sm-1" style="width: 8.33333333%; float: left;padding-right: 15px;padding-left: 15px;"></div>
        </div>
    </div>
</div>

<script>
    function myPrint() { 
        var content = '';
        $('.cntDevDiv').css('display', 'block');
        content = $('#printdiv').html();
        $('.cntDevDiv').css('display', 'none');
        var printWindow = '<html><head><title>my div</title><link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><link rel="stylesheet" type="text/css" href="http://infrastep.com/eklinik/public/css/main.css"></head><body>'+ content +'</body></html>';

        var mywindow = window.open('', 'print div', 'height=600,width=900');
        mywindow.document.write(printWindow);
        mywindow.print();
        return true;
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
