<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use App\DataOrganizer;
use DB;
use Mail;

class DataOrganizerController extends Controller
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
        $organizer = DB::table('organizers')->join('campuses', 'organizers.id_campus', '=', 'campuses.id')->select('organizers.*' ,'campuses.nama_kampus')->orderBy('organizers.id','DESC')->get();
        $trans = DB::table('transactions')
       ->join('users', 'users.id', '=', 'transactions.id_user')
       ->join('events', 'events.id', '=', 'transactions.id_event')
       ->join('tickets', 'tickets.id', '=', 'transactions.id_tiket')
       ->select('transactions.*', 'users.nama', 'events.nama_event', 'events.kategori_tiket', 'tickets.harga')
       ->whereNull('transactions.deleted_at')
       ->orderBy('transactions.id','DESC')
       ->get();

       $countTrans = $trans->where('verifikasi', '=', 1)->count();

        return view('pages.admin.organizer', compact('organizer', 'countTrans'));


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
        $organizer = DataOrganizer::find($id)->get();
        
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
        $organizer = DataOrganizer::find($id);
        $organizer->delete();
        return redirect('admin/organizer')->with('success', 'Data berhasil dihapus');
    }

    // public function apiOrganizer()
    // {
    //     $organizer = DataOrganizer::all();
 
    //     return Datatables::of($organizer)
    //         ->addColumn('action', function($organizer){
    //             return '<a href="#" class="btn btn-sm btn-info"><i class="far fa-eye"></i></a> ' .
    //                    '<a onclick="deleteData('. $organizer->id .')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt text-white"></i></a>';
    //         })->make(true);
    // }

    public function reset(Request $request, $id)
    {
        try{
            Mail::send('mails.reset', ['nama' => $request->nama, 'password' => $request->newpassword], function ($message) use ($request)
            {
                $message->subject('Reset Password EVCAMP');
                $message->from('admin@evcamp.site', 'EVCAMP');
                $message->to($request->email);
            });

            $org = DataOrganizer::whereId($id);
            $org->update([
            'password' => bcrypt($request->newpassword),

            ]);
            return back()->with('success','Berhasil Reset Password');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
