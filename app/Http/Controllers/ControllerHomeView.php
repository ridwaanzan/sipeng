<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use Redirect;
use Validator;

use App\MasterKaryawan;
use App\MasterJabatan;
use App\User;

class ControllerHomeView extends Controller
{
    public function index()
    {
        $dataKar = MasterKaryawan::where('kode_karyawan', '=', Auth::user()->username);

        return view('home', compact('dataKar'));
    }

    public function profile($kode_karyawan)
    {
    	$master = MasterKaryawan::find($kode_karyawan);
        $jabatan = MasterJabatan::all();

    	if (Auth::user()->level == 1 || Auth::user()->level == 2 || Auth::user()->level == 3) {
    		return view('admin.home.profile-grant', compact('master', 'jabatan'));
    	} else {
    		return view('admin.home.profile', compact('master'));
    	}
    }

    public function loadPass($kode_karyawan)
    {
        $load = User::where('username', '=', $kode_karyawan)->first();

        return view('admin.home.password-update', compact('load'));
    }

    public function updatePass(Request $request, $kode_karyawan)
    {
    	$requestData 	= $request->all();

    	$pesan 			= [
    		'password.required' => 'Form Password haruslah diisi!',
    		'password.min' 		=> 'Password minimal 6 character'
    	];

    	$rules 			= [
    		'password' => 'required|min:6'
    	];

    	$validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return back()->withError($validasi)->withInput();
        } else {
            $user               = User::find($request->id);
            $user->password     = bcrypt($request->password);
            $user->update();

            Session::flash('success', 'Berhasil mengubah password login.');

            return Redirect::back();
        }
    }

}
