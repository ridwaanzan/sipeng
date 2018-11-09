<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use PDF;
use App\MasterKaryawan;
use App\DataKaryawan;
use App\DataTunKaryawan;
use App\MasterTunjangan;
use App\MasterGajian;
use App\MasterJabatan;
use App\MasterAbsensi;

class ControllerDetailPendapatan extends Controller
{
    public function index()
    {
    	# code...
    }

    public function show($kode_karyawan)
    {
    	$master 	= MasterKaryawan::find($kode_karyawan);
    	$gaji 		= DataKaryawan::find($kode_karyawan);
    	$jabatan 	= MasterJabatan::all();
        $mtunjangan = MasterTunjangan::all();
    	$tunjangan	= DataTunKaryawan::where('kode_karyawan', '=', $kode_karyawan)->get();

    	return view('admin.gajian.detail-show', compact('master', 'gaji', 'jabatan', 'mtunjangan', 'tunjangan'));
    }

    public function pdfview($kode_karyawan)
    {
        $total      = [];
        $master     = MasterKaryawan::find($kode_karyawan);
        $gaji       = DataKaryawan::find($kode_karyawan);
        $jabatan    = MasterJabatan::all();
        $mtunjangan = MasterTunjangan::all();
        $tunjangan  = DataTunKaryawan::where('kode_karyawan', '=', $kode_karyawan)->get();

        foreach($tunjangan as $tunjangan) {
            $itemsjur = $tunjangan->jumlah;

            array_push($total, $itemsjur);
        }

        $subtotal = array_sum($total) + $gaji->gaji_pokok;

        $pdf = PDF::loadView('admin.gajian.detail-pdf', compact('master', 'gaji', 'jabatan', 'mtunjangan', 'tunjangan', 'subtotal'));

        return $pdf->stream();
    }

    public function showListSlip($kode_karyawan)
    {
        $mGajian = MasterGajian::where('kode_karyawan', '=', $kode_karyawan)->paginate(10);

        return view('admin.home.list-nomorslip', compact('mGajian'));
    }

    public function showSlipGaji($no_slip)
    {
        $mGajian        = MasterGajian::find($no_slip);
        $kode_karyawan  = $mGajian->kode_karyawan;
        $kode_transaksi = $mGajian->kode_transaksi;
        $mKaryawan      = MasterKaryawan::find($kode_karyawan);
        $dTunjangan     = DataTunKaryawan::where('kode_karyawan', '=', $kode_karyawan)->get();
        $dAbsensi       = MasterAbsensi::where('kode_transaksi', '=', $kode_transaksi)->where('kode_karyawan', '=', $kode_karyawan)->first();
        $total          = [];
        $jumBPJS        = '';
        foreach ($dTunjangan as $tunjangans) {
            $jumlah         = $tunjangans->jumlah;
            array_push($total, $jumlah);
            if ($tunjangans->kode_tunjangan == 'TUN-001' || $tunjangans->nama_tunjangan == 'BPJS') {
                $bpjs       = $tunjangans->nama_tunjangan;
                $jumBPJS    = $tunjangans->jumlah;
            }
        }

        $jumlahTunjangan    = array_sum($total);
        $totalPendapatan    = $jumlahTunjangan + $mGajian->gaji_pokok;
        $gajiHarian         = $mGajian->gaji_pokok / 26;
        $totalPengurangan   = $gajiHarian * $dAbsensi->absen;

        return view('admin.home.detail-nomorslip', compact('mGajian', 'mKaryawan', 'dTunjangan', 'dAbsensi', 'totalPendapatan', 'totalPengurangan', 'jumBPJS', 'gajiHarian'));
    }

    public function showPdfSlipGaji($no_slip)
    {
        $mGajian        = MasterGajian::find($no_slip);
        $kode_karyawan  = $mGajian->kode_karyawan;
        $kode_transaksi = $mGajian->kode_transaksi;
        $mKaryawan      = MasterKaryawan::find($kode_karyawan);
        $dTunjangan     = DataTunKaryawan::where('kode_karyawan', '=', $kode_karyawan)->get();
        $dAbsensi       = MasterAbsensi::where('kode_transaksi', '=', $kode_transaksi)->where('kode_karyawan', '=', $kode_karyawan)->first();
        $total          = [];
        $jumBPJS        = '';
        foreach ($dTunjangan as $tunjangans) {
            $jumlah         = $tunjangans->jumlah;
            array_push($total, $jumlah);
            if ($tunjangans->kode_tunjangan == 'TUN-001' || $tunjangans->nama_tunjangan == 'BPJS') {
                $bpjs       = $tunjangans->nama_tunjangan;
                $jumBPJS    = $tunjangans->jumlah;
            }
        }

        $jumlahTunjangan    = array_sum($total);
        $totalPendapatan    = $jumlahTunjangan + $mGajian->gaji_pokok;
        $gajiHarian         = $mGajian->gaji_pokok / 26;
        $totalPengurangan   = $gajiHarian * $dAbsensi->absen;

        $pdf = PDF::loadView('admin.home.show-pdfslip', compact('mGajian', 'mKaryawan', 'dTunjangan', 'dAbsensi', 'totalPendapatan', 'totalPengurangan', 'jumBPJS'));

        return $pdf->stream();
    }

}
