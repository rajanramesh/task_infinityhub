<!DOCTYPE html>
<html lang="en">
	
@include("adminpanel/includes/head")
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet" />


	
	
    
    

	
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
			
			      @include("adminpanel/includes/header")
	              
				  @include("adminpanel/includes/menu")
			
			
			<!--**********************************
				Content body start
			***********************************-->
			<div class="content-body">
				
				<div class="row page-titles mx-0">
					<div class="col p-md-0">
						
					</div>
				</div>
				<!-- row -->
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									@if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

				@if(session()->has('error'))
                    <div class="alert alert-error">
                        {{ session()->get('error') }}
                    </div>
                @endif
									
									<h4 class="card-title">View Products &nbsp;</h4>
									
									@php
									$i=1;
									
									@endphp
									
                           
									<a href="{{ route('products.create')}}" class="btn btn-update btn-sucess float-right btn-dark mb-2">Add Product</a>
                              
									
						<div class="">
											<table id="example" class="display" style="width:100%">
											
											<thead>
												<tr>
													<th>S.no</th>
													<th>Product Image</th>
													<th>Product Name</th>
												
												
													<th>Price</th>
												
													<th> Discount </th>
													
													<th>Dis Range </th>
													
													<th>Stock  </th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											@foreach($products as $products)
												<tr>
													<td>{{ $i++ }}</td>
													<td> 
														<div class="row">
														@foreach(explode(',', $products->product_images) as $images)
														
														<div class="col-md-2"  style="padding-left:2px;">
														<img src="{{url('/images/products/'.$images)}}" alt="" height="50" width="50">
														
													</div>
													  @endforeach
													</div>
													</td>
													@php

													$category=DB::table('category')->where('id',$products->category)->first();
													
																							  @endphp
														
													<td>{{ $products->product_name  }}
													<br>
													Category: {{$category->category_name}} </td>
												
													
													

													
													<td>{{$products->product_price}}</td>
													<td> {{$products->discount_amount}}</td>
													<td>{{ $products->discount_rangefrom}} to {{$products->discount_rangeto}}</td>
													
													<td>{{$products->stock}}</td>
													<td><a href="{{url('edit',$products->id)}}" class="edit-btn badge badge-primary px-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-pencil"></i> </a>
														<meta name="csrf-token" content="{{ csrf_token() }}">
													<a href="" class="delete-btn badge badge-primary px-2" data-toggle="tooltip" data-placement="top" data-original-title="Delete" data-id="{{ $products->id }}"><i class="fa fa-trash"></i>

													</a>
														
														</td>
												</tr>
											@endforeach	
											
										</table>
									</div>
									
									
							</div>
						</div>
					</div>
                    
					
					
				</div>
			</div>
            <!-- #/ container -->
		</div>
        <!--**********************************
            Content body end
		***********************************-->
        
        
        @include("adminpanel/includes/footer")
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
	
	<script src="{{ asset('adminpanel')}}/./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminpanel')}}/./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminpanel')}}/./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
	<script src="{{ asset('adminpanel')}}/js/sweetalert.min.js"></script>
	 @if(session()->get('success'))
   <script> swal("Success", "{{session()->get('success')}}", "success");</script>
    @endif
	    
	@if(session()->get('error'))
	<script> swal("error", "{{session()->get('error')}}", "error");</script>
	 @endif
		 
  
	  
	   
	
			<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
			<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
			 <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			
		 <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
		 <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
		
		  
		  
		 <script>
		$(document).ready(function() {
		  $('#example').DataTable( {
			  
		  } );
	  } );
			</script>
		  
		 

<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var id = $(this).data('id');
			var token = $("meta[name='csrf-token']").attr("content");
			//alert(id);

            if (confirm('Are you sure you want to delete this Product?')) {
                $.ajax({
                    url: "products/"+ id,
				//	alert(url);
                    type: 'DELETE',
					data: {

"id": id,

"_token": token,

}, 
//alert(data);
                    success: function(response) {
						alert(response.success);
						
						
						window.location = '{{ route('products.index') }}'


                    }

					
                   
                });
			}
        });
    });
</script>

   
    
   

	
</body>

</html>