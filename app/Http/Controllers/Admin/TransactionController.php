<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Ticket;
use App\TicketCode;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Auth;

class TransactionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
   $trans = DB::table('transactions')
   ->join('users', 'users.id', '=', 'transactions.id_user')
   ->join('events', 'events.id', '=', 'transactions.id_event')
   ->join('tickets', 'tickets.id', '=', 'transactions.id_tiket')
   ->select('transactions.*', 'users.nama', 'events.nama_event', 'events.kategori_tiket', 'tickets.harga')
   ->whereNull('transactions.deleted_at')
   ->orderBy('transactions.id','DESC')
   ->get();

   $countTrans = $trans->where('verifikasi', '=', 1)->count();

   return view('pages.admin.trans', compact('trans', 'countTrans'));

 }

 public function confirm(Request $request, $id)
 {
  $trans = Transaction::find($id);
  $trans->update([
    'verifikasi' => 2,

    ]);
  $ticket = Ticket::where('id', $trans->id_tiket)->first();
  $ticket->update([
    'stok_tiket' => $ticket->stok_tiket - $trans->jumlah,

    ]);

  $tkt = array($trans->nm_1);
  if ($trans->nm_2 != null) {
    array_push($tkt, $trans->nm_2);
  }
  if ($trans->nm_3 != null) {
    array_push($tkt, $trans->nm_3);
  }
  if ($trans->nm_4 != null) {
    array_push($tkt, $trans->nm_4);
  }
  if ($trans->nm_5 != null) {
    array_push($tkt, $trans->nm_5);
  }

  // echo json_encode($tkt);



  $jmltik = $trans->jumlah;
  $tcodes = [];
  for($i = 0; $i < $jmltik; $i++)
  {
    $tcodes[] = [

    'id_trans' => $trans->id,
    'nama_peserta' => $tkt[$i],
    'kode_tiket' => 'EVC'.sprintf("%04s", $trans->id_event).sprintf("%05s", $trans->id).strtoupper(Str::random(10)),
    ];
  }

  // echo json_encode($tcodes);

  TicketCode::insert($tcodes);

       // TicketCode::create([
       //      'id_trans' => $trans->id,
       //      'kode_tiket' => 'EVC'.$trans->id.Str::random(8),
       //      ]);

  return back()->with('success', 'Data pesanan berhasil dikonfirmasi');
}

public function cancel($id)
{
  $trans = Transaction::find($id);
  $trans->update([
    'verifikasi' => 4,

    ]);

  return back()->with('success', 'Data pesanan berhasil ditolak');
}

public function destroy($id)
{
  $trans = Transaction::find($id);
  $trans->delete();
  return redirect('admin/order')->with('success', 'Data berhasil dihapus');
}
}
