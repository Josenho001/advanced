@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}

{!! Html::style('css/parsley.css') !!}
<div class="container" style="margin-top: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-image:url({{url('images/fb.jpg')}})">
                <div class="card-header"><strong><center>Please Fill in this Form!</center></strong></div>

                <div class="card-body">
                    
                     @if(Session::has('administration'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>WElCOME!!</strong> {!!Session::get('administration')!!}
                      </div>
                     @endif

                     @if(Session::has('savedeceased'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Success!!</strong> {!!Session::get('savedeceased')!!}
                      </div>
                     @endif
                     
            {!! Form::open(array('route' => 'identity.store','data-parsley-validate'=> '','files' =>true)) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            {{ Form::label('featured_image','Upload Deceased Image') }}
                            {{ Form::file('featured_image') }}
                        </div>
                         <div class="col-md-7">
                            {{ Form::label('name','Name') }}
                            {{ Form::text('name', null, ['class' => 'form-control form-spacing-down' ]) }}


                                <div class="row form-spacing-down">
                                    <div class="col-md-6">     
                                        {{ Form::label('height','Height (ft in)') }}
                                        {{ Form::number('height', null, ['class' => 'form-control form-spacing-down','step' => 'any']) }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ Form::label('avg','Avg Weight (kg)') }}
                                        {{ Form::number('avg', null, ['class' => 'form-control','step' => 'any']) }}
                                    </div>
                                </div>
                        </div>               
                             {{ Form::label('marks','Body Marks') }}
                             {{ Form::textarea('marks', null, ['class' => 'form-control form-spacing-down']) }}              

                    </div>
                </div>
                <div class="col-md-6">

                             {{ Form::label('gender','Gender') }}<br>
                            {!! Form::select('gender',['Male'=>'male','Female'=>'female']) !!}
                    <h6><strong><center>About person who brought the deceased</center></strong></h6>
                        {{ Form::label('pname','Personal Name:') }}
                        {{ Form::text('pname', null, ['class' => 'form-control form-spacing-down']) }} 

                        {{ Form::label('national','ID Number:') }}
                        {{ Form::number('national', null, ['class' => 'form-control form-spacing-down']) }}

                        {{ Form::label('phone','Mobile Number:') }}
                        {{ Form::number('phone', null, ['class' => 'form-control form-spacing-down']) }} 
                </div>
               
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                           
                {{ Form::submit('submit deceaced record',['class'=>'btn btn-primary btn-block form-spacing-top']) }} 
                        </div>
                        <div class="col-md-6">
                          
                          <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-block form-spacing-downr">Cancel</a>  
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
          



            {!! Form::close() !!}
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
