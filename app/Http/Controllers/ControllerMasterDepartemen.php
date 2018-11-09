<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Validator;
use App\MasterDepartemen;

class ControllerMasterDepartemen extends Controller
{
    public function index()
    {
        $departemen = MasterDepartemen::paginate(10);

        return view('admin.departemen.index', compact('departemen'));
    }
    public function create()
    {
        return view('admin.departemen.create');
    }
    public function store(Request $request)
    {
        $requestData = $request->all();
        $pesan = [
            'kode_departemen.required' => 'Kode Departemen harus diisi.',
            'kode_departemen.unique' => 'Kode Departemen sudah terpakai. Silahkan gunakan kode departemen lain.',
            'nama_departemen.required' => 'Nama Departemen harus diisi.'
        ];

        $rules = [
            'kode_departemen' => 'required|unique:tb_mt_departemen',
            'nama_departemen' => 'required'
        ];

        $validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi);
        } else {
            $departemen = new MasterDepartemen;
            $departemen->kode_departemen = $request->kode_departemen;
            $departemen->nama_departemen = $request->nama_departemen;
            $departemen->save();

            Session::flash('success', 'Berhasil menambah data departemen.');

            return redirect('master-departemen');
        }
    }
    public function show($kode_departemen)
    {
        $departemen = MasterDepartemen::find($kode_departemen);

        return view('admin.departemen.edit', compact('departemen'));
    }
    public function edit($kode_departemen)
    {
        $departemen = MasterDepartemen::find($kode_departemen);

        return view('admin.departemen.edit', compact('departemen'));
    }
    public function update(Request $request, $kode_departemen)
    {
        $requestData = $request->all();
        $rules = [
            'kode_departemen' => 'required',
            'nama_departemen' => 'required'
        ];

        $validasi = Validator::make($requestData, $rules);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi);
        } else {
            $departemen = MasterDepartemen::find($kode_departemen);
            $departemen->kode_departemen = $request->kode_departemen;
            $departemen->nama_departemen = $request->nama_departemen;
            $departemen->save();

            Session::flash('success', 'Berhasil merubah data departemen.');

            return redirect('master-departemen');
        }        
    }
    public function destroy($kode_departemen)
    {
        MasterDepartemen::destroy($kode_departemen);

        Session::flash('success', 'Berhasil menghapus data departemen');

        return redirect('master-departemen');
    }
}
