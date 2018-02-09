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
	        <li class="active"><a href="{{route('staff_items')}}">Products</a></li> 
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
		
		<div id="datacontent" class=" row well">
			<div class="col-md-8">
				@if(Session::has('del'))
					<div class="alert alert-danger">
						{{Session::get('del')}}
					</div>
				@endif
				@if(Session::has('pay_order'))
					<div class="alert alert-info">
						{{Session::get('pay_order')}}
					</div>
				@endif
				<table class="table table-bordered row">
					<thead>
						<tr>
							
							<td>Name</td>
							<td>Quantity</td>
							<td>Price</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
						@foreach($items2 as $morls)
							<tr>
								
								<td>{{$morls->item->name}}</td>
								<td>
									<form action="{{route('staff_order_to_pay', ['order_id'=> $morls->id])}}" method="POST">
									<div class="col-md-5 row">
										<input type="integer" name="quantity" class="form-control" value="1" required="">
									</div>
								</td>
								<td>{{$morls->item->price}}</td>
								<td>
									
										<a href="{{route('staff_delete_order', ['order_id'=> $morls->id])}}" class="btn btn-danger btn-xs">Delete</a>
										
										<button type="submit" class="btn btn-info btn-xs">Submit</button>
										{{csrf_field()}}
									</form>
								</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				@if(Session::has('get_oder'))
					<div class="alert alert-danger">
						{{Session::get('get_oder')}}
					</div>
				@endif
				<table class="table table-bordered ">
					<thead>
						<tr>
							
							<td>Name</td>
							<td>Quantity</td>
							<td>Price</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $morls)
							<tr>
								
								<td>{{$morls->name}}</td>
								<td>{{$morls->quantity}}</td>
								<td>{{$morls->price}}</td>
								<td>
									@if($morls->order)
										<button class="btn btn-danger btn-xs" disabled="">Ready to Pay</button>
									@else
										<a href="{{route('staff_select_order', ['item_id'=> $morls->id])}}" class="btn btn-danger btn-xs">Buy Me</a>
									@endif
									
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
@endsection


@section('scripts')

@endsection