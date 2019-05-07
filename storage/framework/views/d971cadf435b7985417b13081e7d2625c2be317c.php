<?php $__env->startSection('content'); ?>
	<div id="content">

		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-table fa-fw "></i>
						Drug
					<span>>
						List
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
											<th data-hide="phone">ID</th>
											<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Drug Name</th>
											<th data-hide="phone"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i>Stock Number</th>
											<th>Supplier</th>
											<th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Contact No</th>
											<th data-hide="phone,tablet">No Instock(unit)</th>
											<th data-hide="phone,tablet"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i>Expire Date</th>
											<th data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Acriflavin 0.1% Lotion</td>
											<td>1-342-463-8341</td>
											<td>Et Rutrum Non Associates</td>
											<td>35728</td>
											<td>10 <button type="button" class="btn btn-danger ">Low</button></td>
											<td>03/04/14</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Albendazole 200 mg/5 ml Suspension</td>
											<td>1-516-859-1120</td>
											<td>Nam Ac Inc.</td>
											<td>7162</td>
											<td>20 <button type="button" class="btn btn-danger ">Low</button></td>
											<td>03/23/13</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>3</td>
											<td>Alcohol 70% Solution</td>
											<td>1-724-406-2487</td>
											<td>Enim Commodo Limited</td>
											<td>98611</td>
											<td>29</td>
											<td>02/13/14</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>4</td>
											<td>Benzyl Benzoate 25% Emulsion (Adult)</td>
											<td>1-412-485-9725</td>
											<td>Odio Etiam Institute</td>
											<td>10312</td>
											<td>58</td>
											<td>01/01/13</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>5</td>
											<td>Calamine Cream</td>
											<td>1-849-642-8777</td>
											<td>Neque Ltd</td>
											<td>29131</td>
											<td>23</td>
											<td>02/16/13</td>
											<td><button class="btn btn-success" onclick="e"><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>6</td>
											<td>Bromhexine HCl 8 mg Tablet</td>
											<td>1-470-329-9627</td>
											<td>Euismod In Ltd</td>
											<td>1883</td>
											<td>56</td>
											<td>03/15/13</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>7</td>
											<td>Chloramphenicol 5% w/v Ear Drops</td>
											<td>1-188-191-2346</td>
											<td>Molestie Industries</td>
											<td>2211BM</td>
											<td>77</td>
											<td>07/08/13</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>8</td>
											<td>Glyceryl Trinitrate 0.5 mg Tablet</td>
											<td>1-663-655-8904</td>
											<td>Est LLC</td>
											<td>75286</td>
											<td>23</td>
											<td>12/09/12</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>9</td>
											<td>Hydrocortisone 1% Cream</td>
											<td>1-598-234-7837</td>
											<td>Et Ultrices Posuere Institute</td>
											<td>2324</td>
											<td>45</td>
											<td>12/29/12</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>10</td>
											<td>Paracetamol 120 mg/5 ml Syrup*</td>
											<td>1-212-965-8381</td>
											<td>Vitae Erat Vel Company</td>
											<td>5898</td>
											<td>90</td>
											<td>10/07/13</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
										<tr>
											<td>11</td>
											<td>Paracetamol 500 mg Tablet</td>
											<td>1-541-654-9030</td>
											<td>Iaculis Incorporated</td>
											<td>6464JN</td>
											<td>30</td>
											<td>05/30/13</td>
											<td><button class="btn btn-success" onclick=""><i class="glyphicon glyphicon-plus"></i></button></td>
										</tr>
									
									
									</tbody>
								</table>

							</div>
							<!-- end widget content -->

						</div>
						<!-- end widget div -->

					</div>
					<!-- end widget -->
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

<?php $__env->stopSection(); ?>
	</div>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>