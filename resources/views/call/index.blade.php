@extends('layouts.app')
@section('title', 'Roles & Permissions')

@section('content')


<!-- MAIN CONTENT -->
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-pencil-square-o fa-fw "></i>
            Call
        </h1>
    </div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">
    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-sm-12 col-md-12 col-lg-6">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" data-widget-colorbutton="false"	data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                <header role="heading">
                    <h2>New Call</h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body">
                        <form id="callSubmit">
                            <fieldset>
                                <input name="authenticity_token" type="hidden">
                                <div class="form-group">
                                    <label>User</label>
                                    <select onchange="removeError('calluser', 'callUserErr')" class="form-control" id="calluser" name="calluser">
                                        <option value="" >Select User</option>
                                        <option value="Admin" >Admin</option>
                                        <option value="Stuff1" >Stuff1</option>
                                    </select>
                                    <span id="callUserErr" style="color: red; display: none">This field is required.</span>
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select onchange="removeError('calldepartment', 'calldepartmentErr')" class="form-control" id="calldepartment" name="calldepartment">
                                        <option value="" >Select Department</option>
                                        <option value="Consultation" >Consultation</option>
                                        <option value="Dispensary" >Dispensary</option>
                                        <option value="TY2" >TY2</option>
                                        <option value="Lab" >Lab</option>
                                    </select>
                                    <span id="calldepartmentErr" style="color: red; display: none">This field is required.</span>
                                </div>
                                <div class="form-group">
                                    <label>Counter</label>
                                    <select onchange="removeError('callcounter', 'callCounterErr')" class="form-control" id="callcounter" name="callcounter">
                                        <option value="" >Select Counter</option>
                                        <option value="Counter 1" >Counter 1</option>
                                        <option value="Counter 2" >Counter 2</option>
                                        <option value="Counter 3" >Counter 3</option>
                                        <option value="Counter 4" >Counter 4</option>
                                    </select>
                                    <span id="callCounterErr" style="color: red; display: none">This field is required.</span>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <div onclick="callNext();" class="btn btn-primary btn-lg">
                                    Call Next
                                    <i class="fa fa-long-arrow-right"></i>
                                </div>
                            </div>
                        </form> 
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" data-widget-colorbutton="false"	data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                <header role="heading">
                    <h2>Click one department to Issue Token</h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body">
                        <div class="btn btn-primary">Consultation</div>	
                        <div class="btn btn-primary">Dispensary</div>
                        <div class="btn btn-primary">TY2</div>
                        <div class="btn btn-primary">Lab</div>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </article>
        <!-- WIDGET END -->
        <!-- NEW WIDGET START -->
        <article class="col-sm-12 col-md-12 col-lg-6">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" data-widget-colorbutton="false"	data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
                <header>
                    <h2>Todays Queue</h2>
                </header>
                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Number</th>
                                    <th>Called</th>
                                    <th>Counter</th>
                                    <th>Recall</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </article>
        <!-- WIDGET END -->
    </div>
    <!-- end row -->
</section>
<!-- end widget grid -->
<script>
    function removeError(fid, errid){
        var dtValue = $('#' + fid).val();
        if(dtValue != ''){ $('#' + errid).css('display', 'none'); } else { $('#' + errid).css('display', 'block'); }
    }
    
    function callNext(){
        var trig = 1;
        //  ##########################################
        var calluser = $('#calluser').val();
        var calldepartment = $('#calldepartment').val();
        var callcounter = $('#callcounter').val();
        //  ##########################################
        if(calluser == ''){ $('#callUserErr').css('display', 'block'); } else { $('#callUserErr').css('display', 'none'); }
        if(calldepartment == ''){ $('#calldepartmentErr').css('display', 'block'); } else { $('#calldepartmentErr').css('display', 'none'); }
        if(callcounter == ''){ $('#callCounterErr').css('display', 'block'); } else { $('#callCounterErr').css('display', 'none'); }
        //  ##########################################
        if(calluser == ''){ trig = 0; }
        if(trig){ if(calldepartment == ''){ trig = 0; } }
        if(trig){ if(callcounter == ''){ trig = 0; } }
        //  ##########################################
        if(trig){ $("#callSubmit").submit(); }    
    }
</script>

@endsection


