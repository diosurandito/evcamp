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
    	$this->middleware('guest:organizer');

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

    	return view('authOrganizer.login');
    }
}
