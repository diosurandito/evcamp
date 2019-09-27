<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataOrganizer;
use App\Campus;
use Auth;
use Storage;
use DB;
use Hash;
use Validator;


class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:organizer');
    }

    public function edit()
    {

 	   $idorg = Auth::user()->id;
 	   
     $idc = Auth::user()->id_campus;
       $kampus = Campus::select('nama_kampus')->where('id', $idc)->first();
       $data = DataOrganizer::findOrFail($idorg);
        return view('pages.organizer.profil', compact('data', 'kampus'));
    }

    public function update(Request $request, DataOrganizer $organizer)
    {
    	$idorg = Auth::user()->id;

        $this->validate($request,[
          
          'foto' => 'image|mimes:jpg,jpeg,png|max:2048',
          'foto_ktm' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
        if ($request->foto) {
          $foto_path = $organizer->foto;
         if (Storage::exists($foto_path)) {
           Storage::delete($foto_path);
         }
         $foto = $request->file('foto')->store('foto');
          if ($request->foto_ktm) {
            $foto_ktm_path = $organizer->foto_ktm;
           if (Storage::exists($foto_ktm_path)) {
             Storage::delete($foto_ktm_path);
           }
             $foto_ktm = $request->file('foto_ktm')->store('foto_ktm');
             DataOrganizer::whereId($idorg)->update([

                'nama' => $request->nama,
                'foto' => $foto,
                'foto_ktm' => $foto_ktm,
                'no_telp' => $request->no_telp,
                'nama_bank' => $request->nama_bank,
                'nama_akun' => $request->nama_akun,
                'no_rek' => $request->no_rek,
                

                ]);
          }else {
            DataOrganizer::whereId($idorg)->update([

               'nama' => $request->nama,
               'foto' => $foto,
               'no_telp' => $request->no_telp,
               'nama_bank' => $request->nama_bank,
               'nama_akun' => $request->nama_akun,
               'no_rek' => $request->no_rek,
               
               ]);
          }
	    }elseif ($request->foto_ktm) {
	        $foto_ktm_path = $organizer->foto_ktm;
	        if (Storage::exists($foto_ktm_path)) {
	          Storage::delete($foto_ktm_path);
	        }
          $foto_ktm = $request->file('foto_ktm')->store('foto_ktm');
            
            DataOrganizer::whereId($idorg)->update([

               'nama' => $request->nama,
               'foto_ktm' => $foto_ktm,
               'no_telp' => $request->no_telp,
               'nama_bank' => $request->nama_bank,
               'nama_akun' => $request->nama_akun,
               'no_rek' => $request->no_rek,
               
               ]);

          
	    }else{
	    	DataOrganizer::whereId($idorg)->update([

	            'nama' => $request->nama,
	            'no_telp' => $request->no_telp,
              'nama_bank' => $request->nama_bank,
              'nama_akun' => $request->nama_akun,
              'no_rek' => $request->no_rek,
	            

	            ]);

	    }

        return redirect()->route('organizer.profil')->with('success', 'Profil Anda berhasil diubah');
        
    }

    public function editrek()
    {
      $idorg = Auth::user()->id;
      $data = DataOrganizer::findOrFail($idorg);
        return view('pages.organizer.profilrek', compact('data'));
    }

    public function updaterek(Request $request, DataOrganizer $organizer)
    {
      $idorg = Auth::user()->id;
        DataOrganizer::whereId($idorg)->update([
              'nama_bank' => $request->nama_bank,
              'nama_akun' => $request->nama_akun,
              'no_rek' => $request->no_rek,

              ]);

        return redirect()->route('organizer.profilrek')->with('success', 'Data Rekening Anda Berhasil Diubah');
        
    }

    public function changepass()
    {
        return view('pages.organizer.profilubahpass');
    }
 
    /**
     * @return mixed Redirect
     */
    public function updatepass()
    {
        // custom validator
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, \Auth::user()->password);
        });
 
        // message for custom validation
        $messages = [
            'password' => 'Password sekarang tidak cocok.',
        ];
 
        // validate form
        $validator = Validator::make(request()->all(), [
            'current_password'      => 'required|password',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
 
        ], $messages);
 
        // if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
 
        // update password
        $user = DataOrganizer::find(Auth::id());
 
        $user->password = bcrypt(request('password'));
        $user->save();
 
        return redirect()
            ->route('organizer.password.change')
            ->withSuccess('Password berhasil diubah.');
    }
}
   
