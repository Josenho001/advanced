@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}
<div class="container" style="margin-top: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-image:url({{url('images/fx.jpg')}})">
                <div class="card-header"><strong><center>All the Registered Unknown Bodies</center></strong></div>

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

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>photo</th>
                    <th>skin</th>
                    <th>gender</th>
                    <th>Registered On:</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($unidentifieds as $unidentified)
                        <tr>
                            <th>{{ $unidentified->id }}</th>
                            <td><img src="{{ asset('images/photos/' . $unidentified->image) }}"></td>
                            <td>{{ $unidentified->gender }}</td>
                            <td>{{ $unidentified->skin }}</td>
                            <td>{{ date('M j, Y  h:i a', strtotime($unidentified->created_at)) }}</td>
                            <td><a href="{{ route('unidentified.show',$unidentified->id)}}" class="btn btn-outline-primary btn-sm">View</a><a href="{{route('unidentified.edit',$unidentified->id)}}" class="btn btn-outline-primary btn-sm">Edit</a></td>
                        </tr>
                    @endforeach     
                </tbody>
            </table>

            <center>
                {!! $unidentifieds->links(); !!}
            </center>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5"></div>
        <div class="6">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-block ">Admin Main Page</a>
        </div>
        <div class="col-md-3"></div>
    </div>
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
