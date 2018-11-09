<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Validator;
use App\MasterKaryawan;
use App\DataKaryawan;
use App\MasterJabatan;

class ControllerDataKaryawan extends Controller
{
    public function store(Request $request)
    {
        $requestData = $request->all();

        $pesan = [
            'kode_karyawan.required' => 'Form Kode Karyawan wajib diisi!',
            'kode_jabatan.required' => 'Form Kode Jabatan wajib terisi! Silahkan edit data Master Karyawan untuk memilih jabatan!',
            'kode_jabatan.numeric' => 'Form Kode Jabatan wajib terisi! Silahkan edit data Master Karyawan untuk memilih jabatan!',
            'gaji_pokok.required' => 'Form Gaji Pokok wajib diisi!',
            'tgl_masuk.required' => 'Form Tanggal Masuk wajib diisi! Format YYYY/MM/DD. Ex: 2017/05/23',
            'approve_by.required' => 'Form Approved By wajib dipilih!',
            'approve_by.numeric' => 'Form Approved By wajib dipilih!',
            'status.required' => 'Form Status wajib dipilih',
            'status.numeric' => 'Form Status wajib dipilih'
        ];

        $rules = [
            'kode_karyawan' => 'required',
            'kode_jabatan' => 'required',
            'gaji_pokok' => 'required',
            'tgl_masuk' => 'required',
            'approve_by' => 'required|numeric',
            'status' => 'required|numeric'
        ];

        $validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi)->withInput();
        } else {
            $gajian = new DataKaryawan;
            $gajian->kode_karyawan      = $request->kode_karyawan;
            $gajian->kode_jabatan       = $request->kode_jabatan;
            $gajian->gaji_pokok         = $request->gaji_pokok;
            $gajian->tgl_masuk          = $request->tgl_masuk;
            $gajian->status             = $request->status;
            $gajian->approve_by         = $request->approve_by;
            $gajian->save();

            Session::flash('success', 'Berhasil menambah data Karyawan.');

            return redirect('master-karyawan/tunjangan/'.$request->kode_karyawan);
        }
    }

    public function show($kode_karyawan)
    {
        $master         = MasterKaryawan::find($kode_karyawan);
        $jabatan        = MasterJabatan::all();
        $kode_karyawan  = $kode_karyawan;

        return view('admin.karyawan.gajian-index', compact('master', 'jabatan', 'kode_karyawan'));
    }

    public function edit($kode_karyawan)
    {
        $master         = MasterKaryawan::find($kode_karyawan);
        $gaji           = DataKaryawan::find($kode_karyawan);
        $jabatan        = MasterJabatan::all();
        $kode_karyawan  = $kode_karyawan;

        if(!$gaji)
            return view('admin.karyawan.gajian-index', compact('master', 'gaji', 'jabatan', 'kode_karyawan'));
        else {
            return view('admin.karyawan.gajian-edit', compact('master', 'gaji', 'jabatan', 'kode_karyawan'));
        }
    }

    public function update(Request $request, $kode_karyawan)
    {
        $requestData = $request->all();

        $pesan = [
            'kode_karyawan.required' => 'Form Kode Karyawan wajib diisi!',
            'kode_jabatan.required' => 'Form Kode Jabatan wajib terisi! Silahkan edit data Master Karyawan untuk memilih jabatan!',
            'gaji_pokok.required' => 'Form Gaji Pokok wajib diisi!',
            'tgl_masuk.required' => 'Form Tanggal Masuk wajib diisi! Format YYYY/MM/DD. Ex: 2017/05/23',
            'approve_by.required' => 'Form Approved By wajib dipilih!',
            'status.required' => 'Form Status wajib dipilih'
        ];

        $rules = [
            'kode_karyawan' => 'required',
            'kode_jabatan' => 'required',
            'gaji_pokok' => 'required',
            'tgl_masuk' => 'required',
            'approve_by' => 'required|numeric',
            'status' => 'required|numeric'
        ];

        $validasi = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return Redirect::back()->withErrors($validasi)->withInput();
        } else {
            if ($request->status == 2) {
                $gajian = DataKaryawan::find($kode_karyawan);
                $gajian->kode_jabatan       = $request->kode_jabatan;
                $gajian->gaji_pokok         = $request->gaji_pokok;
                $gajian->tgl_masuk          = $request->tgl_masuk;
                $gajian->tgl_resign         = $request->tgl_resign;
                $gajian->tgl_kenaikan       = $request->tgl_kenaikan;
                $gajian->status             = $request->status;
                $gajian->approve_by         = $request->approve_by;
                $gajian->save();

                Session::flash('success', 'Masukan data gaji yang baru untuk data Karyawan yang baru dirubah.');

                return redirect('master-karyawan/gajian/'.$kode_karyawan.'/edit');
            } elseif($request->status == 1) {
                $gajian = DataKaryawan::find($kode_karyawan);
                $gajian->kode_jabatan       = $request->kode_jabatan;
                $gajian->gaji_pokok         = $request->gaji_pokok;
                $gajian->tgl_masuk          = $request->tgl_masuk;
                $gajian->tgl_resign         = $request->tgl_resign;
                $gajian->tgl_kenaikan       = $request->tgl_kenaikan;
                $gajian->status             = $request->status;
                $gajian->approve_by         = $request->approve_by;
                $gajian->save();

                Session::flash('success', 'Berhasil merubah data Karyawan.');

                return redirect('master-karyawan/gajian/'.$kode_karyawan.'/edit');
            }
        }
    }

    public function destroy($kode_karyawan)
    {
        
    }
}
