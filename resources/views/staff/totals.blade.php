@extends('template.default')

@section('styles')
<style type="text/css">
	body{
		background: #34495e;

	}
	
	h2{
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
	        <li ><a href="{{route('staff_main')}}">Inventory</a></li>
	        <li><a href="{{route('staff_items')}}">Products</a></li> 
	        <li class="active"><a href="{{route('staff_totals')}}">Subtotal</a></li> 
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
			<div class="col-md-8 row">
				@if(Session::has('total_pay'))
					<div class="alert alert-success">
						{{Session::get('total_pay')}}
					</div>
				@endif
				<table class="table table-bordered row">
					<thead>
						<tr>
							
							<td>Name</td>
							<td>Quantity</td>
							<td>Price</td>
							<td>Sub Total</td>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $morls)
							<tr>
								
								<td>{{$morls->item($morls->item_id)->name}}</td>
								<td>{{$morls->quantity}}</td>
								<td>{{$morls->item($morls->item_id)->price}}</td>
								<td>{{$morls->sub_total}}</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
				

				<div class="col-md-4 col-md-offset-4">
					<a href="{{route('staff_total_payment')}}" class="btn btn-danger btn-lg btn-block">Confirm</a>
				</div>
			</div>	

			<div class="col-md-4">
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-center">Total Payment</h4>
						<input type="text" id="total" name="total" value="{{$total}}" class="form-control" disabled="">
					</div>
					<div class="col-md-6">
						<h4 class="text-center">Change</h4>
						<input type="text" id="totalChange" value="0" class="form-control" disabled="">
					</div>
				</div>
				
				<div class="form-group">
					<label>Enter Payment</label>
					<input type="text" name="payment" class="form-control" value="0" required="" id="payment">
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-default btn-block" id="btnCalculate">CALCULATE</button>
				</div>
			</div>		
		</div>
	</div>
@endsection


@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$("#btnCalculate").click(function(){
			var payment = parseFloat($("#payment").val());
			var total = parseFloat($("#total").val());
			var change = payment - total;
			
			$("#totalChange").val(change);

		});
	});
</script>
@endsection