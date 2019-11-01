@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}

<div class="container">
  <div class="row"style="background-image:url({{url('images/fx.jpg')}})">
    <div class="offset-md-2 col-md-8">
        <div class="card">
        <div class="card-header"><center><strong>About Deceased Personal Information</strong></center></div>
        <div class="card-body">
          <div class="row form-spacing-down">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <img src="{{ asset('images/photos/' . $unidentified->image) }}">
            </div>
            <div class="col-md-4"></div>
          </div>
          <div class="row form-spacing-down">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <h5><p><strong>Brought On: </strong> {{  $unidentified->created_at }}</p></h5><br>
              <h5><p><strong>Gender: </strong>{{  $unidentified->gender }}</p></h5><br>
              <h5><p><strong>Height(ft, in): </strong>{{ $unidentified->height }}</p></h5><br>
              <h5><p><strong>Average weight(kg): </strong>{{ $unidentified->avg }}</p></h5><br>
              <h5><p><strong>Area Found: </strong>{{ $unidentified->area }}</p></h5><br>
              <h5><p><strong>Body Marks and State: </strong><br>{{ $unidentified->marks }}</p></h5><br>
              <h5><p><strong>OB Number: </strong>{{ $unidentified->ob }}</p></h5>
            </div>
            <div class="col-md-2"></div>
          </div>
          <div class="row form-spacing-down">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <h5><strong><center>About Person who Brought The Body.<center></strong></h5><hr>
              <h5><p><strong>Person Name: </strong>{{ $unidentified->pname }}</p></h5><br>
              <h5><p><strong>Identification Number: </strong>{{ $unidentified->national }}</p></h5><br>
              <h5><p><strong>Mobile Number:</strong>{{ $unidentified->phone }}</p></h5>
            </div>
            <div class="col-md-2"></div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <hr>
              <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                  <a href="{{ route('unidentified.index') }}" class="btn btn-primary btn-block">Back</a></div>
                <div class="col-md-4">
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
