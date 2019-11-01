@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 0px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><i>Admin Dashboard</i></center></div>

                <div class="card-body" style="background-image:url({{url('images/ft.jpg')}})">
                    
                     @if(Session::has('administration'))
                      <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">×</a>
                        <strong>WElCOME!!</strong> {!!Session::get('administration')!!}
                      </div>
                     @endif
                     <div class="row">
                         <div class="col-md-6" style="margin-top: 80px; margin-bottom: 80px;">
                             <a href="{{ route('identity.create') }}" class="btn btn-primary btn-block">Register Identified Body</a>
                             <a href="{{ route('identity.index') }}" class="btn btn-primary btn-block" style="margin-top: 70px;">View All Identified Body</a>
                         </div>
                         <div class="col-md-6" style="margin-top: 80px; margin-bottom: 80px;">
                             <a href="{{ route('unidentified.create') }}" class="btn btn-primary btn-block">Register Unidentified Body</a>
                             <a href="{{ route('unidentified.index') }}" class="btn btn-primary btn-block" style="margin-top: 70px;">View All Unidentified Body</a>
                         </div>
                     </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
