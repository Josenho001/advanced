@extends('main')
@section('title', '| View Post')
@section('content')
	<div class="row form-spacing-t">
		<div class="col-md-10">
			<h2>All Posts</h2>


		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-primary btn-block ">Create New Post</a>
		</div>
	
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr($post->body, 0, 50,) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default">View</a><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">Edit</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<hr>

@endsection
