@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}

<div class="container">
    <div class="row" style="background-image:url({{url('images/fx.jpg')}})">
        <div class="offset-md-2 col-md-8">
            
            <div class="card">
                <div class="card-header">Deceased Personal Information</div>
                <div class="card-body">
                    <div class="row form-spacing-down">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            
                            <img src="{{ asset('images/photos/' . $identified->image) }}"> 
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row form-spacing-down">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <h5><strong>Name:  </strong>{{ $identified->name }}</h5><br>
                                <h5><strong>Gender:  </strong>{{ $identified->gender }}</h5><br>
                                <h5><strong>Date Admitted:  </strong>{{ date('M j, Y h:i a',strtotime( $identified->created_at))  }}</h5><br>
                                <h5><strong> Height (ft in): </strong>{{ $identified->height }}</h5><br>
                                <h5><strong> Avg Weight (kg): </strong>{{ $identified->avg }}</h5><br>
                                <h5><strong> Body Marks and state:</strong><br>{{ $identified->marks }}</h5>
                        </div>
                        <div class="col-md-2"></div>
                        
                    </div>
                    <div class="row form-spacing-down">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <h5><strong><center>Next kin information<center></strong></h5><hr>
                                   <h5> <strong>Person Name: </strong>{{ $identified->pname }}</h5><br>
                                   <h5><strong> Identification Number: </strong> {{ $identified->national }}</h5><br>
                                   <h5><strong> Mobile Number:</strong>{{ $identified->phone }}</h5>
                            </div>
                            <div class="col-md-2"></div>
                     </div>
                     <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <hr>
              <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3"><a href="{{ route('identity.index') }}" class="btn btn-primary btn-block">Back</a></div>
                <div class="col-md-3">
                  <a href="{{route('release.show',$identified->id)}}" class="btn btn-primary btn-block">Release</a></div>
                <div class="col-md-1">
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>            
                </div>
            </div>

        </div>
    </div>
</div>

    @endsection
