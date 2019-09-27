<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\PendapatanEvent;
use App\Ticket;
use App\TicketCode;
use App\Transaction;
use App\Campus;
use Auth;
use Storage;
use DB;
use Carbon\Carbon;
use PDF;

class BuatEventController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:organizer');
  }


  public function index()
  {
   $idorg = Auth::user()->id;
   $event = DB::table('events')
   ->join('organizers', 'organizers.id', '=', 'events.id_organizer')
   ->join('campuses', 'campuses.id', '=', 'events.id_campus')
   ->join('tickets', 'tickets.id_event', '=', 'events.id')
   ->select('events.*', 'organizers.nama', 'campuses.nama_kampus', 'tickets.harga', 'tickets.stok_tiket')
   ->whereNull('events.deleted_at')
   ->where('events.id_organizer', '=', $idorg )
   ->orderBy('events.id','DESC')
   ->get();

   return view('pages.organizer.event', compact('event'));
 }


 public function create()
 {
   $campus = Campus::orderBy('nama_kampus','ASC')->get();
   return view('pages.organizer.buatevent', compact('campus'));

 }


 public function store(Request $request)
 {
   $this->validate($request,[

    'banner' => 'image|mimes:jpg,jpeg,png|max:2000'
    ]);
   $banner = $request->file('banner')->store('banner');

   $event = Event::create([
    'id_organizer' => Auth::user()->id,
    'nama_event' => $request->nama_event,
    'deskripsi' => $request->deskripsi,
    'id_campus' => Auth::user()->id_campus,
    'detail_lokasi' => $request->detail_lokasi,
    'kategori_event' => $request->kategori_event,
    'kategori_tiket' => $request->kategori_tiket,
    'banner' => $banner,
    'jumlah' => $request->jumlah,
    'tgl_mulai' => $request->tgl_mulai,
    'tgl_selesai' => $request->tgl_selesai,
    'waktu_mulai' => $request->waktu_mulai,
    'waktu_selesai' => $request->waktu_selesai,
    'tgl_penj_mulai' => $request->tgl_penj_mulai,
    'tgl_penj_selesai' => $request->tgl_penj_selesai,
    'penyelenggara' => $request->penyelenggara,

    ]);


   Ticket::create([
    'id_event' => $event->id,
    'harga' => $request->harga_tiket,
    'harga_fee' => $request->harga_tiket_akhir,
    'kategori_tiket' => $request->kategori_tiket,
    'stok_tiket' => $request->jumlah,


    ]);

   return redirect()->route('organizer.event.index')->with('success', 'Data Event berhasil ditambahkan');
 }

 public function edit($id)
 {
   $idc = Auth::user()->id_campus;
   $kampus = Campus::select('nama_kampus')->where('id', $idc)->first();

   $campus = Campus::orderBy('nama_kampus','ASC')->get();

   $data = Event::findOrFail($id);
   return view('pages.organizer.editevent', compact('data', 'campus', 'kampus'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Event $event)
    {
      $this->validate($request,[

        'banner' => 'image|mimes:jpg,jpeg,png|max:2000'
        ]);
      if ($request->banner) {
       $image_path = $event->banner;
       if (Storage::exists($image_path)) {
         Storage::delete($image_path);
       }
       $banner = $request->file('banner')->store('banner');


       Event::whereId($id)->update([

         'nama_event' => $request->nama_event,
         'deskripsi' => $request->deskripsi,
         'id_campus' => Auth::user()->id_campus,
         'detail_lokasi' => $request->detail_lokasi,
         'kategori_event' => $request->kategori_event,
         'kategori_tiket' => $request->kategori_tiket,
         'banner' => $banner,
         'jumlah' => $request->jumlah,
         'tgl_mulai' => $request->tgl_mulai,
         'tgl_selesai' => $request->tgl_selesai,
         'waktu_mulai' => $request->waktu_mulai,
         'waktu_selesai' => $request->waktu_selesai,
         'tgl_penj_mulai' => $request->tgl_penj_mulai,
         'tgl_penj_selesai' => $request->tgl_penj_selesai,
         'penyelenggara' => $request->penyelenggara,

         ]);
     }else{
      Event::whereId($id)->update([

       'nama_event' => $request->nama_event,
       'deskripsi' => $request->deskripsi,
       'id_campus' => Auth::user()->id_campus,
       'detail_lokasi' => $request->detail_lokasi,
       'kategori_event' => $request->kategori_event,
       'kategori_tiket' => $request->kategori_tiket,
       'jumlah' => $request->jumlah,
       'tgl_mulai' => $request->tgl_mulai,
       'tgl_selesai' => $request->tgl_selesai,
       'waktu_mulai' => $request->waktu_mulai,
       'waktu_selesai' => $request->waktu_selesai,
       'tgl_penj_mulai' => $request->tgl_penj_mulai,
       'tgl_penj_selesai' => $request->tgl_penj_selesai,
       'penyelenggara' => $request->penyelenggara,

       ]);

    }

    Ticket::where('id_event', $id)->update([

     'harga' => $request->harga_tiket,
     'harga_fee' => $request->harga_tiket_akhir,
     'kategori_tiket' => $request->kategori_tiket,
     'stok_tiket' => $request->jumlah,


     ]);

    return redirect()->route('organizer.event.index')->with('success', 'Data Event berhasil diubah');

  }

  public function show($id)
  {

   $idc = Auth::user()->id_campus;
   $kampus = Campus::select('nama_kampus')->where('id', $idc)->first();
   $data = Event::findOrFail($id);
   $trans = Transaction::where('id_event', $data->id)->where('verifikasi', 2)->get();
   return view('pages.organizer.detailevent', compact('data', 'trans', 'kampus'));
 }

 public function showpmsn($id)
 {

   $data = Event::findOrFail($id);
   $pmsn = Transaction::join('users', 'users.id', '=', 'transactions.id_user')
   ->join('events', 'events.id', '=', 'transactions.id_event')
   ->join('tickets', 'tickets.id', '=', 'transactions.id_tiket')
   ->where('transactions.id_event', $data->id)
   ->select('transactions.*', 'users.nama', 'users.email', 'users.no_telp', 'events.nama_event', 'tickets.kategori_tiket', 'tickets.harga')
   ->orderBy('id', 'DESC')->get();
   return view('pages.organizer.pemesanevent', compact('data', 'pmsn'));
 }

 public function showpnjln($id)
 {
  $data = Event::findOrFail($id);
  $penjualan = DB::table('transactions')
  ->join('events', 'transactions.id_event', '=', 'events.id')
  ->join('tickets', 'transactions.id_tiket', '=', 'tickets.id')
  ->select('transactions.*', 'events.nama_event', 'events.jumlah', 'tickets.harga', 'tickets.harga_fee', DB::raw('SUM(transactions.jumlah) as tkt_terjual'), DB::raw('SUM(transactions.jumlah) * tickets.harga_fee as pend_awal'), DB::raw('SUM(transactions.jumlah) * (tickets.harga * 5 / 100) as komisi'), DB::raw('(SUM(transactions.jumlah) * tickets.harga_fee) - (SUM(transactions.jumlah) * (tickets.harga * 5 / 100)) as pend_akhir'))
  ->where('transactions.verifikasi', '=', 2)
  ->where('transactions.id_event', $data->id)
  ->groupBy('transactions.id_event')
  ->get();

  return view('pages.organizer.penjualanevent', compact('data', 'penjualan'));
}

public function showpnjln_cetak($id)
{
  $data = Event::findOrFail($id);
  $penjualan = DB::table('transactions')
  ->join('events', 'transactions.id_event', '=', 'events.id')
  ->join('tickets', 'transactions.id_tiket', '=', 'tickets.id')
  ->select('transactions.*', 'events.nama_event', 'events.jumlah', 'tickets.harga', 'tickets.harga_fee', DB::raw('SUM(transactions.jumlah) as tkt_terjual'), DB::raw('SUM(transactions.jumlah) * tickets.harga_fee as pend_awal'), DB::raw('SUM(transactions.jumlah) * (tickets.harga * 5 / 100) as komisi'), DB::raw('(SUM(transactions.jumlah) * tickets.harga_fee) - (SUM(transactions.jumlah) * (tickets.harga * 5 / 100)) as pend_akhir'))
  ->where('transactions.verifikasi', '=', 2)
  ->where('transactions.id_event', $data->id)
  ->groupBy('transactions.id_event')
  ->get();

  $pdf = PDF::loadview('pages.organizer.penjualanevent_cetak', compact('data', 'penjualan'));
  return $pdf->download('laporan-pendapatan-event');
}

public function showcheck($id)
{

 $data = Event::findOrFail($id);
 $check = Transaction::join('users', 'users.id', '=', 'transactions.id_user')
 ->join('ticket_codes', 'ticket_codes.id_trans', '=', 'transactions.id')
 ->where('transactions.id_event', $data->id)
 ->select('transactions.*', 'users.nama', 'ticket_codes.kode_tiket', 'ticket_codes.nama_peserta','ticket_codes.cek_in')
 ->orderBy('id', 'DESC')->get();
 return view('pages.organizer.checkinevent', compact('data', 'check'));
}

public function showcheck_cetak($id)
{

 $data = Event::findOrFail($id);
 $check = Transaction::join('users', 'users.id', '=', 'transactions.id_user')
 ->join('ticket_codes', 'ticket_codes.id_trans', '=', 'transactions.id')
 ->where('transactions.id_event', $data->id)
 ->select('transactions.*', 'users.nama', 'ticket_codes.kode_tiket', 'ticket_codes.nama_peserta','ticket_codes.cek_in')
 ->orderBy('id', 'DESC')->get();
 $pdf = PDF::loadview('pages.organizer.checkinevent_cetak', compact('data', 'check'));
 return $pdf->download('Laporan-Checkin-Pengunjung-Event');
}

public function checkin($id, $kode_tiket)
{
  $data = Event::findOrFail($id);
  $check = Transaction::join('users', 'users.id', '=', 'transactions.id_user')
  ->join('ticket_codes', 'ticket_codes.id_trans', '=', 'transactions.id')
  ->where('transactions.id_event', $data->id)
  ->select('transactions.*', 'users.nama', 'ticket_codes.kode_tiket', 'ticket_codes.cek_in')
  ->orderBy('id', 'DESC')->get();

  TicketCode::where('kode_tiket', $kode_tiket)->first()->update([
    'cek_in' => DB::raw('now()') ,

    ]);

  return back()->with('success', 'Pengunjung berhasil check-in');
}


public function destroy($id)
{
  $event = Event::find($id);
  $event->delete();
  return redirect('event-saya')->with('success', 'Data Event berhasil dihapus');
}
}
