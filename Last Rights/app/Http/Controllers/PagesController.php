<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use Mail;
use App\Post;
use Session;
use App\Comment;

class PagesController extends Controller{

	public function getIndex(){
		return view('pages.welcome');
	}

	public function getAbout(){
		return view('pages.about'); 
	}
	public function getContact(){
		return view('pages.contact'); 
	}
	

}


?>