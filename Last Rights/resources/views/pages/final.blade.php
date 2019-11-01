@extends('layouts.app')

@section('content')

{!! Html::style('css/style.css') !!}

<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            
            <div class="card">
                <div class="card-header"><center><strong>Please Fill This Form</strong></center></div>
                <div class="card-body ">
                      <div class="row form-spacing-x">
                          <div class="col-md-3"><img src="{{ asset('images/photos/' . $identified->image) }}"> </div>
                          <div class="col-md-1"></div>
                          <div class="col-md-5">
                              <h4><b><center>LAST RIGHTS MANAGEMENT SYSTEM</center></b></h4><br><br>
                              <h6><i><center>"life has and end. love doesn't."</center></i></h6>
                          </div>
                          <div class="col-md-3"></div>
                      </div> <hr> 
                      <div class="row form-spacing-xx">
                          <div class="col-md-12">
                              <h5><strong>Name:  </strong>{{ $identified->name }}</h5><br>
                              <h5><strong>Gender:  </strong>{{ $identified->gender }}</h5><br>
                              <h5><strong>Date Admitted:  </strong>{{ date('M j, Y h:i a',strtotime( $identified->created_at))  }}</h5><br>
                              <h5><strong>Date Released:  </strong>{{ date('M j, Y H:i a') }}</h5><br>

                              <h5><strong>Total Cost:  </strong> {{Session::get('total')}}</h5><br>
                          </div>
                      </div>    
                </div>
            </div>

        </div>
    </div>
</div>

    @endsection
