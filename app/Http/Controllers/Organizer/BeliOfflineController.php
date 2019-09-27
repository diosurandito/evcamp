<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Event;
use App\Ticket;
use App\TransactionOffline;

class BeliOfflineController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:organizer');
	}


	public function index()
	{
		$idorg = Auth::user()->id;
		$beloff = DB::table('transaction_offlines')
		->join('organizers', 'organizers.id', '=', 'transaction_offlines.id_organizer')
		->join('events', 'transaction_offlines.id_event', '=', 'events.id')
		->select('events.*', 'organizers.nama', 'transaction_offlines.*')
		->whereNull('events.deleted_at')
		->where('events.id_organizer', '=', $idorg )
		->orderBy('transaction_offlines.id','DESC')
		->get();

		$roles = DB::table('events')
		->join('organizers', 'organizers.id', '=', 'events.id_organizer')
		->join('tickets', 'tickets.id_event', '=', 'events.id')
		->select('events.id', 'events.nama_event', 'stok_tiket')
		->whereNull('events.deleted_at')
		->where('events.id_organizer', '=', $idorg )
		->where('tgl_selesai', '>=', DB::raw('now()'))
		->orderBy('events.nama_event','ASC')
		->get();

		return view('pages.organizer.belioffline', compact('beloff', 'roles'));
	}

	public function beli(Request $request)
	{
		$idorg = Auth::user()->id;

		$event = Event::find($request->id_event);
		$ticket = Ticket::find($request->id_event);
		if ($ticket->stok_tiket < $request->jumlah_beli) {
			return back()->with('failed', 'Pembelian Offline Gagal Karena Jumlah Stok Tidak Mencukupi');
		}
		else{
			$event->update([
				'jumlah' => $event->jumlah - $request->jumlah_beli,

				]);
			$ticket->update([
				'stok_tiket' => $ticket->stok_tiket - $request->jumlah_beli,

				]);

			TransactionOffline::create([
				'id_organizer' => $idorg,
				'id_event' => $request->id_event,
				'jumlah_beli' => $request->jumlah_beli,
				'tgl_beli' => DB::raw('now()'),

				]);


			return back()->with('success', 'Pembelian Offline Berhasil');

		}

		
	}
}
