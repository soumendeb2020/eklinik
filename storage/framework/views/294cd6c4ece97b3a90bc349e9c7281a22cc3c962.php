	

<?php $__env->startSection('content'); ?>
	<div id="content">

		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-table fa-fw "></i>
						Table
					<span>>
						Data Tables
					</span>
				</h1>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
				<!--<ul id="sparks" class="">
					<li class="sparks-info">
						<h5> My Income <span class="txt-color-blue">$47,171</span></h5>
						<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
							1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
						</div>
					</li>
					<li class="sparks-info">
						<h5> Site Traffic <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
						<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
					<li class="sparks-info">
						<h5> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
						<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
				</ul>-->
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
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"

						-->
						<header>
							<span class="widget-icon"> <i class="fa fa-table"></i> </span>
							<h2>Standard Data Tables </h2>

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
											<th data-hide="phone">Queue No</th>
											
											<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Company Name</th>
											<th data-hide="phone"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Visit Date/Time</th>
											<th>Injection</th>
											<th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Status</th>
											<th data-hide="phone,tablet">Action</th>
					
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>3001</td>
											
											<td>Joyah bt Mat</td>
											<td>26-11-2018</td>
											<td>4</td>
											<td width="10px"><span  type="button" class=" center-block btn btn-success btn-lg padding-5 ">Ongoing</span></td>
											
												<td>
									<button class="btn btn-danger" onclick="'"><i class="glyphicon glyphicon-tint"></i>Lab Test</button>
									
					
									<button class="btn btn-default"  onclick=""><i class="glyphicon glyphicon-bell"></i></button></td>
										</tr>
											<tr>
											<td>3002</td>
											
											<td>Reza b Mat</td>
											<td>29-11-2018</td>
											<td>5</td>
											<td width="10px"><span type="button" class="center-block btn btn-warning btn-lg padding-5">Waiting</span></td>
											
												<td>
									<button class="btn btn-danger" onclick=""><i class="glyphicon glyphicon-tint"></i>Lab Test</button>
									
									
									<button class="btn btn-default"  onclick=""><i class="glyphicon glyphicon-bell"></i></button></td>
										</tr>
									
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
						<!-- end widget div -->

					</div>
					<!-- end widget -->

				</article>
				<!-- WIDGET END -->

			</div>

			<!-- end row -->

			<!-- end row -->

		</section>
		<!-- end widget grid -->


	</div>
	<!-- END MAIN CONTENT -->

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>