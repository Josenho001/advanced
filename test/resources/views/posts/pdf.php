use PDF;
Then, we instantiate the PDF class and use its API for further enhancing the generated PDF file.

Step: 3 Create a master blade file.
<!-- master.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
      <div class="container">
          @yield('content')
      </div>
  </body>
</html>
Step: 4 Create a form blade file for input the data.
<!-- form.blade.php -->

@extends('master')
@section('content')
<form method="post" action="{{url('submitForm')}}">
    {{csrf_field()}}
    <div class="form-group"> <!-- Full Name -->
      <label for="full_name_id" class="control-label">Full Name</label>
      <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
    </div>

    <div class="form-group"> <!-- Street 1 -->
      <label for="street1_id" class="control-label">Street Address 1</label>
      <input type="text" class="form-control" id="street1_id" name="street_address" placeholder="Street address, P.O. box, company name, c/o">
    </div>

    <div class="form-group"> <!-- City-->
      <label for="city_id" class="control-label">City</label>
      <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville">
    </div>

    <div class="form-group"> <!-- Zip Code-->
      <label for="zip_id" class="control-label">Zip Code</label>
      <input type="text" class="form-control" id="zip_id" name="zip_code" placeholder="#####">
    </div>

    <div class="form-group"> <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Buy!</button>
    </div>

    </form>
@endsection
Step: 5 Add the routes for our application.
// web.php

<?php

Route::get('/', function () {
    return view('form');
});

Route::post('submitForm','UserDetailController@store');
Step: 6 Create the model file for form data.
// UserDetail.php

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = ['full_name','street_address','zip_code','city'];
}
Step: 7 Create controller file for form data.
// UserDetailController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;

class UserDetailController extends Controller
{

    public function store(Request $request){

      $user = new UserDetail([
        'full_name' => $request->get('full_name'),
        'street_address' => $request->get('street_address'),
        'city' => $request->get('city'),
        'zip_code' => $request->get('zip_code')
      ]);

      $user->save();
      return redirect('/index');
    }
    public function index(){

      $users = UserDetail::all();

      return view('index', compact('users'));
    }
}
Step: 8 Update web.php file for display the listing page.
// web.php

Route::get('/index','UserDetailController@index');
Step: 9 Create a view file for display the data.
<!-- index.blade.php -->

@extends('master')
@section('content')
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Full Name</th>
    <th>Address</th>
    <th>City</th>
    <th>Zip Code</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->full_name}}</td>
      <td>{{$user->street_address}}</td>
      <td>{{$user->city}}</td>
      <td>{{$user->zip_code}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
Step: 10 Create a route for download the pdf file.
/ /web.php

Route::get('/downloadPDF/{id}','UserDetailController@downloadPDF');
Step: 11 Update index.blade.php file.
<!-- index.blade.php -->

@extends('master')
@section('content')
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Full Name</th>
    <th>Address</th>
    <th>City</th>
    <th>Zip Code</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->full_name}}</td>
      <td>{{$user->street_address}}</td>
      <td>{{$user->city}}</td>
      <td>{{$user->zip_code}}</td>
      <td><a href="{{action('UserDetailController@downloadPDF', $user->id)}}">PDF</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
Step: 12 Create pdf.blade.php file to design our pdf blade.
<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
      <tr>
        <td>
          {{$user->full_name}}
        </td>
        <td>
          {{$user->street_address}}
        </td>
      </tr>
      <tr>
        <td>
          {{$user->city}}
        </td>
        <td>
          {{$user->zip_code}}
        </td>
      </tr>
    </table>
  </body>
</html>
Step: 13 Write a controller function to download the PDF.
// UserDetailController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\UserDetail;

class UserDetailController extends Controller
{

    public function store(Request $request){

      $user = new UserDetail([
        'full_name' => $request->get('full_name'),
        'street_address' => $request->get('street_address'),
        'city' => $request->get('city'),
        'zip_code' => $request->get('zip_code')
      ]);

      $user->save();
      return redirect('/index');
    }
    public function index(){

      $users = UserDetail::all();

      return view('index', compact('users'));
    }

    public function downloadPDF($id){
      $user = UserDetail::find($id);

      $pdf = PDF::loadView('pdf', compact('user'));
      return $pdf->download('invoice.pdf');

    }
}

