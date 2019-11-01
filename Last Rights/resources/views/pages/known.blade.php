@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}
<div class="container" style="margin-top: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-image:url({{url('images/fx.jpg')}})">
                <div class="card-header">All the Registered Known Deceaced</div>

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
        <div class="col-md-10">
            <h1>All Known Deceased </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Registered On:</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($identifieds as $identified)
                        <tr>
                            <th>{{ $identified->id }}</th>
                            <td>{{ $identified->name }}</td>
                            <td>{{ $identified->height }}</td>
                            <td>{{ $identified->avg }}</td>
                            <td>{{ date('M j, Y', strtotime($identified->created_at)) }}</td>
                            <td><a href="{{ route('identity.show',$identified->id)}}" class="btn btn-outline-primary btn-sm">View</a><a href="{{route('identity.edit',$identified->id)}}" class="btn btn-outline-primary btn-sm">Edit</a></td>
                        </tr>
                    @endforeach     
                </tbody>
            </table>

            <center>
                {!! $identifieds->links(); !!}
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
