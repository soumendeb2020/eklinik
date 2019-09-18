@extends('layouts.app')
@section('title', 'Roles & Permissions')

@section('content')

<!-- MAIN CONTENT -->

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-table fa-fw "></i>
            Settings
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
		<article class="col-sm-12 col-md-12 col-lg-6">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" data-widget-colorbutton="false"	data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
				
				<header role="heading">
					<h2>Account</h2>
				</header>

				<!-- widget div-->
				<div>
					<!-- widget content -->
					<div class="widget-body">
					
						<form>
							<fieldset>
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" placeholder="Admin" type="text">
								</div>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" placeholder="admin" type="text">
								</div>
								<div class="form-group">
									<label>Role</label>
									<span class="form-control">Administrator</span>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" id="exampleInputEmail2" placeholder="your_email@rxample.com">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" placeholder="Password" type="password">
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" class="form-control" id="exampleInputPassword" placeholder="Confirm Password">
								</div>
							</fieldset>
							<div class="form-actions">
								<div class="btn btn-primary btn-lg">
									<i class="fa fa-pencil-square-o"></i>
									Update
								</div>
							</div>
						</form>

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
					<h2>Company Settings</h2>
				</header>

				<!-- widget div-->
				<div>
					<!-- widget content -->
					<div class="widget-body">

						<form>
							<fieldset>
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" placeholder="MBPJ Clinic" type="text">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" placeholder="clinic_mbpj@mbpj.gov.my">
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea class="form-control" placeholder="Address" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input class="form-control" placeholder="Phone" type="text">
								</div>
								<div class="form-group">
									<label>Location</label>
									<input class="form-control" placeholder="Location" type="text">
								</div>
							</fieldset>
							<div class="form-actions">
								<div class="btn btn-primary btn-lg">
									<i class="fa fa-pencil-square-o"></i>
									Update
								</div>
							</div>
						</form>

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
	
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-6">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" data-widget-colorbutton="false"	data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
				
				<header role="heading">
					<h2>Set Missed And Overtime</h2>
				</header>

				<!-- widget div-->
				<div>
					<!-- widget content -->
					<div class="widget-body">
					
						<form>
							<fieldset>
								<div class="form-group">
									<label>Overtime (In Seconds)</label>
									<input class="form-control" placeholder="20" type="text">
								</div>
								<div class="form-group">
									<label>Missed Time (In Seconds)</label>
									<input class="form-control" placeholder="20" type="text">
								</div>
							</fieldset>
							<div class="form-actions">
								<div class="btn btn-primary btn-lg">
									<i class="fa fa-pencil-square-o"></i>
									Update
								</div>
							</div>
						</form>

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
					<h2>Change Default Language</h2>
				</header>

				<!-- widget div-->
				<div>
					<!-- widget content -->
					<div class="widget-body">

						<form>
							<fieldset>
								<label>Select Language</label>
								<select class="form-control" id="select-1">
											<option>English</option>
											<option>Türk</option>
											<option>Deutsch</option>
											<option>Español</option>
											<option>français</option>
											<option>हिन्दी</option>
											<option>Italiano</option>
											<option>português</option>
											<option>русский</option>
											<option>العربية</option>
											<option>slovenský</option>
											<option>ไทย</option>
											<option>Indonesia</option>
										</select>
							</fieldset>
							<div class="form-actions">
								<div class="btn btn-primary btn-lg">
									<i class="fa fa-pencil-square-o"></i>
									Update
								</div>
							</div>
						</form>

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

@endsection


