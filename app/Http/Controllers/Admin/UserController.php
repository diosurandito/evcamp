<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Mail;
use DB;

class UserController extends Controller
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
        $visitor = User::orderBy('id','DESC')->get();

        $trans = DB::table('transactions')
       ->join('users', 'users.id', '=', 'transactions.id_user')
       ->join('events', 'events.id', '=', 'transactions.id_event')
       ->join('tickets', 'tickets.id', '=', 'transactions.id_tiket')
       ->select('transactions.*', 'users.nama', 'events.nama_event', 'events.kategori_tiket', 'tickets.harga')
       ->whereNull('transactions.deleted_at')
       ->orderBy('transactions.id','DESC')
       ->get();

       $countTrans = $trans->where('verifikasi', '=', 1)->count();

        return view('pages.admin.visitor', compact('visitor', 'countTrans'));
    }

    public function show($id)
    {
        $visitor = User::find($id)->get();
        
    }

    public function destroy($id)
    {
        $visitor = User::find($id);
        $visitor->delete();
        return redirect('admin/visitor')->with('success', 'Data berhasil dihapus');
    }

    public function reset(Request $request, $id)
    {
        try{
            Mail::send('mails.reset', ['nama' => $request->nama, 'password' => $request->newpassword], function ($message) use ($request)
            {
                $message->subject('Reset Password EVCAMP');
                $message->from('admin@evcamp.site', 'EVCAMP');
                $message->to($request->email);
            });

            $org = User::whereId($id);
            $org->update([
            'password' => hash("sha256", $request->newpassword)

            ]);
            return back()->with('success','Berhasil Reset Password');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
