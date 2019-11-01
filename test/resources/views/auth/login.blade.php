@extends('main')
@section('title','| Register')
@section('content')

    <div class="row">
        <div class="offset-md-3 col-md-6">
            {!! Form::open() !!}
                <b>{{ Form::label('email',"Email:") }}</b>
                {{ Form::email('email',null,['class'=>'form-control']) }}

                <b>{{ Form::label('password',"Password:") }}</b>
                {{ Form::password('password',['class'=>'form-control']) }}

                <br>
                {{ Form::checkbox('remember') }}{{ Form::label('remember me') }}
                <br>
                {{ Form::submit('login',['class'=>'btn btn-primary btn-block']) }}
                <p><a href="{{ url('password/reset') }}">Forgot My Password</a></p>

                {!! Form::close() !!}
        </div>
    </div>

@endsection