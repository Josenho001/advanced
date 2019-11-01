@extends('main')
@section('title','| Delete Meter')
@section('content')
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<div class="card">
				<div class="card-header"><center><h3><strong>DELETE THIS WATER METER</strong></h3> </center></div>
				<div class="card-body">
					
			<p>
				<strong>Meter Number:</strong>{{ $meter->meter }}<br>
			</p>
			{!! Form::open(['route'=>['devices.destroy',$meter->id],'method'=>'DELETE']) !!}
			{{ Form::submit('YES DELETE THIS WATER METER',['class'=>'btn btn-danger btn-block btn-lg btn-h1-spacing']) }}
			{!! Form::close() !!}
				</div>
			</div>
			
		</div>
	</div>

@endsection