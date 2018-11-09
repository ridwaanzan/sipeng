<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Validator;
use Redirect;
use Auth;
use DB;

use App\MasterTransaksi;
use App\MasterAbsensi;
use App\MasterGajian;

class ControllerMasterTransaksi extends Controller
{
    public function index()
    {
    	$mTransaksi = MasterTransaksi::paginate(10);

    	return view('admin.transaksi.index', compact('mTransaksi'));
    }

    public function create()
    {
    	$kode_transaksi = 'TRS'.date('dmY');
    	return view('admin.transaksi.create', compact('kode_transaksi'));
    }

    public function store(Request $request)
    {
    	$requestData = $request->all();

    	$pesan = array(
            'kode_transaksi.required'   => 'Kesalahan system, kode transaksi tidak dapat digenerate.',
            'kode_transaksi.unique'   => 'Kode Transaksi sudah ada. Silahkan Hapus dahulu transaksi dengan kode tersebut.',
    		'tgl_transaksi.required' 	=> 'Tanggal transaksi harus diisi.',
    		'status.required'		 	=> 'Status Transaksi harus dipilih'
    	);

    	$rules = [
    		'kode_transaksi' 	=> 'required|unique:tb_mt_transaksi',
    		'tgl_transaksi' 	=> 'required',
    		'status'		 	=> 'required'
    	];

    	$validasi = Validator::make($requestData, $rules, $pesan);

    	if ($validasi->fails()) {
    		return Redirect::back()->withErrors($validasi)->withInput();
    	} else {
    		$mTransaksi 				= new MasterTransaksi;
    		$mTransaksi->kode_transaksi = $request->kode_transaksi;
    		$mTransaksi->tgl_transaksi 	= $request->tgl_transaksi;
    		$mTransaksi->keterangan 	= $request->keterangan;
    		$mTransaksi->status 		= $request->status;
    		$mTransaksi->save();

    		Session::flash('success', 'Berhasil! Silahkan import file absensi.');

    		return redirect('absensi/'.$request->kode_transaksi);
    	}
    }

    public function show($kode_transaksi)
    {
    	$transaksi = MasterTransaksi::find($kode_transaksi);

    	return view('admin.transaksi.edit', compact('transaksi'));
    }

    public function edit($kode_transaksi)
    {
    	$transaksi = MasterTransaksi::find($kode_transaksi);

    	return view('admin.transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $kode_transaksi)
    {
    	$requestData = $request->all();

    	$pesan = array(
    		'kode_transaksi.required' 	=> 'Kesalahan system, kode transaksi tidak dapat digenerate.',
    		'tgl_transaksi.required' 	=> 'Tanggal transaksi harus diisi.',
    		'status.required'		 	=> 'Status Transaksi harus dipilih'
    	);

    	$rules = [
    		'kode_transaksi' 	=> 'required',
    		'tgl_transaksi' 	=> 'required',
    		'status'		 	=> 'required'
    	];

    	$validasi = Validator::make($requestData, $rules, $pesan);

    	if ($validasi->fails()) {
    		return Redirect::back()->withErrors($validasi)->withInput();
    	} else {
    		$mTransaksi 				= MasterTransaksi::find($kode_transaksi);
    		$mTransaksi->tgl_transaksi 	= $request->tgl_transaksi;
    		$mTransaksi->keterangan 	= $request->keterangan;
    		$mTransaksi->status 		= $request->status;
    		$mTransaksi->save();

    		Session::flash('success', 'Berhasil merubah data Master Transaksi: '.$kode_transaksi);

    		return redirect('master-transaksi');
    	}
    }

    public function destroy($kode_transaksi)
    {
        $absensi = MasterAbsensi::where('kode_transaksi', '=', $kode_transaksi)->get();
        $gajian  = MasterGajian::where('kode_transaksi', '=', $kode_transaksi)->get();


        if ($absensi->count() >= 1) {
            foreach ($absensi as $absen) {
                MasterAbsensi::destroy($absen->id);
            }
        }

        if ($gajian->count() >= 1) {
            foreach ($gajian as $item) {
                MasterGajian::destroy($item->kode_transaksi.$item->kode_karyawan);
            }
        }
    	MasterTransaksi::destroy($kode_transaksi);

    	Session::flash('success', 'Berhasil menghapus data master Transaksi');

    	return redirect('master-transaksi');
    }

}
