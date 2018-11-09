<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Validator;
use DB;
use App\MasterTunjangan;
use App\DataTunKaryawan;
use App\MasterKaryawan;

class ControllerTunKaryawan extends Controller
{
    public function create($kode_karyawan)
    {
        $tunjangan     = MasterTunjangan::all();
        $karyawan      = MasterKaryawan::find($kode_karyawan);
        $listtunjangan = DataTunKaryawan::where('kode_karyawan', '=', $kode_karyawan)->get();

        return view('admin.tunjangan.create-karyawan', compact('tunjangan', 'karyawan', 'listtunjangan'));
    }
    public function store(Request $request)
    {
        $requestData    = $request->all();
        $rules          = [
            'kode_karyawan' => 'required',
            'kode_tunjangan' => 'required',
            'jumlah' => 'required'
        ];
        $validasi = Validator::make($requestData, $rules);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi)->withInput();
        } else {
            $tunjanganKaryawan = new DataTunKaryawan;
            $tunjanganKaryawan->kode_karyawan   = $request->kode_karyawan;
            $tunjanganKaryawan->kode_tunjangan  = $request->kode_tunjangan;
            $tunjanganKaryawan->jumlah          = $request->jumlah;
            $tunjanganKaryawan->save();

            Session::flash('success', 'Berhasil menambahkan tunjangan untuk karyawan: '.$request->kode_karyawan);

            return redirect('master-karyawan/tunjangan/'.$request->kode_karyawan);
        }
    }
    public function show($kode_karyawan)
    {
        $tunjangan     = MasterTunjangan::all();
        $karyawan      = MasterKaryawan::find($kode_karyawan);
        $listtunjangan = DataTunKaryawan::where('kode_karyawan', '=', $kode_karyawan)->get();

        return view('admin.tunjangan.create-karyawan', compact('tunjangan', 'karyawan', 'listtunjangan'));
    }
    public function edit($id)
    {
        $list           = DataTunKaryawan::find($id);
        $tunjangan      = MasterTunjangan::all();

        return view('admin.tunjangan.edit-karyawan', compact('tunjangan', 'list'));
    }
    public function update(Request $request, $id)
    {
        $requestData    = $request->all();
        $rules          = [
            'kode_karyawan' => 'required',
            'kode_tunjangan' => 'required',
            'jumlah' => 'required'
        ];
        $validasi = Validator::make($requestData, $rules);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi)->withInput();
        } else {
            $tunjanganKaryawan = DataTunKaryawan::find($id);
            $tunjanganKaryawan->kode_karyawan   = $request->kode_karyawan;
            $tunjanganKaryawan->kode_tunjangan  = $request->kode_tunjangan;
            $tunjanganKaryawan->jumlah          = $request->jumlah;
            $tunjanganKaryawan->save();

            Session::flash('success', 'Berhasil merubah data tunjangan untuk karyawan: '.$request->kode_karyawan);

            return redirect('master-karyawan/tunjangan/'.$request->kode_karyawan);
        }
    }
    public function destroy($id)
    {
        DataTunKaryawan::destroy($id);

        Session::flash('success', 'Berhasil menghapus data tunjangan Karyawan.');

        return redirect()->back();
    }
}
