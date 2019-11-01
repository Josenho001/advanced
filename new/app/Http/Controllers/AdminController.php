<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Device;
use App\Meter;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $primaryKey = 'id';
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


         $meters = Meter::all();

        $meters = Meter::orderBy('id')->paginate(10);

        return view('pages.admin')->withMeters($meters);
        //return view('pages.admin')->with(compact('meters'));

    
    }


    
}
