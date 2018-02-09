<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
	public function __construct(){
		$this->middleware('usercheck');
	}
    public function login(){
    	return view('auth.login');
    }

    public function login_check(Request $request){
    	$request->validate([
    		'username'=> 'required|max:12',
    		'password'=> 'required|max:12'
    	]);

    	$data = array('username'=> $request['username'], 'password'=> $request['password']);
    	if(Auth::attempt($data)){
    		return redirect()->route('staff_home');
    	}else{
    		return redirect()->back()->with('error', 'Invalid Username/Password');
    	}

    }
}
