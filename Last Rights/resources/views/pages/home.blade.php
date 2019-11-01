@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}
<div class="container" style="margin-top: 0px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><strong><center><i>Police Main Page.</i></center></strong></div>
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
<a href="{{ route('police.create') }}" class="btn btn-primary btn-block">Register Missing Person</a>
<hr>

    
            </div>
        </div>
    </div>
</div>
@endsection
