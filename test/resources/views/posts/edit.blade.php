@extends('main')
@section('title','| Edit Blog Post')
@section('content')
@section('stylesheet')
{!! Html::style('css/select2.min.css') !!}

	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
	tinymce.init({
		selector: "textarea",
		plugin:"link code",
		menubar:false
	});</script>

@endsection

      {!! Form::model($post, ['route'=> ['posts.update', $post->id], 'method' => 'PUT' ]) !!}
	<div class="row">
		<div class="col-md-8">
			<b>{{ Form::label('title','Title:')}}</b>
			{{ Form::text('title',null,["class"=>'form-control input-lg']) }}

			<b>{{ Form::label('slug','Slug',['class'=>' form-spacing-top'])}}</b>
			{{ Form::text('slug',null,['class'=>'form-control'])}}

			<b>{{ Form::label('category_id','Category:',['class'=>'form-spacing-top']) }}</b>
			{{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}

			<b>{{Form::label('tags','Tags',['class'=>'form-spacing-top']) }}</b>
			{{ Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi'],['multiple'=>'multiple']) }}<br>

			<b>{{ Form::label('body','Body:',['class'=>'form-spacing-top'])}}</b>
			{{ Form::textarea('body',null,["class"=>'form-control']) }}			
		</div>
		<div class="col-md-4">
			<div class="well" style="background-color:  #f0f5f5">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:i a',strtotime( $post->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:i a',strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel',array($post->id), array('class'=> 'btn btn-danger btn-block')) !!}
						
					</div>

					<div class="col-sm-6">
						{{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) }}
						</div>
				</div>
			</div>
		</div>
	</div>

      {!! Form::close() !!}
@endsection

@section('scripts')
{!! Html::script('js/select2.min.js') !!}
<script type="text/javascript">
	$('.select2-multi').select2();
	$('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}.trigger('change');
</script>
@endsection
