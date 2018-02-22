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
	i{
		margin-top: -40px;
		font-size: 40px;
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
	        <li class="active"><a href="{{route('staff_home')}}">Home</a></li>
	        <li><a href="{{route('staff_main')}}">Inventory</a></li>
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
		<div class="col-md-8 well">
			<div class="col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<a href="{{route('staff_main')}}"><h3 class="text-center">Inventory</h3></a>
						<i class="glyphicon glyphicon-list pull-left"></i>
					</div>
					<div class="panel-body">
						<p class="text-center">
							<span class="badge">{{$invent}}</span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<a href="{{route('staff_items')}}"><h3 class="text-center">Products</h3></a>
						<i class="glyphicon glyphicon-usd pull-left"></i>
					</div>
					<div class="panel-body">
						<p class="text-center">
							<span class="badge">{{$invent}}</span>
						</p>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<a href="{{route('staff_reports')}}"><h3 class="text-center">Sales </h3></a>
						<i class="glyphicon glyphicon-tasks pull-left"></i>
					</div>
					<div class="panel-body">
						<p class="text-center">
							<span class="badge">Reports</span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<a href="{{route('staff_inventory_report')}}"><h3 class="text-center">Inventory </h3></a>
						<i class="glyphicon glyphicon-tasks pull-left"></i>
					</div>
					<div class="panel-body">
						<p class="text-center">
							<span class="badge">Reports</span>
						</p>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-3 col-md-offset-1 well">
			<h4 class="text-center" style="color: red;">Previous items sold</h4>
			

				<ul>
					@foreach($reports as $rep)
					<li>{{$rep->item($rep->item_id)->name}}</li>
					@endforeach
				</ul>

			
		</div>
	</div>
	
@endsection


@section('scripts')

@endsection