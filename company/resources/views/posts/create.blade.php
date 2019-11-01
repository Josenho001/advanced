@extends('main')

@section('content')

{!! Html::style('css/styles.css') !!}
            
            <div class="row">
        <div class="offset-md-2 col-md-8">
            <h1><center>Create New Post</center></h1>
            <hr>
            {!! Form::open(array('route' => 'posts.store','data-parsley-validate'=>'')) !!}
            <b>{{ Form::label('title','Title:')}}</b>
            {{ Form::text('title', null,array('class'=> 'form-control','required'=>'','maxlength'=>'255'))}}

            <b>{{ Form::label('body','Post Body:',['class'=>'form-spacing-top'])}}</b>
            {{ Form::textarea('body', null,array('class'=> 'form-control'))}}

            {{ Form::submit('Create post',array('class'=> 'btn btn-success btn-lg btn-block','style'=> 'margin-top:20px' ))}}
            {!! Form::close() !!}
        </div>


    </div>
@endsection
