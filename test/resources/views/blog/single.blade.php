@extends('main')
<?php $titleTag =htmlspecialchars( $post->title)  ?>
@section('title',"|  $titleTag")
@section('content')
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<center><p>Posted In: {{ $post->category->name }}</p></center>
		</div>
	</div>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments->count() }} Comments</h3>
			@foreach($post->comments as $comment)
			<div class="comment">
				<div class="author-info">
					<img src=  "{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) .'?d=mm'}}" class="author-image">
					<div class="author-name">
						<h4>{{ $comment->name }}</h4>
						<p class="author-time">{{ date('F nS, Y - g:i a',strtotime($comment->created_at)) }}</p>
					</div>
				</div>
				<div class="comment-content">
				{{ $comment->comment }}
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="row">
		<div id="comment-form" class="offset-md-2 col-md-8 form-spacing-comm">
			{{ Form::open(['route'=>['comments.store',$post->id],'method'=>'POST']) }}
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name','Name') }}
						{{ Form::text('name',null,['class'=>'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('email','Email') }}
						{{ Form::text('email',null,['class'=>'form-control']) }}
					</div>
					<div class="col-md-12">
						{{ Form::label('comment','Comment') }}
						{{ Form::textarea('comment',null,['class'=>'form-control','rows'=>'5']) }}

						{{ Form::submit('Add Comment',['class'=>'btn btn-success btn-block form-spacing-c']) }}
					</div>
				</div>

			{{ Form::close() }}
		</div>
	</div>


@endsection