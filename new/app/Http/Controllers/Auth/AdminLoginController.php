<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;


class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin',['except'=>['logout']]);
	}

    public function showLoginForm(){
    	return view('auth.admin-login'); 
    }
    public function login(Request $request){
    	//validate the data
    	$this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required|min:6'
    	]);


    	//attempt to login the user
    	if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
    	//if successful redirect

            Session()->flash('status', 'Task was successful!');
    		 return redirect()->intended(route('admin.dashboard'));
    	}
    	//if not go to login
    	return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
