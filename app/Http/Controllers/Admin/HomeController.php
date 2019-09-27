<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organizer;
use App\User;
use App\Event;
use Illuminate\Database\Eloquent\Builder;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$countOrganizer = Organizer::whereNull('deleted_at')->count();
        $countUser = User::whereNull('deleted_at')->count();
    	$countEvent = Event::whereNull('deleted_at')->count();

        $trans = DB::table('transactions')
       ->join('users', 'users.id', '=', 'transactions.id_user')
       ->join('events', 'events.id', '=', 'transactions.id_event')
       ->join('tickets', 'tickets.id', '=', 'transactions.id_tiket')
       ->select('transactions.*', 'users.nama', 'events.nama_event', 'events.kategori_tiket', 'tickets.harga')
       ->whereNull('transactions.deleted_at')
       ->orderBy('transactions.id','DESC')
       ->get();

       $countTrans = $trans->where('verifikasi', '=', 1)->count();

    	return view('pages.admin.home', compact('countOrganizer', 'countUser', 'countEvent', 'countTrans'));
    }
}
