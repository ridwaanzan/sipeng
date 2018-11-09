<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Validator;
use App\MasterTunjangan;
use App\DataTunKaryawan;

class ControllerMasterTunjangan extends Controller
{
    public function index()
    {
        $tunjangan = MasterTunjangan::paginate(10);

        return view('admin.tunjangan.index-master', compact('tunjangan'));
    }
    public function create()
    {
        return view('admin.tunjangan.create-master');
    }
    public function store(Request $request)
    {
        $requestData    = $request->all();

        $pesan          = [
            'kode_tunjangan.required' => 'Kode Tunjangan haruslah diisi.',
            'kode_tunjangan.unique' => 'Kode Tunjangan sudah ada.',
            'nama_tunjangan.required' => 'Nama Tunjangan haruslah diisi.',
            'nama_tunjangan.alpha' => 'Nama Tunjangan haruslah alphabetic character.',
            'status.required' => 'Status haruslah dipilih.'
        ];

        $rules          = [
            'kode_tunjangan' => 'required|unique:tb_mt_tunjangan',
            'nama_tunjangan' => 'required|alpha',
            'status' => 'required'
        ];

        if ($request->status == 5) {
            Session::flash('alert', 'Gagal, status haruslah dipilih.');

            return back()->withInput();
        } else {
            $validasi = Validator::make($requestData, $rules, $pesan);

            if ($validasi->fails()) {
                return Redirect::back()->withErrors($validasi)->withInput();
            } else {
                $tunjangan = new MasterTunjangan;
                $tunjangan->kode_tunjangan  = $request->kode_tunjangan;
                $tunjangan->nama_tunjangan  = $request->nama_tunjangan;
                $tunjangan->status          = $request->status;
                $tunjangan->save();

                Session::flash('success', 'Berhasil menambahkan data tunjangan: '.$request->nama_tunjangan);

                return redirect('master-tunjangan');
            }
        }

    }
    public function show($kode_tunjangan)
    {
        $tunjangan = MasterTunjangan::find($kode_tunjangan);

        return view('admin.tunjangan.edit-master', compact('tunjangan'));
    }
    public function edit($id)
    {
        $tunjangan = MasterTunjangan::find($kode_tunjangan);

        return view('admin.tunjangan.edit-master', compact('tunjangan'));
    }
    public function update(Request $request, $kode_tunjangan)
    {
        $requestData    = $request->all();
        $rules          = [
            'kode_tunjangan' => 'required',
            'nama_tunjangan' => 'required',
            'status' => 'required'
        ];

        $validasi = Validator::make($requestData, $rules);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi)->withInput();
        } else {
            $tunjangan                  = MasterTunjangan::find($kode_tunjangan);
            $tunjangan->kode_tunjangan  = $request->kode_tunjangan;
            $tunjangan->nama_tunjangan  = $request->nama_tunjangan;
            $tunjangan->status          = $request->status;
            $tunjangan->save();

            Session::flash('success', 'Berhasil menambahkan data tunjangan: '.$request->nama_tunjangan);

            return redirect('master-tunjangan');
        }
    }
    public function destroy($kode_tunjangan)
    {
        MasterTunjangan::destroy($kode_tunjangan);

        Session::flash('success', 'Berhasil menghapus master data tunjangan, dengan kode: '.$kode_tunjangan);

        return redirect('master-tunjangan');
    }
}