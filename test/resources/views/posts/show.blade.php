@extends('main')
@section('title', '| View Post')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>
			<div class="tags">
			@foreach ($post->tags as $tag)
			<span class="label label-default ">{{ $tag->name }}</span>
			@endforeach
			</div>
			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small> {{ $post->comments()->count() }} total</small></h3>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)							
						<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td><a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-primary btn-xs">edit</a>
									<a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-danger btn-xs">delete</a></td>
								
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
		<div class="col-md-4">
			<div class="well" style="background-color:  #f0f5f5" >
				<dl class="dl-horizontal">
					<b><label class="form-spacing-left form-spacing-c">Url:</label></b>
					<p><a href="{{ route('blog.single',$post->slug) }}" class="form-spacing-left">{{route('blog.single',$post->slug)}}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<b><label class="form-spacing-left">   Category:</label></b>
					<p class="form-spacing-left">{{ $post->category->name }}</p>
				</dl>
				<dl class="dl-horizontal">
					<b><label class="form-spacing-left">   Created At:</label></b>
					<p class="form-spacing-left">{{ date('M j, Y h:i a',strtotime( $post->created_at)) }}</p>
				</dl>
				<dl class="dl-horizontal">
					<b><label class="form-spacing-left"> Last Updated:</label></b> 
					<p class="form-spacing-left">{{ date('M j, Y h:i a',strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit',array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}
						
					</div>

					<div class="col-sm-6">
						{!! Form::open(['route'=>['posts.destroy',$post->id], 'method'=>'DELETE']) !!}
						{!! Form::submit('delete',['class'=>'btn btn-danger btn-block']) !!}
						{!! Form::close()!!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index','<<See All Posts',[], ['class'=>'btn btn-secondary btn-block btn-h1-spacing']) }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
