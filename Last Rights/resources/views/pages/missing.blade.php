@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}

{!! Html::style('css/parsley.css') !!}
<div class="container" style="margin-top: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-image:url({{url('images/fb.jpg')}})">
                <div class="card-header"><strong><center><i>Please Fill in this Form!</i></center></strong></div>

                <div class="card-body">
                    
                     @if(Session::has('administration'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>WElCOME!!</strong> {!!Session::get('administration')!!}
                      </div>
                     @endif

                     @if(Session::has('save'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Success!!</strong> {!!Session::get('save')!!}
                      </div>
                     @endif
                     
            {!! Form::open(array('route' => 'police.store','data-parsley-validate'=> '','files' =>true)) !!}
                    
                    {{ Form::label('missing_image','Missing Person Image') }}
                    {{ Form::file('missing_image',['class'=>'form-spacing-down']) }}<br>

                    {{ Form::label('name','Name:')}}
                    {{ Form::text('name',null,['class'=>'form-control form-spacing-down']) }}

                    {{ Form::label('gender','Gender:') }}<br>
                    {{ Form::select('gender',['Male'=>'male','Female'=>'female']) }}<br>
                    <div style="margin-top: 20px;">
                    {{ Form::label('skin','Skin Pigmentation:') }}
                    {{ Form::text('skin',null,['class'=>'form-control form-spacing-down']) }}

                    {{ Form::label('height','Height (ft in):') }}
                    {{ Form::number('height', null, ['class' => 'form-control form-spacing-down','step' => 'any']) }}

                    {{ Form::label('avg','Avg Weight (kg):') }}
                    {{ Form::number('avg', null, ['class' => 'form-control form-spacing-down','step' => 'any']) }}

                    {{ Form::label('last','Location Last Seen:') }}
                    {{ Form::text('last',null,['class'=>'form-control form-spacing-down']) }}

                    {{ Form::label('mind','State Of Mind:') }}
                    {{ Form::text('mind',null,['class'=>'form-control form-spacing-down']) }}

                    {{ Form::label('cloth','Cloths Defination:') }}
                    {{ Form::text('cloth',null,['class'=>'form-control form-spacing-down']) }}

                    {{ Form::label('parent','Parent/Guardian Name:') }}
                    {{ Form::text('parent',null,['class'=>'form-control form-spacing-down']) }}

                    {{ Form::label('phone','Parent Mobile Number:') }}
                    {{ Form::number('phone',null,['class'=>'form-control form-spacing-down']) }}<hr>
                    </div>
                    {{ Form::submit('Submit',['class'=>'btn btn-success btn-block form-spacing-top']) }}

            {!! Form::close() !!}
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
