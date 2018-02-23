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
	        <li ><a href="{{route('staff_main')}}">Inventory</a></li>
	        <li><a href="{{route('staff_items')}}">Products</a></li> 
	        <li ><a href="{{route('staff_totals')}}">Subtotal</a></li> 
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
			<div class="col-md-12 row">
				<h3 class="text-center">Inventory Report</h3>
				<p class="pull-right">
					<button id="printReport" class="btn btn-info btn-xs">
						<span class="glyphicon glyphicon-print"></span>
					</button>
				</p>
				<ul class="nav nav-tabs row">
				  <li role="presentation" ><a href="{{route('staff_inventory_report')}}">Drugs</a></li>
				  <li role="presentation"><a href="{{route('staff_inventory_report2')}}">Milk</a></li>
				  <li role="presentation" class="active"><a href="{{route('staff_inventory_report3')}}">Cosmetic</a></li>
				 
				 
				</ul>
				<table class="table table-bordered row">
					<thead>
						<tr>
							
							<td>Name</td>
							<td>Price</td>
							<td>Quantity</td>
							<td>Quantity Left</td>
							<td>Quantity Sold</td>
							<td>Transaction Date</td>
							
						</tr>
					</thead>
					<tbody>
						@foreach($inventory as $morls)
							@if($morls->black($morls->item_id)->category_id == 3  )
								<tr>
								<td>{{$morls->item($morls->item_id)->name}}</td>
								<td>{{$morls->item($morls->item_id)->price}}</td>
								<td>{{$morls->inventory($morls->item_id)->quantity}}</td>
								<td>{{$morls->item($morls->item_id)->quantity}}</td>
								<td>{{$morls->quantity}}</td>
								<td>{{$morls->created_at->toDayDateTimeString()}}</td>
								
							</tr>
							@endif
							
						@endforeach

						
				</table>
			</div>
			
		</div>
	</div>
@endsection


@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$("#printReport").click(function(){
			window.print();
		});
	});
</script>
@endsection