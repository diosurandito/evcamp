<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Campus;
use DB;

class CampusController extends Controller
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
        $campus = Campus::orderBy('nama_kampus','ASC')->get();
        $trans = DB::table('transactions')
       ->join('users', 'users.id', '=', 'transactions.id_user')
       ->join('events', 'events.id', '=', 'transactions.id_event')
       ->join('tickets', 'tickets.id', '=', 'transactions.id_tiket')
       ->select('transactions.*', 'users.nama', 'events.nama_event', 'events.kategori_tiket', 'tickets.harga')
       ->whereNull('transactions.deleted_at')
       ->orderBy('transactions.id','DESC')
       ->get();

       $countTrans = $trans->where('verifikasi', '=', 1)->count();
        return view('pages.admin.campus', compact('campus', 'countTrans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.addcampus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Campus::create([
            'nama_kampus' => $request->nama_kampus,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude

            ]);
        return back()->with('success', 'Data berhasil ditambahkan');
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
        $data = Campus::findOrFail($id);
        return view('pages.admin.editcampus', compact('data'));
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
        $campus = Campus::find($id);
        $campus->update([
            'nama_kampus' => $request->nama_kampus,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude

            ]);
        return redirect()->route('admin.campus.index')->with('success', 'Data Kampus berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = Campus::find($id);
        $campus->delete();
        return redirect('admin/campus')->with('success', 'Data berhasil dihapus');
    }
}
