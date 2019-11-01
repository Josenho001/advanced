@extends('main')
@section('title','| Forgot my Password')
@section('content')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card">
 			 <b><div class="card-header">Reset Password</div></b>
  			<div class="card-body">
  				{!! Form::open(['url'=> 'password/reset','method'=> "POST"]) !!}
  				{{ Form::hidden('token', $token) }}

				<b>{{ Form::label('email','Email Address:') }}</b>
				{{ Form::email('email',$email,['class'=>'form-control']) }}

				{{ Form::label('password','New Password:') }}
				{{ Form::password('password',['class'=>'form-control']) }}

				{{ Form::label('password_confirmation','Confirm New Password:') }}
				{{ Form::password('password_confirmation',['class'=>'form-control']) }}
				
				{{ Form::submit('Reset Password',['class'=>'btn btn-primary btn-block']) }}
				{{ Form::close() }}

  			</div>
			</div>

		</div>
		<div class="col-md-3"></div>
	</div>


@endsection