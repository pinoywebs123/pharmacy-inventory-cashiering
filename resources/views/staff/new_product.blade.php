@extends('template.default')

@section('styles')
<style type="text/css">
	body{
		background: #34495e;

	}
	
	h3{
		color: #c0392b;
		
	}
	.navbar{
		background: #e74c3c !important;
		border: 1px solid #c0392b;
	}
	
	.navbar-nav li a{
		color: #fff !important;
	}

	.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
		color: #e74c3c !important;
	}
	.navbar-default .navbar-brand{
		color: #fff !important;
	}

	.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover{
		color: #e74c3c !important;
	}
	.dropdown-menu>li>a{
		color: #e74c3c !important;
	}
	
	
</style>
@endsection


@section('contents')
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="#">Rachel Pharmacy</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li ><a href="{{route('staff_home')}}">Home</a></li>
	        <li class="active"><a href="{{route('staff_main')}}">Inventory</a></li>
	        <li><a href="{{route('staff_items')}}">Products</a></li> 
	        <li><a href="{{route('staff_totals')}}">Subtotal</a></li>  
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
       
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->fname}} {{Auth::user()->lname}} <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            
	            <li><a href="#">Settings</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="{{route('staff_logout')}}">Logout</a></li>
	          </ul>
	        </li>
	      </ul>

	    </div>
	  </div>
	</nav>

	<div class="container">
		
		<div id="datacontent" class="row well">
			
			<div class="col-md-12 ">
				<ul class="nav nav-tabs row">
				  <li role="presentation" ><a href="{{route('staff_main')}}">Drugs</a></li>
				  <li role="presentation" ><a href="{{route('staff_milk')}}">Milk</a></li>
				  <li role="presentation" ><a href="{{route('staff_cosmetic')}}">Cosmetic</a></li>
				 
				  <li role="presentation" class="active"><a href="{{route('staff_new_product')}}">New Item</a></li>
				 
				</ul>

				@if(Session::has('add_ok'))
					<div class="alert alert-success">
						{{Session::get('add_ok')}}
					</div>
				@endif
				<form action="{{route('staff_new_product_check')}}" method="POST">
					<div class="form-group">
						<label>Select Category</label>
						<select name="category" class="form-control">
							<option value="1">Drugs</option>
							<option value="2">Milk</option>
							<option value="3">Cosmetics</option>
						</select>
					</div>
					<div class="form-group">
						<label>Supplier Name</label>
						<input type="text" name="supplier_name" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Brand</label>
						<input type="text" name="brand" class="form-control" required="">
					</div>
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" name="product_name" class="form-control" maxlength="50" required="">
					</div>
					<div class="form-group">
						<label>Product Quantity</label>
						<input type="number" name="product_quantity" class="form-control" maxlength="5" required="">
					</div>
					<div class="form-group">
						<label>Product Price</label>
						<input type="number" name="product_price" class="form-control" maxlength="5" required="">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-danger btn-block">SUBMIT</button>
						{{csrf_field()}}
					</div>
				</form>
				
			</div>
			
		</div>
	</div>

	
@endsection


@section('scripts')

@endsection