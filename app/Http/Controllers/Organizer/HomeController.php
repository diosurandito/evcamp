<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Transaction;
use App\DataOrganizer;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:organizer');
    }

    public function index()
    {
    	$idorg = Auth::user()->id;
        $countEvent = Event::whereNull('deleted_at')
    	->where('id_organizer', '=', $idorg)
    	->count();

        $pendapatan = DB::table('pendapatan_organizer')
        ->select('pendapatan_organizer.*')
        ->where('id_organizer', '=', $idorg)
        ->first();
        

        $trans = DB::table('transactions')
        ->join('events', 'transactions.id_event', '=', 'events.id')
        ->join('organizers', 'events.id_organizer', '=', 'organizers.id' )
        ->select('transactions.*', 'events.nama_event', 'organizers.id', 'organizers.nama')
        ->where('organizers.id', '=', $idorg)
        ->where('transactions.verifikasi', '=', 2)
        ->get();

        $countTrans = $trans->count();
        
    	return view('pages.organizer.home', compact('countEvent', 'pendapatan', 'countTrans'));
    }
}
