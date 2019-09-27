<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Event;

use DB;

class TransferHasilController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    $transferhasil = DB::table('transactions')
    ->join('events', 'transactions.id_event', '=', 'events.id')
    ->join('tickets', 'transactions.id_tiket', '=', 'tickets.id')
    ->join('organizers', 'organizers.id', '=', 'events.id_organizer')
    ->select('transactions.*', 'events.nama_event', 'events.tgl_mulai','events.tgl_selesai', 'organizers.nama', 'organizers.email', 'organizers.nama_akun', 'organizers.nama_bank', 'organizers.no_rek', 'events.bukti_transfer_hasil', 'tickets.harga', 'tickets.harga_fee', DB::raw('SUM(transactions.jumlah) as tkt_terjual'), DB::raw('SUM(transactions.jumlah) * tickets.harga_fee as pend_awal'), DB::raw('SUM(transactions.jumlah) * (tickets.harga * 5 / 100) as komisi'), DB::raw('(SUM(transactions.jumlah) * tickets.harga_fee) - (SUM(transactions.jumlah) * (tickets.harga * 5 / 100)) as pend_akhir'))
    ->where('transactions.verifikasi', '=', 2)
    ->groupBy('transactions.id_event')
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

    return view('pages.admin.transferhasil', compact('transferhasil', 'countTrans'));
  }


  public function send(Request $request, $id)
  {
   $this->validate($request,[
    
    'bukti_transfer_hasil' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);
   $bukti_transfer_hasil = $request->file('bukti_transfer_hasil')->store('bukti_transfer_hasil');

   $trans = Transaction::find($id);

   $strukhasil = Event::where('id', $trans->id_event)->first();
   $strukhasil->update([
    'bukti_transfer_hasil' => $bukti_transfer_hasil,

    ]);

   return back()->with('success', 'Berhasil kirim bukti transfer.');
 }
}
