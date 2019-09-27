<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;

class AuthAdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest:admin')->except('logoutAdmin');


    }

    public function showLoginForm()
    {
    	return view('authAdmin.login');
    }

    public function login(Request $request){
    	$this->validate($request,[
    		'email' => 'email',
    		'password' => 'min:6'
    		]);

    	$credential = [
    		'email' => $request->email,
    		'password' => $request->password,

    	];

    	if (Auth::guard('admin')->attempt($credential, $request->member)){
            $admin = Admin::find(Auth::guard('admin')->user()->id);
            return redirect()->route('admin.home'); 
            
    	}
    	return redirect()->back()->withInput($request->only('email', 'remember'))->with('alert','Email atau Password Salah, Silahkan Coba Lagi.');

    	
    }

    public function logoutAdmin(){
    	Auth::guard('admin')->logout();
    	return redirect('/');
    }
}
