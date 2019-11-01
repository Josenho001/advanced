@extends('main')
@section('title','| Delete Comment')
@section('content')
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<h3>DELETE THIS COMMENT</h3>
			<p>
				<strong>Name:</strong>{{ $comment->name }}<br>
				<strong>Email:</strong>{{ $comment->email }}<br>
				<strong>Comment:</strong>{{ $comment->comment }}
			</p>
			{{ Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE']) }}
			{{ Form::submit('YES DELETE THIS COMMENT',['class'=>'btn btn-danger btn-block btn-lg']) }}
			{{ Form::close() }}
		</div>
	</div>

@endsection