@extends('main')
@section('title', '| All Posts')
@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>All Posts </h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-primary btn-block btn-h1-spacing">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>body</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body),0,50) }}{{ strlen(strip_tags($post->body)) >50 ?"..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							<td><a href="{{ route('posts.show',$post->id)}}" class="btn btn-outline-primary btn-sm">View</a><a href="{{route('posts.edit',$post->id)}}" class="btn btn-outline-primary btn-sm">Edit</a></td>
						</tr>
					@endforeach		
				</tbody>
			</table>

			<center>
				{!! $posts->links(); !!}
			</center>
		</div>
	</div>

@endsection