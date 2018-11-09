<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Validator;
use App\MasterJabatan;
use App\MasterDepartemen;

class ControllerMasterJabatan extends Controller
{
    public function index()
    {
        $jabatan    = MasterJabatan::paginate(10);
        $departemen = MasterDepartemen::all();

        return view('admin.jabatan.index', compact('jabatan', 'departemen'));
    }
    public function create()
    {
        $jabatan    = MasterJabatan::all();
        $departemen = MasterDepartemen::all();

        return view('admin.jabatan.create', compact('jabatan', 'departemen'));
    }
    public function store(Request $request)
    {
        $requestData = $request->all();
        $pesan = [
            'kode_jabatan.required'      => 'Kode Jabatan harus diisi.',
            'kode_jabatan.unique'        => 'Kode Jabatan sudah terpakai. Silahkan gunakan Kode Jabatan lainya.',
            'kode_departemen.required'   => 'Kode Departemen harus dipilih',
            'nama_jabatan.required'      => 'Nama Jabatan harus diisi.',
            'golongan.required'          => 'Golongan harus diisi.'
        ];
        $rules = [
            'kode_jabatan'      => 'required|unique:tb_mt_jabatan',
            'kode_departemen'   => 'required',
            'nama_jabatan'      => 'required',
            'golongan'          => 'required'
        ];

        $validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            
            return redirect()->back()->withErrors($validasi)->withInput();

        } else {
            $jabatan = new MasterJabatan;
            $jabatan->kode_jabatan      = $request->kode_jabatan;
            $jabatan->kode_departemen   = $request->kode_departemen;
            $jabatan->nama_jabatan      = $request->nama_jabatan;
            $jabatan->golongan          = $request->golongan;
            $jabatan->save();

            Session::flash('success', 'Berhasil menambahkan data jabatan: '.$request->nama_jabatan);

            return redirect('master-jabatan');
        }
    }
    public function show($kode_jabatan)
    {
        $jabatan        = MasterJabatan::find($kode_jabatan);
        $departemen     = MasterDepartemen::all();

        return view('admin.jabatan.edit', compact('jabatan', 'departemen'));
    }
    public function edit($kode_jabatan)
    {
        $jabatan        = MasterJabatan::find($kode_jabatan);
        $departemen     = MasterDepartemen::all();

        return view('admin.jabatan.edit', compact('jabatan', 'departemen'));
    }
    public function update(Request $request, $kode_jabatan)
    {
        $requestData = $request->all();
        $pesan = [
            'kode_jabatan.required' => 'Kode Jabatan tidak boleh kosong.',
            'nama_jabatan.required'      => 'Nama Jabatan harus diisi.',
            'golongan.required'          => 'Golongan harus diisi.'
        ];

        $rules = [
            'kode_jabatan' => 'required',
            'nama_jabatan' => 'required'
        ];

        $validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return redirect()->withErrors($validasi)->back();
        } else {
            $jabatan = MasterJabatan::find($kode_jabatan);
            $jabatan->kode_departemen   = $request->kode_departemen;
            $jabatan->nama_jabatan      = $request->nama_jabatan;
            $jabatan->golongan          = $request->golongan;
            $jabatan->save();

            Session::flash('success', 'Berhasil merubah data jabatan dengan kode jabatan: '.$jabatan->kode_jabatan);

            return redirect('master-jabatan');
        }
    }
    public function destroy($kode_jabatan)
    {
        MasterJabatan::destroy($kode_jabatan);

        Session::flash('success', 'Berhasil menghapus data jabatan, dengan kode jabatan: '.$kode_jabatan);

        return redirect('master-jabatan');
    }
}
