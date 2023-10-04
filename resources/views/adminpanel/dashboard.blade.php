<!DOCTYPE html>
<html lang="en">
	
	@include("adminpanel/includes/head")
	
	<body>
		
		<!--*******************
			Preloader start
		********************-->
		<div id="preloader">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
				</svg>
			</div>
		</div>
		<!--*******************
			Preloader end
		********************-->
		
		
		<!--**********************************
			Main wrapper start
		***********************************-->
		<div id="main-wrapper">
			
			<!--**********************************
				Nav header start
			***********************************-->
			<div class="nav-header">
				<div class="brand-logo">
					<a href="">
						<b class="logo-abbr"><img src="{{ asset('adminpanel')}}/images/logo.png" alt=""> </b>
						<span class="logo-compact"><img src="{{ asset('adminpanel')}}/images/logo-compact.png" alt=""></span>
						<span class="brand-title">
							<img src="{{ asset('adminpanel')}}/images/logo-text.png" alt="">
						</span>
					</a>
				</div>
			</div>
			@include("adminpanel/includes/header")
			@include("adminpanel/includes/menu")
			
			
			<!--**********************************
				Content body start
			***********************************-->
			<div class="content-body">
				
			@php
$totaluser=App\Models\User::count();

$totalproducts=App\Models\products::count();
				@endphp
			
				<!--**********************************
					Content body end
				***********************************-->
				<div class="container-fluid mt-3">
					<div class="row">
						
						<div class="col-lg-3 col-sm-6">
							<div class="card gradient-5">
								<div class="card-body">
									<a href="{{route('products.index')}}">
										<h3 class="card-title text-white">Total Product</h3>
										<div class="d-inline-block">
										<h2 class="text-white">{{$totalproducts}}</h2>
											<p class="text-white mb-0">Manage Products</p>
										</div>
										<span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<!--**********************************
					Footer start
				***********************************-->
				@include("adminpanel/includes/footer")
				<!--**********************************
					Footer end
				***********************************-->
			</div>
			<!--**********************************
				Main wrapper end
			***********************************-->
			
			<!--**********************************
				Scripts
			***********************************-->
			<script src="{{ asset('adminpanel')}}/plugins/common/common.min.js"></script>
			<script src="{{ asset('adminpanel')}}/js/custom.min.js"></script>
			<script src="{{ asset('adminpanel')}}/js/settings.js"></script>
			<script src="{{ asset('adminpanel')}}/js/gleek.js"></script>
			<script src="{{ asset('adminpanel')}}/js/styleSwitcher.js"></script>
			
			<!-- Chartjs -->
			<script src="{{ asset('adminpanel')}}/plugins/chart.js/Chart.bundle.min.js"></script>
			<!-- Circle progress -->
			<script src="{{ asset('adminpanel')}}/plugins/circle-progress/circle-progress.min.js"></script>
			<!-- Datamap -->
			<script src="{{ asset('adminpanel')}}/plugins/d3v3/index.js"></script>
			<script src="{{ asset('adminpanel')}}/plugins/topojson/topojson.min.js"></script>
			<script src="{{ asset('adminpanel')}}/plugins/datamaps/datamaps.world.min.js"></script>
			<!-- Morrisjs -->
			<script src="{{ asset('adminpanel')}}/plugins/raphael/raphael.min.js"></script>
			<script src="{{ asset('adminpanel')}}/plugins/morris/morris.min.js"></script>
			<!-- Pignose Calender -->
			<script src="{{ asset('adminpanel')}}/plugins/moment/moment.min.js"></script>
			<script src="{{ asset('adminpanel')}}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
			<!-- ChartistJS -->
			<script src="{{ asset('adminpanel')}}/plugins/chartist/js/chartist.min.js"></script>
			<script src="{{ asset('adminpanel')}}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
			
			
			
			<script src="{{ asset('adminpanel')}}/js/dashboard/dashboard-1.js"></script>
			
		</body>
		
	</html>	