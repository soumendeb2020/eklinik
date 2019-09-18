@extends('layouts.app')
@section('title', 'Roles & Permissions')

@section('content')

<!--  <div id="main" role="main"> -->

<!-- <?php
//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
//$breadcrumbs["New Crumb"] => "http://url.com"
//$breadcrumbs["Tables"] = "";
//include("inc/ribbon.php");
?> -->

<!-- MAIN CONTENT -->
<!-- <div id="content"> -->

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-table fa-fw "></i>
            Queue List
        </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks" class="">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Reports</a></li>
			<li>Queue List</li>
        </ul>
    </div>
</div>

<!-- row -->
	<div class="row">
		
		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="well">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8"><h3 style="margin: 0 0 10px;">Report</h3></div>
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="smart-form">
							<label class="input"> <i class="icon-append fa fa-calendar"></i>
								<input type="text" name="startdate" id="queuelistdate" placeholder="16.9.2019">
							</label>
						</div>
					</div>
				</div>
				<hr class="simple">
			
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
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->

@endsection


