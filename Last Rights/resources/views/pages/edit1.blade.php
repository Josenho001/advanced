@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}

{!! Html::style('css/parsley.css') !!}
<div class="container" style="margin-top: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-image:url({{url('images/fa.jpg')}})">
                <div class="card-header"><center><strong><i>Edit the information!</i></strong></center></div>

                <div class="card-body">
                    
                     @if(Session::has('administration'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>WElCOME!!</strong> {!!Session::get('administration')!!}
                      </div>
                     @endif

                     @if(Session::has('savedeceasedd'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>Success!!</strong> {!!Session::get('savedeceasedd')!!}
                      </div>
                     @endif
                     
            
      {!! Form::model($unidentified, ['route'=> ['unidentified.update', $unidentified->id], 'method' => 'PUT', 'files' => true ]) !!}

            <div class="row form-spacing-t">
                <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-5">
                     {{ Form::label('featured_image','Update Deceased Image') }}
                    {{ Form::file('featured_image') }} 
                            </div>
                            <div class="col-md-7">

                {{ Form::label('gender','Gender:') }}
                {!! Form::select('gender',['Male'=>'Male','Female'=>'Female']) !!}

                <div class="row form-spacing-downd">
                    <div class="col-md-6">
                        
                {{ Form::label('height','Height (ft in):') }}
                 {{ Form::number('height', null, ['class' => 'form-control form-spacing-down','step' => 'any']) }}
                    </div>
                    <div class="col-md-6">
                        
                {{ Form::label('avg','Avg Weight (kg):') }}
                {{ Form::number('avg', null, ['class' => 'form-control','step' => 'any']) }}
                    </div>
                </div>
                            </div>
                        </div>
                        
                
                                {{ Form::label('gender','Skin Orientation:') }}
                {{ Form::text('skin', null, ['class' => 'form-control form-spacing-down' ]) }}
                

                {{ Form::label('marks','Body Marks and Body State:') }}
                {{ Form::textarea('marks', null, ['class' => 'form-control form-spacing-down']) }}

                

  
                </div>
                <div class="col-md-6">

                {{ Form::label('area','Location Found:') }}
                {{ Form::text('area', null, ['class' => 'form-control form-spacing-down']) }}


                {{ Form::label('ob','OB Number:') }}
                {{ Form::text('ob', null, ['class' => 'form-control form-spacing-down']) }}

                    <center><strong style="margin-top: 70px;">About Person who Brought the deceased</strong></center>
                    
                            
                {{ Form::label('pname','Person Name:') }}
                {{ Form::text('pname', null, ['class' => 'form-control form-spacing-down' ]) }}

                {{ Form::label('natinal','Id Number:') }}
                {{ Form::number('national', null, ['class' => 'form-control form-spacing-down' ]) }}

                {{ Form::label('phone','Mobile Number:') }}
                {{ Form::number('phone', null, ['class' => 'form-control form-spacing-down' ]) }}
                  </div>
            </div>
                <div class="row">
                  <div class="col-md-6">
                    
                {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block form-spacing-top']) }}
                  </div>
                  <div class="col-md-6 form-spacing-downr" >
                    
            {!! Html::linkRoute('unidentified.index', 'Cancel',array($unidentified->id), array('class'=> 'btn btn-danger btn-block')) !!}
                  </div>
                </div>


            {!! Form::close() !!}
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
