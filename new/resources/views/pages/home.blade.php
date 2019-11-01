@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if(Session::has('msg'))
                      <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>WARNING!!</strong> {!!Session::get('msg')!!}
                      </div>
                     @endif
                     @if(Session::has('success'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>SUCCESSFUL!!</strong> {!!Session::get('success')!!}
                      </div>
                     @endif

                     @if(Session::has('usr'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>WElCOME!!</strong> {!!Session::get('usr')!!}
                      </div>
                     @endif
                        
                
                                        
                             {!! Form::open(['route'=>'trans.store','method'=>'POST']) !!}


                              {{ Form::label('phone','Phone:') }}
                              {{ Form::text('phone',null,['class'=>'form-control ']) }}


                              {{ Form::label('meter','Meter:') }}
                              {{ Form::text('meter',null,['class'=>'form-control ']) }}

                              {{ Form::label('amount','Amount:') }}
                              {{ Form::text('amount',null,['class'=>'form-control ']) }}


                              {{ Form::submit('Send Request',['class'=>'btn btn-primary btn-block btn-h1-spacing']) }}
                             {!! Form::close() !!}
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
