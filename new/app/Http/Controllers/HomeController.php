<?php

namespace App\Http\Controllers;
use \App\Http\Controllers\HomeController;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        \Session::flash('usr', 'You Can Now Purchase Water Credit.  ' );
          return view('pages.home');
    }


}
