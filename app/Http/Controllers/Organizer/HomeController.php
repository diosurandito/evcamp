<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:organizer');
    }

    public function index()
    {
    	return view('pages.organizer.home');
    }
}
