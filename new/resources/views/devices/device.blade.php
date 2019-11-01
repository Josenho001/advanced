@extends('main')
@section('content')
<div class="row">
	<div class="offset-md-2 col-md-8">
		<div class="card-header">Enter New Water Device</div>
		<div class="card-body">


			{!! Form::open(array('route' => 'devices.store')) !!}
				{{ Form::label('meter_number','Meter Number') }}
				{{ Form::text('meter_number', null, ['class' => 'form-control']) }}

				{{ Form::label('meter_number','Meter Number Confirmation') }}

				{{ Form::text('meter_number_confirmation',['class' => 'form-control']) }}
				{{ Form::submit('register device',['class'=>'btn btn-primary btn-block form-spacing-top']) }}


			{!! Form::close() !!}

		</div>
	</div>
</div>

@endsection