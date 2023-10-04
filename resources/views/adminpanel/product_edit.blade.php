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
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
          
            <form id="edit-form" action="{{ route('products.update', $products->id) }}" method="post">
                @csrf
                @method('PUT')
                                                    
               
                <div class="row">
                   
                     
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
  
                                <div class="basic-form">
                                <div class="row">
                                  
                                  	<div class="col-md-4">
                                
                                    <label>Product Name</label>
								    
									<div class="form-group">
										<input type="text" name="product_name" id="pname" class="form-control input-rounded" value="{{$products->product_name}}"  required>
                                        @error('product_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
									</div>
                                </div>
                              
								@php
                                $category=DB::table('category')->get();
                                @endphp
                                   
                                      <div class="col-md-4">
                                      <label>Product category</label>
                                        <div class="form-group">

                                            <select id="category" class="form-control auto-select select2 input-rounded" data-selected="{{ $products->category }}" name="category">
                                                @foreach($category as $category)
                                                <option value="{{$category->id}}" {{@$products->category==$category->id ?"selected='selected'":''}}>{{$category->category_name}}</option>
                                                  
                                              
                                                @endforeach
                                            </select>

                                          

                                            
                                           
                                        </div>
                                      </div>
                                      @php
                                $unittype=DB::table('unittype')->get();
                                @endphp
                                      <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Unit Type</label>

                                        <select id="unit_type" class="form-control auto-select select2 input-rounded" data-selected="{{ $products->unit_type }}" name="unit_type">
                                            @foreach($unittype as $unittype)
                                            <option value="{{$unittype->name}}" {{@$products->unit_type==$unittype->name ?"selected='selected'":''}}>{{$unittype->name}}</option>
                                              
                                          
                                            @endforeach
                                        </select>
                                       
                                      </div>
                                    @error('unit_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                    <label>Price</label>
								    
                                    <div class="form-group">
                                        <input type="text" name="product_price" id="product_price" class="form-control input-rounded" value="{{$products->product_price}}"  required>
                                    </div>
                                    @error('product_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label>Discount(%)</label>
                                          
                                    <div class="form-group">
                                        <input type="text" name="discount_pre" id="discount_presentage" onblur="Sum();" class="form-control input-rounded" value="{{ $products->discount_pre }}" >
                                    </div> 
                                @error('discount_pre')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                             </div>
                                    <div class="col-md-4">
                                    <label>Discount Amount</label>
                                          
                                    <div class="form-group">
                                        <input type="text" name="discount_amount" readonly id="discount_amount" class="form-control input-rounded" value="{{$products->discount_amount}}" >
                                    </div>
                                    @error('discount_amount')
                                    <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>

                                </div>
                                      
									
                                    
                         
                              <div class="form-group row"  >
										
										
                                <div class="col-md-6">
                                    <div class="from-group">
                                <label class="">Discount Range  From</label>
                                     <input id="example" type="date" name="discount_rangefrom" value="{{$products->discount_rangefrom }}" class="form-control input-rounded" placeholder="dd/mm/yy"  />
                                     </div>
                                     @error('discount_rangefrom')
                                     <span class="text-danger">{{$message}}</span>
                                         @enderror
                                </div>
                                     <div class="col-md-6">
                                        <div class="from-group">
                                <label class="">Discount Range  To </label>
                                <input id="example" type="date" name="discount_rangeto" class="form-control input-rounded" value="{{$products->discount_rangeto }}" placeholder="dd/mm/yy"  />
                                        </div>  @error('discount_rangeto')
                                        <span class="text-danger">{{$message}}</span>
                                            @enderror </div>
                                    
                                </div>
									
                                       
                                <div class="row">
                                    <div class="col-md-4">
                                    <label>Tax (%) </label>
								    
                                    <div class="form-group">
                                        <input type="text" name="tax" id="tax" onblur="TaxSum();" class="form-control input-rounded" value="{{$products->tax}}" >
                                    </div>
                                    @error('tax')
                                    <span class="text-danger">{{$message}}</span>
                                        @enderror
                                   
                                </div>
                                <div class="col-md-4">
                                    <label>Tax Amount </label>
								    
                                    <div class="form-group">
                                        <input type="text" readonly name="tax_amount" id="tax_amount" class="form-control input-rounded" value="{{$products->tax_amount}}" >
                                    </div>
                                    @error('taxt_amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Stock </label>
								    
                                    <div class="form-group">
                                        <input type="text" name="stock" id="stock" class="form-control input-rounded" value="{{$products->stock}}" >
                                    </div>
                                    @error('stock')
                                    <span class='text-danger'> {{$message}} </span>
                                        
                                    @enderror
                                </div>
                               
                            </div>


                            <meta name="csrf-token" content="{{ csrf_token() }}">
                           
                            <button type="submit" name="submit" data-id="{{ $products->id }}" value="update" class="btn btn-update btn-dark mb-2">Update Product</button>
                                            
                    </div>
			
                </div>
               
        
               
            </form>
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
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('adminpanel')}}/plugins/common/common.min.js"></script>
    <script src="{{ asset('adminpanel')}}/js/custom.min.js"></script>
    <script src="{{ asset('adminpanel')}}/js/settings.js"></script>
    <script src="{{ asset('adminpanel')}}/js/gleek.js"></script>
    <script src="{{ asset('adminpanel')}}/js/styleSwitcher.js"></script>
	<script src="{{ asset('adminpanel')}}/js/select2.min.js"></script>
<script>
  function Sum()
        {
           
            
     var product_price = parseFloat(document.getElementById("product_price").value);
     var discount_pre = parseFloat(document.getElementById("discount_presentage").value);
     document.getElementById('discount_amount').value =(product_price /100)* discount_pre;
        }

        function TaxSum()
        {
           
            
     var product_price = parseFloat(document.getElementById("product_price").value);
     var tax = parseFloat(document.getElementById("tax").value);
     document.getElementById('tax_amount').value =(product_price /100)* tax;
        }
    </script>


<script>
    $(document).ready(function () {
        $('#edit-form').submit(function (e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response) {
						alert(response.success);
						//$('#example').DataTable().clear().draw();
						window.location = '{{ route('products.index') }}'
                  
                },
                error: function (error) {
                    console.error('Error:', error.responseJSON);
                }
            });
        });
    });
</script>


<!--
<script>
    $('#edit_product').on('submit', function() {
           // e.preventDefault();
            var productId = $request->product_id;
            alert(productId);
            
            // Make an AJAX request to update the product
            $.ajax({
                url: 'products/update' + productId,
                type: 'post',
                data: $(this).serialize(),
                success: function(updateResponse) {
                    alert(updateResponse.message);
                    table.ajax.reload();
                   // $('#editProductModal').modal('hide');
                }
            });
        });
</script>
-->	
 

</body>

</html>