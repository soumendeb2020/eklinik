@extends('layouts.app')	

@section('content')
<div id="content">

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-table fa-fw "></i>
                Patient <span> >  Listing </span>
            </h1>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        </div>
    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Patient Listing</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-hide="phone">Queue Num</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> IC No</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Patient Name</th>
                                        <th data-hide="phone"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Visit Date/Time</th>
                                        <th>Sympthom</th>
                                        <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Status</th>
                                        <th data-hide="phone,tablet">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($patientList))
                                        @foreach ($patientList as $p)
                                            <tr class="datatr alldept dept{{$p['pqueue']->department_id}}">
                                                <td>{{$p['pqueue']->token_no}}</td>
                                                <td>{{$p['pqueue']->ic_number}}</td>
                                                <td>{{$p['pqueue']->name}}</td>
                                                <td>{{$p['pqueue']->created_at}}</td>
                                                <td>{{$p['pqueue']->symptopms}}</td>
                                                <td><span type="button" class=" center-block btn btn-success btn-lg padding-5 ">{{ $p['pqueue']->is_active == 1 ? 'Waiting' : 'Serving' }}</span></td>
                                                <td>
                                                    <button class="btn btn-info" onclick=""><i class="glyphicon glyphicon-edit"></i>Profile</button>
                                                    <!--<button class="btn btn-danger" data-toggle="modal" data-target="#labForm" onclick=""><i class="glyphicon glyphicon-tint"></i></button>-->
                                                    <a href="{{ URL::to('labpatientprofile/'.Crypt::encrypt($p['pqueue']->id)) }}"><button class="btn btn-default"  onclick=""><i class="glyphicon glyphicon-bell"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">No Patient Exist In This Room</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
        </div>
        <!-- end widget content -->
</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<!--Modal -->
<div class="modal fade" id="labForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Lab Test Result</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form">


                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inputName">Blood Test</label>
                            <textarea type="text" class="form-control" id="inputName" placeholder="Describe symptoms of patient "> </textarea></div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inputName">Urine Test</label>
                            <textarea type="text" class="form-control" id="inputName" placeholder="Your patient was diagnose with.."> </textarea>
                        </div>

                    </div>


                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inputName">Weight</label>
                            <textarea type="text" class="form-control" id="inputName" placeholder="Your patient was diagnose with.."> </textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inputName">Blood Pressure</label>
                            <textarea type="text" class="form-control" id="inputName" placeholder="Your patient was diagnose with.."> </textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="inputName">Others</label>
                            <textarea type="text" class="form-control" id="inputName" placeholder="Your patient was diagnose with.."> </textarea>
                        </div>

                    </div>
                    <div class="clearfix"></div>




                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Completed</button>
            </div>
        </div>
    </div>
</div>
@endsection