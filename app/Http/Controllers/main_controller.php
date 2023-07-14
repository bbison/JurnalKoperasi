<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profil;
use App\Models\rekening;
use Illuminate\Support\Facades\Auth;

class main_controller extends Controller
{
    public function index()
    {
        return view('login',[
            'profil'=>profil::find(1)
        ]);
    }
    public function Login(Request $request)
    {
        $auth = auth::attempt([
            'id'=>$request->input('id'),
            'password'=>$request->input('password')
        ]);


        if($auth){
            return redirect()->intended('/profile');
        }
        else{
            return back()->with('pesan', 'GAGAL Silahkan Cek Id Dan Password Anda')->withInput();
        }
       
       
        
    }
    public function profile()
    {
        return view('profile.index',[
            'profil'=>profil::find(1)
        ]);
    }
    public function updateprofile()
    {
        return view('profile.edit',[
            'profil'=>profil::find(1)
        ]);
    }

    public function prosesupdate(Request $request)
    {
        $valid = $request->validate([
            'nama_koperasi'=>['required'],
            'logo'=>['image'],
            'alamat'=>['required'],
            'telepon'=>['required'],
            'ketua'=>['required'],
            'wakil_ketua'=>['required'],
            'sekertaris'=>['required'],
            'bendahara'=>['required'],
        ]);
        if(!$valid){
            return back()->with('pesan', 'Isi Semua Data Dengan Benar');
        }
        $cekdata = profil::find(1);
        $cekdata->update($valid);

        $cek_foto_lama = $cekdata->logo;

        if($request->file('logo') == null){
            // $cekdata->update([
            //     'logo'=> $request->file('logo')->store('/')
            // ]);
        }

        elseif($cek_foto_lama == 'koperasi-1.png'){
            $cekdata->update([
                'logo'=> $request->file('logo')->store('/')
            ]);
        }
        else{
            if(url('') == "http://127.0.0.1:8000")
                {
                    File :: delete('/logo/'.profil::find($id)->logo);

                }
            else{
                File :: delete('/public/logo/'.profil::find($id)->logo);
            }
          
                $cekdata->update([
                    'logo'=> $request->file('logo')->store('/')
                ]);
        }
       


        return back()->with('pesan', 'Berhasil Update Profile');
    }
    public function updatepassword()
    {
        return view('profile.updatepassword',[
            'profil'=>profil::find(1)
        ]);
    }
    public function logicupdatepassword(Request $request)
    {
        if(Hash::check($request->password_lama, auth()->user()->password)){
            if($request->password_baru == ""){
                return back()->with('pesan', 'Masukan Password Baru');
            }
            User::find(auth()->user()->id)->update([
                'password'=> bcrypt($request->password_baru)
            ]);
            return back()->with('pesan', 'Password Berhasil Di Update');
        }
        else{
            return back()->with('pesan', 'Password Lama Salah');
        }
        
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        
    }
    public function inputsaldoawal()
    {
        return view('inputSaldoAwal',[
            'profil'=>profil::find(1),
            'rekenings'=>rekening::all()
        ]);
    }
    public function prosesinputsaldoawal(Request $request)
    {
      rekening::where('kode_rekening', $request->kode_rekening)->first()->update([
        'saldo'=>$request->saldo
      ]);

      return back()->with('Berhasil', 'Berhasil Input Saldo Saldo');
    }
}

