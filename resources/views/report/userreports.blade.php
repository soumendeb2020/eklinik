@extends('layouts.app')
@section('title', 'Roles & Permissions')

@section('content')


<!-- MAIN CONTENT -->

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-table fa-fw "></i>
            User Report
        </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        <ul id="sparks" class="">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Reports</a></li>
			<li>User Report</li>
        </ul>
    </div>
</div>

<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-12">
		
			<div class="well">
				<form role="form" >
					<div class="row">
						<div class="smart-form">
							<div class="col col-6">
								<label>User</label>
								<select class="form-control" id="calluser" name="calluser">
									<option value="" >Select User</option>
									<option value="Admin" >Admin</option>
									<option value="Stuff1" >Stuff1</option>
								</select>
							</div>
							<div class="col col-5">
								<label>Date</label>
								<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="startdate" id="startdate" placeholder="Date">
								</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary" style="margin-top: 17px; padding: 6px 30px;">GO</button>
						
					</div>
				</form>
							
			</div>
						
		</article>
		<!-- WIDGET END -->
		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="well">
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


