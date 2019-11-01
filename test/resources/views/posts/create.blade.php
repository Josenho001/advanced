 @extends('main')
@section('title','| create New Post')
@section('stylesheet')

{!! Html::style('css/parsley.css') !!}

{!! Html::style('css/select2.min.css') !!}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: "textarea",
		plugin:"link code",
		menubar:false
	});
</script>
@endsection
@section('content')
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
			<b>{{ Form::label('title','Title:')}}</b>
			{{ Form::text('title', null,array('class'=> 'form-control','required'=>'','maxlength'=>'255'))}}

			<b>{{ Form::label('slug','Slug:',['class'=>'form-spacing-top']) }}</b>
			{{ Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255')) }}

			<b>{{ Form::label('category_id','Category:',['class'=>'form-spacing-top']) }}</b>
			<select class="form-control" name="category_id">
				@foreach ($categories as $category)
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			<b>{{ Form::label('tags','Tags:',['class'=>'form-spacing-top']) }}</b>
			<select class="form-control select2-multi" name="tags[]" multiple="multiple">
				@foreach ($tags as $tag)
				<option value="{{ $tag->id }}">{{ $tag->name }}</option>
				@endforeach
			</select>


			<b>{{ Form::label('body','Post Body:',['class'=>'form-spacing-top'])}}</b>
			{{ Form::textarea('body', null,array('class'=> 'form-control'))}}

			{{ Form::submit('Create post',array('class'=> 'btn btn-success btn-lg btn-block','style'=> 'margin-top:20px' ))}}
			{!! Form::close() !!}
		</div>


	</div>
@endsection
@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
	$('.select2-multi').select2();
</script>

@endsection