@extends('main')
@section('title','| Register')
@section('content')

	<div class="row">
		<div class="offset-md-3 col-md-6">
			{!! Form::open() !!}
				<b>{{ Form::label('name',"Name:") }}</b>
				{{ Form::text('name',null,['class'=>'form-control']) }}
				<b>{{ Form::label('email',"Email:") }}</b>
				{{ Form::email('email',null,['class'=>'form-control']) }}
				<b>{{ Form::label('password','Password:') }}</b>
				{{ Form::password('password',['class'=>'form-control']) }}
				<b>{{ Form::label('password_confirmation','Confirm Password:') }}</b>
				{{ Form::password('password_confirmation',['class'=>'form-control']) }}
				{{ Form::submit('Register',['class'=>'btn btn-primary btn-block form-spacing-top']) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection