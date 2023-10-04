<!--**********************************
	Sidebar start
***********************************-->
<div class="nk-sidebar">           
	<div class="nk-nav-scroll">
		
		<ul class="metismenu" id="menu">
			<li>
			
				
			</li>
			<li>
				<a class="" href="{{ url('/home') }}" aria-expanded="false">
					<i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
				</a>
				
			</li>

			<li>
				<a class="has-arrow" href="javascript:void()" aria-expanded="false">
					<i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Products</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="{{ route('products.create') }}" aria-expanded="false">Add Product</a></li>
					<li><a href="{{ route('products.index') }}" aria-expanded="false">View Products</a></li>
				</ul>
			</li>

		
			
			<li>
				<a class="" href="{{ route('logout') }}" aria-expanded="false">
					<i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
				</a>
				
			</li>
			
			</li>
	
			
		</ul>
	</div>
</div>
<!--**********************************
	Sidebar end
***********************************-->