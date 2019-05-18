<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Organizer;

class AuthOrganizerController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest:organizer')->except('logoutOrganizer');


    }

    public function showRegisterForm()
    {
    	return view('authOrganizer.register');
    }

    public function register(Request $request){
    	$this->validate($request,[
    		'nama' => 'min:3|max:100',
    		'email' => 'email|max:100|unique:organizers',
    		'password' => 'min:6|confirmed',
    		'nama_kampus' => 'min:5'
    		]);

    	Organizer::create([
    		'nama' => $request->nama,
    		'nama_kampus' => $request->nama_kampus,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    		]);

    	return redirect()->route('login');
    }

    public function showLoginForm()
    {
    	return view('authOrganizer.login');
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

    	if (Auth::guard('organizer')->attempt($credential, $request->member)){
            $organizer = Organizer::find(Auth::guard('organizer')->user()->id);
    		if ($organizer->email_verified_at == null) {
    			return redirect()->back()->with('message','Email Belum di verifikasi');
    		}else{
            return redirect()->route('organizer.home'); 
            }
    	}
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logoutOrganizer(){
    	Auth::guard('organizer')->logout();
    	return redirect('/');
    }
}
