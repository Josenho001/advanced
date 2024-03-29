@extends('main')
@section('title', '| View Post')
@section('content')

<div class="row">

            {!! Form::model($post,['route' => ['posts.update', $post->id]]) !!}
        <div class="col-md-8">
                {{ Form::text('title', null, ['class' => 'form-control']) }}
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}

        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:i a', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.update', 'Save Changes', array($post->id), array('class' => 'btn btn-success btn-block')) !!}
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
