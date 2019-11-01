@extends('main')
@section('title','| Forgot my Password')
@section('content')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card">
 			 <b><div class="card-header">Reset Password</div></b>
  			<div class="card-body">
  				@if (session('status'))
  				<div class="alert alert-success">
  					{{ session('status') }}
  				</div>
  				@endif
  				{!! Form::open(['url'=> 'password/email','method'=> "POST"]) !!}
				<b>{{ Form::label('email','Email Address:') }}</b>
				{{ Form::email('email',null,['class'=>'form-control']) }}
				<hr>
				{{ Form::submit('Reset Password',['class'=>'btn btn-primary btn-block']) }}
				{{ Form::close() }}

  			</div>
			</div>

		</div>
		<div class="col-md-3"></div>
	</div>


@endsection