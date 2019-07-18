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
                    <a onclick="openAddPatientModal('outpatient');" href="JavaScript:Void(0);">
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
                    <div onclick="openAddTy2Modal('ty2');" class="panel-heading">
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
                    <a onclick="openAddTy2Modal('ty2');" href="JavaScript:Void(0);">
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
                    <a onclick="openAddPatientModal('mother');" href="JavaScript:Void(0);">
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
                    <a onclick="openAddPatientModal('child');" href="JavaScript:Void(0);">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12"/>
        </div>
        <div class="row">
            <article class="col-sm-12 col-md-12 col-lg-4">
                <div class="jarviswidget" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header >
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Consutation 1 Queue List </h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
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
                                    @if(!empty($patientList1))
                                        @foreach($patientList1 as $p1)
                                        <tr>
                                            <td>{{$p1['pqueue']->token_no}}</td>
                                            <td>{{$p1['patientdet']->name}}</td>
                                            <td>
                                                @if($p1['pqueue']->is_active == 1)
                                                    <button type="button" class="btn btn-success btn-lg ">Waiting</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-lg ">Complete</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">Queue Not Exist</td>
                                        </tr>
                                    @endif    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
            <article class="col-sm-12 col-md-12 col-lg-4">
                <div class="jarviswidget" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header >
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Consutation 2 Queue List </h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
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
                                    @if(!empty($patientList2))
                                        @foreach($patientList2 as $p1)
                                        <tr>
                                            <td>{{$p1['pqueue']->token_no}}</td>
                                            <td>{{$p1['patientdet']->name}}</td>
                                            <td>
                                                @if($p1['pqueue']->is_active == 1)
                                                    <button type="button" class="btn btn-success btn-lg ">Waiting</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-lg ">Complete</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">Queue Not Exist</td>
                                        </tr>
                                    @endif 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
            <article class="col-sm-12 col-md-12 col-lg-4">
                <div class="jarviswidget" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header >
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Laboratory Queue List </h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox">
                        </div>
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
                                    @if(!empty($labpatientList))
                                        @foreach($labpatientList as $p1)
                                        <tr>
                                            <td>{{$p1['pqueue']->token_no}}</td>
                                            <td>{{$p1['patientdet']->name}}</td>
                                            <td>
                                                @if($p1['pqueue']->is_active == 1)
                                                    <button type="button" class="btn btn-success btn-lg ">Waiting</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-lg ">Complete</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">Queue Not Exist</td>
                                        </tr>
                                    @endif 
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
                        <section>
                            <div class="row">
                                <label class="cel-gap label col-xs-12">Category : </label>
                                <div class="cel-gap col-xs-12">
                                    <label class="input">
                                        <select onchange="getCategorySearch(this.value);" class="delvalcat dropdown-wrap" name="category" id="category">
                                            <option value="">Select Category</option>
                                            <option value="staffSection">Staff</option>
                                            <option value="dependentSection">Dependant</option>
                                            <option value="amSection">AM</option>
                                            <option value="wmSection">WM</option>
                                            <option value="okuSection">OKU</option>
                                            <option value="wmasSection">WMAS</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section class="modalSearcSec staffSection" id="staffSection" > 
                            <div class="row">
                                <label class="cel-gap label col-xs-12">Search By : </label>
                                <div class="cel-gap col-xs-4">
                                    <label class="input">
                                        <select class="searchcat searchcatstaffSection delvalcat1 dropdown-wrap" name="searchcat" id="searchcat">
                                            <option value="sid" >Staff Id</option>
                                            <option value="ic" >I/C</option>
                                            <option value="name" >Name</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="cel-gap col-xs-6">
                                    <label class="input"> 
                                        <input type="text" class="search searchstaffSection delAllval" name="search" id="search" value="">
                                    </label>
                                </div>
                                <div class="cel-gap col-xs-2">
                                    <button type="button" onclick="getSearcResult('staff');" class="btn btn-primary btn-submit submitBtn">Search</button>
                                </div>
                            </div>
                        </section>
                        <section class="modalSearcSec dependentSection" id="dependentSection" style="display: none" >
                            <div class="row">
                                <label class="cel-gap label col-xs-12">Search By : </label>
                                <div class="cel-gap col-xs-4">
                                    <label class="input">
                                        <select class="searchcat dropdown-wrap searchcatdependentSection delvalcat2" name="searchcat" id="searchcat" >
                                            <option value="ic" >I/C</option>
                                            <option value="name" >Name</option>
                                        </select>
                                    </label>
                                </div>  
                                <div class="cel-gap col-xs-6">
                                    <label class="input"> 
                                        <input type="text" class="search searchdependentSection delAllval" name="search" id="search" value="">
                                    </label>
                                </div>
                                <div class="cel-gap col-xs-2">
                                    <button type="button" onclick="getSearcResult('dependent');" class="btn btn-primary btn-submit submitBtn">Search</button>
                                </div>
                            </div>
                        </section>
                        <section class="modalSearcSec amSection wmSection okuSection wmasSection" id="otherSection" style="display: none" >
                            <div class="row">
                                <label class="cel-gap label col-xs-12">Search By : </label>
                                <div class="cel-gap col-xs-4">
                                    <label class="input">
                                        <select class="searchcat dropdown-wrap searchcatotherSection delAllval" name="searchcat" id="searchcat" >
                                            <option value="ic" >I/C</option>
                                            <option value="name" >Name</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="cel-gap col-xs-6">
                                    <label class="input"> 
                                        <input type="text" class="search searchotherSection delAllval" name="search" id="search" value="">
                                    </label>
                                </div>
                                <div class="cel-gap col-xs-2">
                                    <button type="button" onclick="getSearcResult('other');" class="btn btn-primary btn-submit submitBtn">Search</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="cel-gap col-xs-9"></div>
                                <div class="cel-gap col-xs-3 text-right" style="margin-top: 10px;">
                                    <button type="button" onclick="addNewPatient();" class="btn btn-primary btn-submit submitBtn">Add New</button>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row" id="regResult" style="display: none"></div>
                        </section>
                        <section>
                            <div class="row" id="newPatient" style="display: none">
                                <label class="cel-gap label col-xs-12">New Patient : </label>
                                <div class="cel-gap col-xs-12">
                                    <table class="table table-striped table-bordered table-hover" width="100%">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="col-xs-3">Name: </div>
                                                    <div class="col-xs-9"><input type="text" class="search input-wrap searchstaffSection delAllval" onkeyup="getValuename(this.value);" name="pnamedt" id="pnamedt" value=""></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="col-xs-3">I/C: </div>
                                                    <div class="col-xs-9"><input type="text" class="search input-wrap searchstaffSection delAllval" onkeyup="getValueicno(this.value);" name="icnodt" id="icnodt" value=""></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    
                        <section>
                            <div class="row">
                                <label class="label col col-12 searchQueryAlert" style="color: red; font-weight: bold; display: none"></label>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="cel-gap label col-xs-12">Queue Number : </label>
                                <div class="cel-gap col-xs-12">
                                    <label class="input">
                                        <input type="text" class="delAllval" name="queueno" id="queueno" value="">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="cel-gap label col-xs-12">Sympthoms : </label>
                                <div class="cel-gap col-xs-12">
                                    <label class="input">
                                        <input type="text" class="delAllval" name="sympthom" id="sympthom" value="">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="cel-gap label col-xs-12">Department: </label>
                                <div class="cel-gap col-xs-12">
                                    <label class="input">
                                        <select class="searchcat dropdown-wrap searchcatdependentSection delDeptval" onchange="getLabTestData(this.value);" name="department" id="department" >
                                            @foreach($department as $d)
                                            <option value="{{$d->id}}" >{{$d->name}}</option>
                                            @endforeach
                                        </select> 
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section id="labtestSec" style="display: none">
                            <div class="row">
                                 <div class="cel-gap col-xs-12">Tests</div>
                                <div class="cel-gap col-xs-6">
                                    <input name="bloodtest" id="bloodtest" type="checkbox" onchange="makeTestVal(this.value, 'bloodtest');" value="bloodtest" />
                                    <span>Blood Test</span>
                                </div>
                                <div class="cel-gap col-xs-6">
                                    <input name="lipids" id="lipids" type="checkbox" onchange="makeTestVal(this.value, 'lipids');" value="lipids" />
                                    <span>Lipids</span>
                                </div>
                                <div class="cel-gap col-xs-6">
                                    <input name="electrolytestest" id="electrolytestest" type="checkbox" onchange="makeTestVal(this.value, 'electrolytestest');" value="electrolytestest" />
                                    <span>Electrolytes Test</span>
                                </div>
                                <div class="cel-gap col-xs-6">
                                    <input name="renalfunction" id="renalfunction" type="checkbox" onchange="makeTestVal(this.value, 'renalfunction');" value="renalfunction" />
                                    <span>Renal Function</span>
                                </div>
                                <div class="cel-gap col-xs-6">
                                    <input name="fbs" id="fbs" type="checkbox" onchange="makeTestVal(this.value, 'fbs');" value="fbs" />
                                    <span>FBS</span>
                                </div>
                                <div class="cel-gap col-xs-6">
                                    <input name="ultrasound" id="ultrasound" type="checkbox" onchange="makeTestVal(this.value, 'ultrasound');" value="ultrasound" />
                                    <span>Ultrasound</span>
                                </div>
                            </div>
                        </section>

                    <input type="hidden" class="delAllval" name="patType" id="patType" value="staffSection" >
                    <input type="hidden" class="delAllval" name="patCat" id="patCat" value="" >
                    <input type="hidden" class="delAllvalInt" name="staff_id" id="staff_id" value="0" >
                    <input type="hidden" class="delAllval refreshVal" class="delAllval" name="department_id" id="department_id" value="0" >
                    <input type="hidden" class="delAllval refreshVal" class="delAllval" name="departmentname" id="departmentname" value="" >
                    <input type="hidden" class="delAllval refreshVal" name="icno" id="icno" value="" >
                    <input type="hidden" class="delAllval refreshVal" name="pname" id="pname" value="" >
                    <input type="hidden" class="delAllvalInt" name="isnew" id="isnew" value="0" >
                    
                    <input type="hidden" class="delAllval delAllvalInt" name="bloodtestchk" id="bloodtestchk" value="0" >
                    <input type="hidden" class="delAllval delAllvalInt" name="lipidschk" id="lipidschk" value="0" >
                    <input type="hidden" class="delAllval delAllvalInt" name="electrolytestestchk" id="electrolytestestchk" value="0" >
                    <input type="hidden" class="delAllval delAllvalInt" name="renalfunctionchk" id="renalfunctionchk" value="0" >
                    <input type="hidden" class="delAllval delAllvalInt" name="fbschk" id="fbschk" value="0" >
                    <input type="hidden" class="delAllval delAllvalInt" name="ultrasoundchk" id="ultrasoundchk" value="0" >
                    
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
                <button type="button" class="close" onclick="closeTokenMoDal();" >
                    <span aria-hidden="true">x</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" id="modalDiv"> 
                <div id="printThis">
                    <fieldset>
                        <section>
                            <div class="row" id="regResults" style="display: block">
                                <p style="text-align-last: end"><button id="btnPrint">Print this page</button></p>
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
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="closeTokenMoDal();" >Close</button>
            </div>
        </div>
    </div>
</div>



<!---------------------->
<style>
    .cel-gap  {
      padding:0 15px;
      box-sizing: border-box;  
    }
    .dropdown-wrap {
      width: 100%; 
      height: 32px;
      line-height: 32px;
      padding: 5px;
      box-sizing: border-box;  
    }
    .input-wrap {
      width: 100%; 
      height: 32px;
      line-height: 32px;
      padding: 5px 10px;
      box-sizing: border-box;  
    }
    .btn-submit {
        padding: 6px 12px;
    }
    @media screen {
        #printSection {
            display: none;
        }
    }

    @media print {
        body * {
            visibility:hidden;
        }
        #printSection, #printSection * {
            visibility:visible;
        }
        #printSection {
            position:absolute;
            left:0;
            top:0;
        }
    }
</style>

<script>
    document.getElementById("btnPrint").onclick = function () {
        printElement(document.getElementById("printThis"));
    }
    function printElement(elem) {
        var domClone = elem.cloneNode(true);
        var $printSection = document.getElementById("printSection");
        if (!$printSection) {
            var $printSection = document.createElement("div");
            $printSection.id = "printSection";
            document.body.appendChild($printSection);
        }
        $printSection.innerHTML = "";
        $printSection.appendChild(domClone);
        window.print();
    }
    
    function makeTestVal(dtval, dtid){
        if($('#' + dtid).is(":checked")){
            $("#" + dtid + "chk").val(1);
        }else {
            $("#" + dtid + "chk").val(0);
        }
    }
    
    function getLabTestData(dt){
        if(dt != 4){
            $('#labtestSec').css('display', 'none');
            
            $("#bloodtestchk").val(0);
            $("#lipidschk").val(0);
            $("#electrolytestestchk").val(0);
            $("#renalfunctionchk").val(0);
            $("#fbschk").val(0);
            $("#ultrasoundchk").val(0);
            
            $("#bloodtest").prop("checked", false);
            $("#lipids").prop("checked", false);
            $("#electrolytestest").prop("checked", false);
            $("#renalfunction").prop("checked", false);
            $("#fbs").prop("checked", false);
            $("#ultrasound").prop("checked", false);
        } else {
            $('#labtestSec').css('display', 'block');
        }
    }
    
   
    function myPrintFunction() {
        //window.print();
        $("#modalDiv").printThis({
            debug: false,
            importCSS: true,
            importStyle: true,
            printContainer: true,
            loadCSS: "../css/style.css",
            pageTitle: "My Modal",
            removeInline: true,
            printDelay: 333,
            header: null,
            formValues: true
        });
    }

    function openAddPatientModal(dt) {
        $('#transModel').modal('show');
        $('#patCat').val(dt);
    }
    
    function closeTokenMoDal(){
        location.reload();
    }
    
    //  bloodtestchk lipidschk electrolytestestchk renalfunctionchk fbschk ultrasoundchk
    function closemoDal() {
        $("#category").val('');
        $("#searchcat").val('');
        $("#search").val('');
        $("#regResult").html('');
        $("#pnamedt").val('');
        $("#icnodt").val('');
        $("#sympthom").val('');
        $("#department").val('');
        $('.delAllval').val('');
        $('.delAllvalInt').val(0);
        $('.delvalcat').val('staffSection');
        $('.delvalcat1').val('sid');
        $('.delvalcat2').val('ic');
        $('.delDeptval').val('1');
        $("#isnew").val('');
        
        $("#bloodtestchk").val(0);
        $("#lipidschk").val(0);
        $("#electrolytestestchk").val(0);
        $("#renalfunctionchk").val(0);
        $("#fbschk").val(0);
        $("#ultrasoundchk").val(0);
        
        $('#transModel').modal('hide');
        //$('#transModelToken').modal('hide');
        $('.saveQueAlert').html('');
        $('.saveQueAlert').css('display', 'none');
        $('.searchQueryAlert').html('');
        $('.searchQueryAlert').css('display', 'none');
    }

    function submitPatientRegistrationForm() {
        var patType = $("#patType").val();
        var cat = $("#patCat").val();
        var staff_id = $("#staff_id").val();
        var dept_id = $("#department_id").val();
        var dept = $("#departmentname").val();
        var ic_number = $("#icno").val();
        var name = $("#pname").val();
        var isnew = $("#isnew").val();
        var queueno = $("#queueno").val();
        var symptopms = $("#sympthom").val();
        var department_id = $("#department").val();
        
        var bloodtestchk = $("#bloodtestchk").val();
        var lipidschk = $("#lipidschk").val();
        var electrolytestestchk = $("#electrolytestestchk").val();
        var renalfunctionchk = $("#renalfunctionchk").val();
        var fbschk = $("#fbschk").val();
        var ultrasoundchk = $("#ultrasoundchk").val();
        
        $("#bloodtestchk").val(0);
        $("#lipidschk").val(0);
        $("#electrolytestestchk").val(0);
        $("#renalfunctionchk").val(0);
        $("#fbschk").val(0);
        $("#ultrasoundchk").val(0);
        
        var triger = 1;

        if (ic_number == '') {
            triger = 0;
        }
        if (triger) {
            if (name == '') {
                triger = 0;
            }
        }

        if (triger) {
            if (queueno == '') {
                triger = 0;
            }
        }

        if (triger) {
            if (symptopms == '') {
                triger = 0;
            }
        }

        if (triger) {
            if (department_id == '') {
                triger = 0;
            }
        }

        if (triger) {
            $('.saveQueAlert').css('display', 'none');
            url = "{!! URL::to('saveNewPatient') !!}";
            $.ajax({
                url: url,
                async: false,
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", type: patType, cat: cat, staff_id: staff_id, dept_id: dept_id, ic_number: ic_number, name: name, queueno: queueno, symptopms: symptopms, dept: dept, department_id: department_id, bloodtestchk: bloodtestchk, lipidschk: lipidschk, electrolytestestchk: electrolytestestchk, renalfunctionchk: renalfunctionchk, fbschk: fbschk, ultrasoundchk: ultrasoundchk},
            }).done(function (response) {
                if (response != 0) {
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

                    $("#bloodtestchk").val(0);
                    $("#lipidschk").val(0);
                    $("#electrolytestestchk").val(0);
                    $("#renalfunctionchk").val(0);
                    $("#fbschk").val(0);
                    $("#ultrasoundchk").val(0);
        
                    $('.delAllval').val('');
                    $('.delAllvalInt').val(0);
                    $('.delvalcat').val('staffSection');
                    $('.delvalcat1').val('sid');
                    $('.delvalcat2').val('ic');
                    $('.delDeptval').val('1');
                    $("#isnew").val('');
                }
            });
        } else {
            $('.saveQueAlert').html('Alert : Please Fill All Fields or Check your all data is correct.');
            $('.saveQueAlert').css('display', 'block');
        }
    }

    function getValuename(dt) {
        $("#pname").val(dt);
    }

    function getValueicno(dt) {
        $("#icno").val(dt);
    }

    function addNewPatient() {
        $('#newPatient').css('display', 'block');
        $('#regResult').css('display', 'none');
        $('.modalSearcSec').css('display', 'none');
        $("#isnew").val(1);
    }


    function getCategorySearch(dt) {
        $('#regResult').css('display', 'none');
        $('#newPatient').css('display', 'none');
        $('.modalSearcSec').css('display', 'none');
        $('.' + dt).css('display', 'block');
        $('#searchcat option:first').prop('selected', true);
        $("#search").val("");
        $("#patType").val(dt);
        $('.refreshVal').val('');
        $('.delAllvalInt').val(0);
        $("#isnew").val(0);
    }

    function getSearcResult(dtype) {
        var pttype = $("#patType").val();
        var scat = $(".searchcat" + pttype).val();
        var sdt = $(".search" + pttype).val();
        var stype = $("#patType").val();
        $("#isnew").val(0);
        
        var searchTrig = true;
        if(sdt == ''){
            $('.searchQueryAlert').html('Please Give Your Search Parameter.');
            $('.searchQueryAlert').css('display', 'block');
            searchTrig = false;
        }
        
        if(searchTrig){
            //##################################################################
            url = "{!! URL::to('getAddPatientResult') !!}";
            $.ajax({
                url: url,
                async: false,
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", scat: scat, sdt: sdt, stype: stype},
            }).done(function (responsedt) {
                if(responsedt != 0){
                    $('.searchQueryAlert').html('');
                    $('.searchQueryAlert').css('display', 'none');
                    $('#regResult').css('display', 'block');
                    $('#regResult').html(responsedt);
                } else {
                    $('#regResult').html('');
                    $('#regResult').css('display', 'none');
                    $('.refreshVal').val('');
                    $('.delAllvalInt').val(0);
                    $('.searchQueryAlert').html('Alert : Your search criteria not matched. Try again !.');
                    $('.searchQueryAlert').css('display', 'block');
                }
                
            });
            //##################################################################
            url = "{!! URL::to('getAddPatientResultdata') !!}";
            $.ajax({
                url: url,
                async: false,
                type: 'POST',
                data: {_token: "{{ csrf_token() }}", scat: scat, sdt: sdt, stype: stype},
            }).done(function (response) {
                if (response != 0) {
                    if (response != 1) {
                        $("#staff_id").val(response['staffid']);
                        if(dtype != 'staff'){
                            $("#icno").val(response['ic']);
                            $("#pname").val(response['name']);
                        }
                        $("#department_id").val(response['departmentid']);
                        $("#departmentname").val(response['department']);
                    }
                }    
            });
            //##################################################################
        }
    }

</script>    
<!-- ##################################  Out Patient Start   ################################################# -->


<!-- ##################################  TY2 Patient Start   ################################################# -->
<script>
    // AJAX call for autocomplete 
    function getCompanyList(){
        var cname = $('#companyname').val()
        url = "{!! URL::to('getExistingCompany') !!}";
        $.ajax({
            type: "POST",
            url: url,
            async: false,
            data: {_token: "{{ csrf_token() }}", cname: cname},
            beforeSend: function () {
                $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function (data) {
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background", "#FFF");
            }
        });
    }
    //To select country name
    function selectCountry(val) {
        $("#companyname").val(val);
        $("#suggesstion-box").hide();
        
    }
    
    function addMoreEmp(){
        var newTr = '<tr class="removeaddedtr">'+
                        '<td><div class="input"><input type="text" class="delAllTY2val" name="name[]" id="name" value=""></div></td>'+
                        '<td width="75"><div class="input"><select name="sex[]" id="name" class="delAllTY2val dropdown-wrap" ><option value="Male">Male</option><option value="Female">Female</option></select></div></td>'+
                        '<td><div class="input"><input type="text" class="delAllTY2val" name="icno[]" id="name" value=""></div></td>'+
                        '<td onclick="deleteCurTr(this)" align="center">X</td>'+
                    '</tr>';
        $('.newEmpDt').append(newTr);
    }

    function deleteCurTr(dt){
        $(dt).parent('tr').remove();
    }
    
    function closeTY2moDal() {
        $('.removeaddedtr').remove();
        $('#ty2Model').modal('hide');

    }

    function openAddTy2Modal() {
        $('#ty2Model').modal('show');
        $('.savety2QueAlert').html('');
        $('.savety2QueAlert').css('display', 'none');
    }
    
    function submitTY2RegistrationForm(){
        $('.savety2QueAlert').html('');
        $('.savety2QueAlert').css('display', 'none');
        var trig = false;
        var slCount = 0;
        $('.delAllTY2val').each(function(){
            if (this.value == ''){
                //trig = true;
                return false;
            } else {
                slCount = slCount + 1;
                //trig = false;
            }    
        });
        if(slCount > 0){ trig = false; } else { trig = true; }
        if(trig){
            $('.savety2QueAlert').html('Alert : Please Fill All Fields or Check your all data is correct.');
            $('.savety2QueAlert').css('display', 'block');
        } else {
            $('#ty2-form').submit();
        }
    }
    
    
</script>  

<style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;z-index: 999;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<div class="modal fade" id="ty2Model" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeTY2moDal();">
                    <span aria-hidden="true">x</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">TY2</h4>
            </div>
            <div class="modal-body">
                <form id="ty2-form" class="smart-form" action="{{ action('HomeController@savenewty2') }}" method="post" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                    <fieldset>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Company : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" onkeyup="getCompanyList(this);" class="delAllTY2val" name="companyname" id="companyname" value="">
                                        <div id="suggesstion-box"></div>
                                    </label>
                                </div>
                            </div>

                            <div class="row" style=" margin-top: 10px">
                                <label class="label col col-3">Address Line 1 : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" class="delAllTY2val" name="addr1" id="addr1" value="">
                                        <div id="suggesstion-box"></div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row" style=" margin-top: 10px">
                                <label class="label col col-3">Address Line 2 : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" class="delAllTY2val" name="addr2" id="addr2" value="">
                                        <div id="suggesstion-box"></div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row" style=" margin-top: 10px">
                                <label class="label col col-3">Address Line 3 : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" class="delAllTY2val" name="addr3" id="addr3" value="">
                                        <div id="suggesstion-box"></div>
                                    </label>
                                </div>
                            </div>
                            
                        </section>
                        <section>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Sex</th>
                                        <th>IC Number/Passport</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="newEmpDt">
                                  <tr>
                                      <td><div class="input"><input type="text" class="delAllTY2val" name="name[]" id="name" value=""></div></td>
                                      <td width="75">
                                          <div class="input">
                                                <select name="sex[]" id="name" class="delAllTY2val dropdown-wrap" >
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select> 
                                          </div>
                                      </td>
                                      <td><div class="input"><input type="text" class="delAllTY2val" name="icno[]" id="name" value=""></div></td>
                                      <td align="center"></td>
                                  </tr>
                                </tbody>
                            </table>
                            <div style="height: 10px; width: 100%;"></div>
                            <div class="col-12 pull-right"><button style="padding: 6px 12px;" type="button" class="btn btn-default" onclick="addMoreEmp();">Add More</button></div>
                            <div style="height: 20px; width: 100%;"></div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Queue Number : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" class="delAllTY2val" name="ty2queueno" id="ty2queueno" value="">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <?php /* ?> 
                        <section>
                            <div class="row">
                                <label class="label col col-3">Queue Number : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" class="delAllTY2val" name="queueno" id="queueno" value="">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Sympthoms : </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <input type="text" class="delAllTY2val" name="sympthom" id="sympthom" value="">
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <label class="label col col-3">Department: </label>
                                <div class="col col-9">
                                    <label class="input">
                                        <select class="searchcat searchcatdependentSection delAllTY2val" name="department" id="department" style="width: 100%;line-height: 32px;height: 32px;" >
                                            @foreach($department as $d)
                                            <option value="{{$d->id}}" >{{$d->name}}</option>
                                            @endforeach
                                        </select> 
                                    </label>
                                </div>
                            </div>
                        </section>
                        <?php */ ?>
                    </fieldset>
                    <input type="hidden" class="delAllval" name="patTypety2" id="patTypety2" value="ty2Section" >
                    <input type="hidden" class="delAllval" name="patCatty2" id="patCatty2" value="company" >
                </form>
                <fieldset>
                    <section>
                        <div class="row">
                            <label class="label col col-12 savety2QueAlert" style="color: red; font-weight: bold; display: none"></label>
                        </div>
                    </section>
                </fieldset>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="closeTY2moDal();" >Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitTY2RegistrationForm()" >Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ty2ModelToken" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">x</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="modalDiv"> 
                <div id="printThis">
                    <fieldset>
                        <section>
                            <div class="row" id="regResults" style="display: block">
                                <p style="text-align-last: end"><button id="btnPrint">Print this page</button></p>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ##################################  TY2 Patient End   ################################################# -->


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
