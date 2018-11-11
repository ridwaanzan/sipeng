<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Validator;
use Auth;
use DB;
use App\MasterKaryawan;
use App\MasterDepartemen;
use App\MasterJabatan;
use App\MasterAbsensi;
use App\DataKaryawan;
use App\DataTunKaryawan;
use App\User;

class ControllerMasterKaryawan extends Controller
{
    public function index()
    {
        $masterKaryawan = MasterKaryawan::paginate(10);

        return view('admin.karyawan.index', compact('masterKaryawan'));
    }
    public function create()
    {
        $jabatan        = MasterJabatan::all();
        $departemen     = MasterDepartemen::all();
        $countKar 		= MasterKaryawan::all()->count();

        if ($countKar >= 1) {
	        $counting       = MasterKaryawan::orderBy('kode_karyawan', 'DESC')->first();
	        $counting 		= substr($counting->kode_karyawan, -3);
	        if ($counting >= '009') {
	            $counting       = $counting + 1;
	            $countingHasil  = "KRY-0".$counting;
	        } 
	        elseif ($counting >= '099') {
	            $counting       = $counting + 1;
	            $countingHasil  = "KRY-".$counting;
	        } 
	        elseif ($counting >= '999') {
	            $counting       = $counting + 1;
	            $countingHasil  = "KRY-".$counting;
	        } 
	        else {
	            $counting       = $counting + 1;
	            $countingHasil  = "KRY-00".$counting;
	        }
        } else {
        	$countingHasil 		= "KRY-001";
        }

        return view('admin.karyawan.create-master', compact('jabatan', 'departemen', 'countingHasil'));
    }
    public function store(Request $request)
    {
        $requestData    = $request->all();

         $pesan = [
            'nama_karyawan.required' => 'Form Nama Karyawan harus diisi!',
            'nama_karyawan.alpha_dash' => 'Form Nama Karyawan harus alphabhetic character!',
            'kode_jabatan.required' => 'Form Kode Jabatan harus dipilih!',
            'alamat.required' => 'Form Alamat wajib diisi!',
            'kota.required' => 'Form Kota harus diisi!',
            'kota.regex' => 'Form Kota harus alphabhetic character!',
            'provinsi.required' => 'Form Provinsi harus diisi!',
            'provinsi.alpha_dash' => 'Form Kota harus alphabhetic character!',
            'kode_pos.required' => 'Form Kode Pos wajib diisi!',
            'negara.required' => 'Form Negara harus diisi!',
            'email.required' => 'Form Email wajib diisi!',
            'email.email' => 'Form Email wajib isi email!',
            'no_rekening.required' => 'Form No. Rekening harus diisi!',
            'an.required' => 'Form A/n Harus diisi!',
            'an.regex' => 'Periksa kembali Form A/n Harus alphabhetic!'
        ];
        
        $rules          = [
            'kode_karyawan' => 'required', 
            'kode_jabatan' => 'required', 
            'nama_karyawan' => 'required|regex:/^[a-zA-Z]+$/|max:50', 
            'alamat' => 'required',
            'kota' => 'required|regex:/^[a-zA-Z]+$/u|max:50', 
            'provinsi' => 'required|not_regex:/^[\pL\s]+$/u|max:50', 
            'kode_pos' => 'required', 
            'negara' => 'required', 
            'email' => 'required|email', 
            'no_rekening' => 'required', 
            'an' => 'required|not_regex:/^[\pL\s]+$/u|max:50', 
            'bank' => 'required', 
            'status' => 'required'
        ];

        $validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi)->withInput();
        } else {
            $master = new MasterKaryawan;
            $master->kode_karyawan  = $request->kode_karyawan;  
            $master->kode_jabatan   = $request->kode_jabatan;
            $master->nama_karyawan  = $request->nama_karyawan;  
            $master->alamat         = $request->alamat;
            $master->kota           = $request->kota;           
            $master->provinsi       = $request->provinsi;
            $master->kode_pos       = $request->kode_pos;       
            $master->negara         = $request->negara;
            $master->email          = $request->email;          
            $master->no_rekening    = $request->no_rekening;
            $master->an             = $request->an;             
            $master->bank           = $request->bank;
            $master->keterangan     = $request->keterangan;     
            $master->status         = $request->status;
            $master->email          = $request->email;          
            $master->no_rekening    = $request->no_rekening;
            if (Auth::check()) {
                $master->create_by = $request->username;
            } else {
                $master->create_by  = "Guest";
            }

            $master->save();

            $user = new User;
            $user->name         = $request->nama_karyawan;
            $user->username     = $request->kode_karyawan;
            $user->email        = $request->email;
            $user->password     = bcrypt("123456");
            $user->level        = '2';
            $user->save();

            Session::flash('success', 'Berhasil menambahkan data master karyawan: '.$request->nama_karyawan);

            return redirect('master-karyawan/gajian/'.$request->kode_karyawan);
        }
    }
    public function show($kode_karyawan)
    {
        $master         = MasterKaryawan::find($kode_karyawan);
        $jabatan        = MasterJabatan::all();
        $departemen     = MasterDepartemen::all();

        return view('admin.karyawan.edit-master', compact('master', 'jabatan', 'departemen'));
    }
    public function edit($kode_karyawan)
    {
        $master         = MasterKaryawan::find($kode_karyawan);
        $jabatan        = MasterJabatan::all();
        $departemen     = MasterDepartemen::all();

        return view('admin.karyawan.edit-master', compact('master', 'jabatan', 'departemen'));
    }
    public function update(Request $request, $kode_karyawan)
    {
        $requestData    = $request->all();
        $pesan = [
            'kode_karyawan.required' => 'Form Kode Karyawan wajib diisi!',
            'nama_karyawan.required' => 'Form Nama Karyawan Wajib diisi!',
            'alamat.required' => 'Form Alamat wajib diisi!',
            'kota.required' => 'Form Kota harus diisi!',
            'provinsi.required' => 'Form Provinsi harus diisi!',
            'kode_pos.required' => 'Form Kode Pos harus diisi!',
            'negara.required' => 'Form Negara harus diisi!',
            'email.required' => 'Form Email wajib diisi!',
            'no_rekening.required' => 'Form No. Rekening harus diisi!',
            'an.required' => 'Form A/n Harus diisi!'    
        ];
        $rules          = [
            'kode_karyawan' => 'required', 'kode_jabatan' => 'required', 'nama_karyawan' => 'required', 'alamat' => 'required', 
            'kota' => 'required', 'kota' => 'required', 'provinsi' => 'required', 'kode_pos' => 'required', 
            'negara' => 'required', 'email' => 'required|email', 'no_rekening' => 'required', 
            'an' => 'required', 'bank' => 'required', 'status' => 'required'
        ];

        $validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi)->withInput();
        } else {
            $master = MasterKaryawan::find($kode_karyawan);
            $master->kode_karyawan  = $request->kode_karyawan;  $master->kode_jabatan   = $request->kode_jabatan;
            $master->nama_karyawan  = $request->nama_karyawan;  $master->alamat         = $request->alamat;
            $master->kota           = $request->kota;           $master->provinsi       = $request->provinsi;
            $master->kode_pos       = $request->kode_pos;       $master->negara         = $request->negara;
            $master->email          = $request->email;          $master->no_rekening    = $request->no_rekening;
            $master->an             = $request->an;             $master->bank           = $request->bank;
            $master->keterangan     = $request->keterangan;     $master->status         = $request->status;
            $master->email          = $request->email;          $master->no_rekening    = $request->no_rekening;
            if (Auth::check()) {
                $master->create_by  = $request->username;
            } else 
            {
                $master->create_by  = "Guest";
            }
            
            $master->save();

            Session::flash('success', 'Berhasil update data karyawan: '.$request->kode_karyawan);

            return Redirect::back();
        }
    }
    public function destroy($kode_karyawan)
    {
        $tunjangan = DataTunKaryawan::where('kode_karyawan', '=', $kode_karyawan)->get();
        if ($tunjangan->count() >= 1) {
            foreach ($tunjangan as $items) {
                DataTunKaryawan::destroy($items->id);
            }
        } 

        DataKaryawan::destroy($kode_karyawan);
        MasterKaryawan::destroy($kode_karyawan);
        
        $absen = MasterAbsensi::where('kode_karyawan', '=', $kode_karyawan)->get();
        if ($absen->count() >= 1) {
            foreach($absen as $absen) {
                MasterAbsensi::destroy($absen->id);
            }
        } else {
            $user = User::where('username', '=', $kode_karyawan)->first();
            if (User::destroy($user->id)) {
                Session::flash('success', 'Berhasil menghapus data karyawan');
            } else {
                Session::flash('alert', 'Gagal menghapus data karyawan pada table User');
            }
        }

        return redirect('master-karyawan');
    }
}
