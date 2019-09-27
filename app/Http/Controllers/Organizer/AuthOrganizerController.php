<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Organizer;
use App\Campus;
use Illuminate\Validation\Rule;

class AuthOrganizerController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest:organizer', ['verified'])->except('logoutOrganizer');


    }

    public function showRegisterForm()
    {
        $roles = Campus::select('id', 'nama_kampus')->get();
        
    	return view('authOrganizer.register', compact('roles'));
    }

    public function register(Request $request){
    	$this->validate($request,[
    		'nama' => 'min:3|max:200',
    		'email' => 'email|max:100|unique:organizers',
            'password' => 'min:6|confirmed',
    		'no_telp' => 'max:15',
    		]);

    	Organizer::create([
    		'nama' => $request->nama,
    		'id_campus' => $request->id_campus,
            'no_telp' => $request->no_telp,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    		]);

    	return redirect()->route('login')->withSuccess('Berhasil mendaftar.');
    }

    public function showLoginForm()
    {
        
    	return view('authOrganizer.login');
    }

    public function login(Request $request){
    	// $this->validate($request,[
    	// 	'email' => [ //Make an custom array
     //            'required','string','email',
     //            Rule::exists('organizers')->where(function ($query) { //create closure with query builder to check the users
     //                $query->whereNotNull('email_verified_at'); //where active column is true
     //            })
     //        ],
    	// 	'password' => 'min:6'
    	// 	], $this->validationErrors());

    	$credential = [
    		'email' => $request->email,
    		'password' => $request->password,

    	];

    	if (Auth::guard('organizer')->attempt($credential, $request->member)){
            $organizer = Organizer::find(Auth::guard('organizer')->user()->id);
            return redirect()->route('organizer.home'); 
            }
    	return redirect()->back()->withInput($request->only('email', 'remember'))->with('alert','Email atau Password Salah, Silahkan Coba Lagi.');;
    }

    public function logoutOrganizer(){
    	Auth::guard('organizer')->logout();
    	return redirect('/');
    }

    public function validationErrors()
    {
        return [
            'email' . '.exists' => 'Email yang Anda masukan tidak valid atau Anda harus melakukan aktivasi akun terlebih dahulu melalui email.'
        ];
    }
}
