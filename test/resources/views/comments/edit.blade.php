@extends('main')
@section('title','| Edit Comment')
@section('content')
<div class="row">
	<div class="offset-md-2 col-md-8">
		
	<h3>Edit Comments</h3>

	{{ Form::model($comment,['route'=>['comments.update', $comment->id],'method'=>'PUT']) }}
	{{ Form::label('name','Name:') }}
	{{ Form::text('name',null,['class'=>'form-control','disabled'=>'disabled']) }}

	{{ Form::label('email','Email:') }}
	{{ Form::text('email',null,['class'=>'form-control','disabled'=>'disabled']) }}

	{{ Form::label('comment','Comment:') }}
	{{ Form::textarea('comment',null,['class'=>'form-control']) }}

	{{ Form::submit('Update Comment',['class'=>'btn btn-success btn-block form-spacing-c']) }}

	{{ Form::close() }}

	</div>
</div>

@endsection