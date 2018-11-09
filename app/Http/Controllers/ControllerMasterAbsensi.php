<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Validator;
use Redirect;
use DB;

use App\MasterTransaksi;
use App\MasterKaryawan;
use App\MasterAbsensi;

class ControllerMasterAbsensi extends Controller
{
    public function create(Request $request)
    {
        $requestData        = $request->all();
        $kode_transaksi     = $request->kode_transaksi;

        return view('admin.absensi.create', compact('kode_transaksi'));
    }

    public function store(Request $request)
    {
        $requestData    = $request->all();
        $kode_transaksi = $request->kode_transaksi;
        $kode_karyawan  = $request->kode_karyawan;

        $check          = MasterAbsensi::where('kode_transaksi', '=', $kode_transaksi)->where('kode_karyawan', '=', $kode_karyawan);

        if ($check->count() >= 1) {
            Session::flash('alert', 'Data absensi karyawan dengan kode karyawan: '.$kode_karyawan.', sudah ada.');

            return back()->withInput();
        } else {
            
            $pesan          = [
                'kode_transaksi.required' => 'Form Kode Transaksi haruslah diisi!',
                'kode_karyawan.required' => 'Form Kode Karyawan haruslah diisi!',
                'hari_kerja.required' => 'Form Hari Karja haruslah diisi!',
                'hari_kerja.numeric' => 'Form Hari Karja haruslah diisi dengan angka!',
                'masuk.required' => 'Form Jumlah Masuk haruslah diisi!',
                'masuk.numeric' => 'Form Jumlah Masuk haruslah diisi dengan angka!',
                'absen.required' => 'Form Jumlah Tidak Masuk haruslah diisi!',
                'absen.numeric' => 'Form Jumlah Tidak Masuk haruslah diisi dengan angka!'
            ];

            $rules          = [
                'kode_transaksi' => 'required',
                'kode_karyawan' => 'required',
                'hari_kerja' => 'required|numeric',
                'masuk' => 'required|numeric',
                'absen' => 'required|numeric'
            ];

            $validasi   = Validator::make($requestData, $rules, $pesan);

            if ($validasi->fails()) {
                return back()->withErrors($validasi)->witInput();
            }
            else {
                $transaksi = MasterTransaksi::find($request->kode_transaksi);

                if ($transaksi->count() == 0) {
                    Session::flash('alert', 'Transaksi tidak ditemukan, silahkan input transaksi dengan Kode Transaksi tersebut terlebih dahulu.');

                    return back()->withInput();
                }
                else {
                    $absensi                    = new MasterAbsensi;
                    $absensi->kode_transaksi    = $request->kode_transaksi;
                    $absensi->kode_karyawan     = $request->kode_karyawan;
                    $absensi->hari_kerja        = $request->hari_kerja;
                    $absensi->masuk             = $request->masuk;
                    $absensi->absen             = $request->absen;
                    $absensi->save();

                    Session::flash('success', 'Berhasil menambahkan data absensi baru untuk transaksi: '.$request->kode_transaksi);

                    return redirect('absensi/'.$request->kode_transaksi);
                }
            }
        }

    }

    public function edit($id)
    {
        $absensi = MasterAbsensi::find($id);
        $karyawan = MasterKaryawan::find($absensi->kode_karyawan);

        return view('admin.absensi.edit', compact('absensi', 'karyawan'));
    }

    public function show($id)
    {
        $absensi = MasterAbsensi::find($id);
        $karyawan = MasterKaryawan::find($absensi->kode_karyawan);

        return view('admin.absensi.edit', compact('absensi', 'karyawan'));
    }

    public function update(Request $request, $id)
    {
        $requestData    = $request->all();

        $pesan          = [
            'kode_transaksi.required' => 'Form Kode Transaksi haruslah diisi!',
            'kode_karyawan.required' => 'Form Kode Karyawan haruslah diisi!',
            'hari_kerja.required' => 'Form Hari Karja haruslah diisi!',
            'hari_kerja.numeric' => 'Form Hari Karja haruslah diisi dengan angka!',
            'masuk.required' => 'Form Jumlah Masuk haruslah diisi!',
            'masuk.numeric' => 'Form Jumlah Masuk haruslah diisi dengan angka!',
            'absen.required' => 'Form Jumlah Tidak Masuk haruslah diisi!',
            'absen.numeric' => 'Form Jumlah Tidak Masuk haruslah diisi dengan angka!'
        ];

        $rules          = [
            'kode_transaksi' => 'required',
            'kode_karyawan' => 'required',
            'hari_kerja' => 'required|numeric',
            'masuk' => 'required|numeric',
            'absen' => 'required|numeric',
        ];

        $validasi   = Validator::make($requestData, $rules, $pesan);

        if ($validasi->fails()) {
            return back()->withErrors($validasi);
        }
        else {
            $transaksi = MasterTransaksi::find($request->kode_transaksi);

            if ($transaksi->count() == 0) {
                Session::flash('alert', 'Transaksi tidak ditemukan, silahkan input transaksi dengan Kode Transaksi tersebut terlebih dahulu.');

                return back();
            }
            else {
                $absensi                    = MasterAbsensi::find($id);
                $absensi->kode_transaksi    = $request->kode_transaksi;
                $absensi->kode_karyawan     = $request->kode_karyawan;
                $absensi->hari_kerja        = $request->hari_kerja;
                $absensi->masuk             = $request->masuk;
                $absensi->absen             = $request->absen;
                $absensi->save();

                Session::flash('success', 'Berhasil merubah salah satu data absensi pada transaksi: '.$request->kode_transaksi);

                return redirect('absensi/'.$request->kode_transaksi);
            }
        }
    }
}
