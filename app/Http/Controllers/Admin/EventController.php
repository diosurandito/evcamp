<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$event = DB::table('events')
       ->join('organizers', 'organizers.id', '=', 'events.id_organizer')
       ->join('campuses', 'campuses.id', '=', 'events.id_campus')
       ->join('tickets', 'tickets.id_event', '=', 'events.id')
       ->select('events.*', 'organizers.nama', 'campuses.nama_kampus', 'tickets.harga', 'tickets.stok_tiket')
       ->whereNull('events.deleted_at')
       ->orderBy('events.id','DESC')
       ->get();

       $trans = DB::table('transactions')
       ->join('users', 'users.id', '=', 'transactions.id_user')
       ->join('events', 'events.id', '=', 'transactions.id_event')
       ->join('tickets', 'tickets.id', '=', 'transactions.id_tiket')
       ->select('transactions.*', 'users.nama', 'events.nama_event', 'events.kategori_tiket', 'tickets.harga')
       ->whereNull('transactions.deleted_at')
       ->orderBy('transactions.id','DESC')
       ->get();

       $countTrans = $trans->where('verifikasi', '=', 1)->count();
        return view('pages.admin.event', compact('event', 'countTrans'));
    }

    public function show($id)
    {
        $event = Event::find($id)->get();
        
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('admin/event')->with('success', 'Data berhasil dihapus');
    }
}
