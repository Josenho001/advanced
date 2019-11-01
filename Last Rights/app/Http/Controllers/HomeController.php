<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidentified;
use Session;
use Image;
use Storage;


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

        $unidentifieds = Unidentified::orderBy('id', 'desc')->paginate(5);
        return view('pages.home')->withUnidentifieds($unidentifieds);
        //return view('pages.home');
    }

    
}
