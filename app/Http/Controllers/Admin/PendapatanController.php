<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pendapatan;
use DB;
use PDF;

class PendapatanController extends Controller
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
        $pendapatan = DB::table('transactions')
        ->join('events', 'transactions.id_event', '=', 'events.id')
        ->join('tickets', 'transactions.id_tiket', '=', 'tickets.id')
        ->select('transactions.*', 'events.nama_event', 'tickets.harga','tickets.harga_fee', DB::raw('SUM(transactions.jumlah) as tkt_terjual'), DB::raw('SUM(transactions.jumlah) * tickets.harga_fee as pend_awal'), DB::raw('SUM(transactions.jumlah) * (tickets.harga * 5 / 100) as komisi'), DB::raw('(SUM(transactions.jumlah) * tickets.harga_fee) - (SUM(transactions.jumlah) * (tickets.harga * 5 / 100)) as pend_akhir'))
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

        return view('pages.admin.pendapatan', compact('pendapatan', 'countTrans'));
    }

    public function cetak()
    {
        $pendapatan = DB::table('transactions')
        ->join('events', 'transactions.id_event', '=', 'events.id')
        ->join('tickets', 'transactions.id_tiket', '=', 'tickets.id')
        ->select('transactions.*', 'events.nama_event', 'tickets.harga','tickets.harga_fee', DB::raw('SUM(transactions.jumlah) as tkt_terjual'), DB::raw('SUM(transactions.jumlah) * tickets.harga_fee as pend_awal'), DB::raw('SUM(transactions.jumlah) * (tickets.harga * 5 / 100) as komisi'), DB::raw('(SUM(transactions.jumlah) * tickets.harga_fee) - (SUM(transactions.jumlah) * (tickets.harga * 5 / 100)) as pend_akhir'))
        ->where('transactions.verifikasi', '=', 2)
        ->groupBy('transactions.id_event')
        ->get();
        
        $pdf = PDF::loadview('pages.admin.pendapatan_cetak', compact('pendapatan'));
        return $pdf->download('laporan-pendapatan-EVCAMP');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
