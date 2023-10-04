<!DOCTYPE html>
<html lang="en">

@include("adminpanel/includes/head");
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<style type="text/css">

  

</style>

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
          
            <form action="{{route('products.store')}}" onsubmit="if(!confirm('Are you sure to Save?'))" method="POST" enctype="multipart/form-data">
           
                {{ csrf_field() }}
                <div class="row">
                   
                     
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                               <div class="basic-form">
                                <div class="row">
                                  
                                  	<div class="col-md-4">
                                
                                    <label>Product Name</label>
								    
									<div class="form-group">
										<input type="text" name="product_name" id="pname" class="form-control input-rounded" value="{{old('product_name')}}"  required>
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
                                            <select class="form-control input-rounded" name="category">

                                  
                                           
                                              
                                               
                                                @foreach ($category as $category)
                                                <option value="{{$category->id}}" {{old('category') == '$category->category_name' ?'selected':''}}>{{$category->category_name}}</option>
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
                                        <select id="unit_type" class="form-control input-rounded" name="unit_type">
                                            @foreach($unittype as $unittype)
                                            <option value="{{$unittype->name}}">{{$unittype->name}}</option>
                                              
                                          
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
                                        <input type="text" name="product_price" id="product_price" class="form-control input-rounded" value="{{old('product_price')}}"  required>
                                    </div>
                                    @error('product_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="col-md-4">
                                    <label>Discount(%)</label>
                                          
                                    <div class="form-group">
                                        <input type="text" name="discount_pre" id="discount_presentage" onblur="Sum();" class="form-control input-rounded" value="{{old('discount_pre')}}" >
                                    </div> 
                                @error('discount_pre')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror
                             </div>
                                    <div class="col-md-4">
                                    <label>Discount Amount</label>
                                          
                                    <div class="form-group">
                                        <input type="text" name="discount_amount" readonly id="discount_amount" class="form-control input-rounded" value="{{old('discount_amount')}}" >
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
                                     <input id="example" type="date" name="discount_rangefrom" value="{{old('discount_rangefrom')}}" class="form-control input-rounded" placeholder="dd/mm/yy"  />
                                     </div>
                                     @error('discount_rangefrom')
                                     <span class="text-danger">{{$message}}</span>
                                         @enderror
                                </div>
                                     <div class="col-md-6">
                                        <div class="from-group">
                                <label class="">Discount Range  To </label>
                                <input id="example" type="date" name="discount_rangeto" value="{{old('discount_rangeto')}}" class="form-control input-rounded" placeholder="dd/mm/yy"  />
                                        </div>  @error('discount_rangeto')
                                        <span class="text-danger">{{$message}}</span>
                                            @enderror </div>
                                    
                                </div>
									
                                       
                                <div class="row">
                                    <div class="col-md-4">
                                    <label>Tax (%) </label>
								    
                                    <div class="form-group">
                                        <input type="text" name="tax" id="tax" onblur="TaxSum();" class="form-control input-rounded" value="{{old('tax')}}" >
                                    </div>
                                    @error('tax')
                                    <span class="text-danger">{{$message}}</span>
                                        @enderror
                                   
                                </div>
                                <div class="col-md-4">
                                    <label>Tax Amount </label>
								    
                                    <div class="form-group">
                                        <input type="text" readonly name="tax_amount" id="tax_amount" class="form-control input-rounded" value="{{old('tax_amount')}}" >
                                    </div>
                                    @error('taxt_amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Stock </label>
								    
                                    <div class="form-group">
                                        <input type="text" name="stock" id="stock" class="form-control input-rounded" value="{{old('stock')}}" >
                                    </div>
                                    @error('stock')
                                    <span class='text-danger'> {{$message}} </span>
                                        
                                    @enderror
                                </div>
                               
                            </div>


                            <label class="control-label">Product Images</label>
						
                            <div class="form-group">
                                <input type="file" name="product_images[]" id="files" class="form-control files input-rounded"  accept="image/*" multiple>
                                
                               
                                @error('product_images')
                                <span class="text-danger">{{$message}}</span>
                                    @enderror   

                                    <div id="filesdemo"></div>
                             
                            </div>
                 
                                  
                           
                        
                        
								
        
                                 
                        
                                 
									
                            <button type="submit" name="submit"  value="save" class="btn btn-dark mb-2">Save</button>
                                            
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


if (window.File && window.FileList && window.FileReader) {
        $(".files").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/>" +
                        "</span>").insertAfter("#filesdemo");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                    });
                });
                fileReader.readAsDataURL(f);
            }
            console.log(files);
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
	 if (window.File && window.FileList && window.FileReader) {
        $(".filescompare").on("change", function(e) {
            var filescompare = e.target.filescompare,
                filesLength = filescompare.length;
            for (var i = 0; i < filesLength; i++) {
                var f = filescompare[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip2\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/>" +
                        "</span>").insertAfter("#filescompare");
                    $(".remove").click(function() {
                        $(this).parent(".pip2").remove();
                    });
                });
                fileReader.readAsDataURL(f);
            }
            console.log(filescompare);
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
        </script>

</body>

</html>