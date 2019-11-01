@extends('main')
@section('title',"| Edit water meter")
@section('content')
<div class="row">
	<div class="offset-md-2 col-md-8">
		<div class="card">
			<div class="card-header"><center>Edit The Meter Number</center></div>
		
		<div class="card-bady">
			
	{!! Form::model($meter,['route'=>['devices.update',$meter->id], 'method'=>"PUT"]) !!}
		<b>{{ Form::label('meter','Meter Number',['class'=>'form-spacing-top']) }}</b>
		{{ Form::text('meter',null,['class'=>'form-control']) }}

		{{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block form-spacing-top']) }}
	{!! Form::close() !!}
	</div>
		</div>
	</div>
</div>

@endsection