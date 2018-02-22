@extends('template.default')

@section('styles')
<style type="text/css">
	body{
		background: #d63031;
	}
	.well{
		
		border-radius: 10px;
	}
	span{
		margin-right: 5px;
		color: red;
	}
	p img {
		margin-top: 3%;
	}

	div#login {
		background-color: #e74c3c;
		border-color:#ba4a4b #ba1a1b #ba1a1b #ba4a4b;
		border-width:2px;  
    	border-style:outset;
    	margin-top: 10%;
	}

	img {
		height: 150px;
		width: 150px;
		display: block;
		margin: 0 auto;
	}

	form {
		padding: 20px !important;
	}

	input {
		height: 50px !important;
		padding-left: 30px !important;
	}	

	span#input-user {
		display: inline-block;
		height: 25px;
		width: 25px;
		background-image: url({{URL::to('images/user.png')}});
		position: relative;
		top: -37px;
		left: 5px;
	}

	span#input-pass {
		display: inline-block;
		height: 25px;
		width: 25px;
		background-image: url({{URL::to('images/pass.png')}});
		position: relative;
		top: -37px;
		left: 5px;
	}

	#signin {
		border: 1px solid #aaa;
	}

	.has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label{
		color: #fff !important;
	}
</style>
@endsection


@section('contents')
	<div id="login" class="col-md-5 col-md-offset-4 well">
		<img src="{{URL::to('images/login.png')}}">
		
		@if(Session::has('error'))
			<div class="alert alert-danger">
				{{Session::get('error')}}
			</div>
		@endif
		<form action="{{route('login_check')}}" method="POST" class="align-items-center">
			<div class="form-group {{$errors->has('username') ? 'has-error': ''}}">
				<input type="text" name="username" class="form-control" id="username" max="12" placeholder="Username">
				<span id="input-user"></span>
				@if($errors->has('username'))
					<span class="help-block">{{$errors->first('username')}}</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
				<input type="password" name="password" class="form-control" id="password" max="12" placeholder="Password">
				<span id="input-pass"></span>
				@if($errors->has('password'))
					<span class="help-block">{{$errors->first('password')}}</span>
				@endif
			</div>
			<div class="form-group">
				
				 
				 {{csrf_field()}}
				 <button type="submit" id="signin" class="btn btn-danger">Sign-In</button>
			</div>
		</form>
	</div>
@endsection


@section('scripts')

@endsection