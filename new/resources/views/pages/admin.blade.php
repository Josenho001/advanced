@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Admin Dashboard
                </div>

                <div class="card-body">

                     @if(Session::has('success'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>SUCCESSFUL!!</strong> {!!Session::get('success')!!}
                      </div>
                     @endif

                     @if(Session::has('update'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>SUCCESSFUL!!</strong> {!!Session::get('update')!!}
                      </div>
                     @endif

                     @if(Session::has('delete'))
                      <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>SUCCESSFUL!!</strong> {!!Session::get('delete')!!}
                      </div>
                     @endif
                    
                <a href="{{ route('trans.index') }}" class="btn btn-block btn-primary btn-xs form-spacing-btm">Show Transactions</a>

                    <div class="row">
                    <div class="col-md-6">
                        <h3><center>WATER TOKEN METERS</center></h3><br>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>METER NUMBER</th>
                                </tr>
                            </thead>
                             <tbody>
                        @foreach ($meters as $meter)
                                   <tr>
                                    <th>{{ $meter->id }}</th>
                                    <th>{{ $meter->meter }}</th>
                                    <td><a href="{{ route('devices.edit',$meter->id) }}" class="btn btn-primary btn-xs">edit</a>
                                    <a href="{{ route('devices.delete',$meter->id) }}" class="btn btn-danger btn-xs">delete</a></td>
                                   </tr>
                        @endforeach
                            </tbody>
                        </table>
                                        {!! $meters->links(); !!}

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header"><strong><center>Enter New Device</center></strong></div>
                            <div class="card-body">
                             
                {!! Form::open(['route'=>'devices.store','method'=>'POST']) !!}
                    
                    {{ Form::label('meter','Meter Number:') }}
                    {{ Form::text('meter',null,['class'=>'form-control ']) }}
                    {{ Form::submit('Submit New Meter',['class'=>'btn btn-primary btn-block btn-h1-spacing']) }}
                {!! Form::close() !!}
                       </div>
                        </div>
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
