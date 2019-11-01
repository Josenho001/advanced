@extends('layouts.app')
@section('title','| Homepage')
@section('content')
<b><hr></b>
<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
  <div class="col-md-8">
    <img src="/images/ck.jpg">
  </div>
  <div class="col-md-3"></div>
  </div>
</div>



<div class="container ">
  <div class="row form-spacing-downn">
    <div class="col-sm-10 col-md-offset-1">
      <center><h2>About us at a glance</h2></center><hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>
  <br>
  <div class="col-sm-5">
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
          <div class="panel-heading" style="background-color: #0066ff;">
            <h4 class="panel-title">
              Who we are
            </h4>
          </div>
        </a>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
          <div class="panel-heading" style="background-color: #ff3333;">
            <h4 class="panel-title">
              Who we are
            </h4>
          </div>
        </a>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
          <div class="panel-heading" style="background-color: #009900;">
            <h4 class="panel-title">
              Who we are
            </h4>
          </div>
        </a>
        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sd-7">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>
</div>


@endsection