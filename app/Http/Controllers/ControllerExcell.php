<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Excel;
use Session;
use DB;
use App\MasterAbsensi;
use App\MasterTransaksi;
use App\DataTunKaryawan;
use App\MasterKaryawan;
use App\DataKaryawan;
use App\MasterGajian;

class ControllerExcell extends Controller
{

    public function index()
    {
        $mAbsen = MasterAbsensi::paginate(10);

        return view('admin.gajian.show-list', compact('mAbsen'));
    }

    public function show($kode_transaksi)
    {
        $mTransaksi = MasterTransaksi::find($kode_transaksi);
        $mAbsen     = MasterAbsensi::where('kode_transaksi', '=', $kode_transaksi)->paginate(10);

        return view('admin.gajian.show-lots', compact('mTransaksi', 'mAbsen'));
    }

    public function destroy($id)
    {
        $mAbsenKar = MasterAbsensi::find($id);
        $kode_karyawan = $mAbsenKar->kode_karyawan;
        $kode_transaksi = $mAbsenKar->kode_transaksi;

        MasterAbsensi::destroy($id);

        Session::flash('success', 'Berhasil menghapus data absensi karyawan: '.$kode_karyawan.' pada transaksi: '.$kode_transaksi.'.');

        return back();
    }

    public function searchBy(Request $request)
    {
        $mAbsen = MasterAbsensi::where('kode_transaksi', '=', $request->kode_transaksi)->paginate(10);

        return view('admin.gajian.show-list', compact('mAbsen'));
    }

    public function generate(Request $request)
    {
        $reuqestData    = $request->all();
        $kode_transaksi = $request->kode_transaksi;
        $mAbsensi       = MasterAbsensi::where('kode_transaksi', '=', $kode_transaksi)->get();
        $mTransaksi     = MasterTransaksi::find($kode_transaksi);
        $tanggalTransaksi = $mTransaksi->tgl_transaksi;
        foreach($mAbsensi as $mAbsensi) {
            $kode_transaksi   = $mAbsensi->kode_transaksi;
            $kode_karyawan    = $mAbsensi->kode_karyawan;
            $masuk            = $mAbsensi->masuk;
            $absen            = $mAbsensi->absen;
            $noSlip           = $kode_transaksi.$mAbsensi->kode_karyawan;
            $jumBPJS          = '';

            // Hitung Gaji Karyawan
            $dGaji            = DataKaryawan::find($kode_karyawan);
            $gaji             = $dGaji->gaji_pokok;
            $gajiHarian       = $gaji / 26;             // Perhitungan Gaji Harian.
            $potongAbsen      = $gajiHarian * $absen;   // Jumlah Potongan Gaji Harian.

            $tunjangan        = DataTunKaryawan::where('kode_karyawan', '=', $kode_karyawan)->get();
            $total            = [];
            foreach ($tunjangan as $tun) {
                $dataTun      = $tun->jumlah;
                array_push($total, $dataTun);
                if ($tun->kode_tunjangan == 'TUN-001' || $tun->nama_tunjangan == 'BPJS') {
                    $bpjs       = $tun->nama_tunjangan;
                    $jumBPJS    = $tun->jumlah;
                } else {

                }
            }
            $jumTunjangan     = array_sum($total);
            $totalPotongan    = $potongAbsen + $jumBPJS;
            $jumlahGT         = $jumTunjangan + $gaji;
            $gajiKurang       = $jumlahGT - $potongAbsen;
            $gajiAkhir        = $gajiKurang - $jumBPJS;

            $simpanGaji                     = new MasterGajian;
            $simpanGaji->no_slip            = $noSlip;
            $simpanGaji->kode_transaksi     = $kode_transaksi;
            $simpanGaji->kode_karyawan      = $kode_karyawan;
            $simpanGaji->tanggal            = $tanggalTransaksi;
            $simpanGaji->gaji_pokok         = $gaji;
            $simpanGaji->total_potongan     = $totalPotongan;
            $simpanGaji->total_tunjangan    = $jumTunjangan;
            $simpanGaji->total_gaji         = $gajiAkhir;
            $simpanGaji->save();
        }

        $mTransaksi->status = '1';
        $mTransaksi->save();

        Session::flash('success', 'Berhasil generate gaji karyawan berdasarkan absensi.');

        return back();
    }

    public function importCsv(Request $request)
    {
    	Excel::load($request->file('rekap_absen'), function($reader) {
    		$reader->each(function($sheet){
    			MasterAbsensi::firstOrCreate($sheet->toArray());
    		});
    	});

        Session::flash('success', 'Berhasil Import data Absensi karyawan.');

        return back();
    }

    public function exportCsv($kode_transaksi)
    {
    	$export = MasterAbsensi::where('kode_transaksi', '=', $kode_transaksi)->get();
    	Excel::create('rekap_absen'.$kode_transaksi, function($excel) use($export) {
    		$excel->sheet('Sheet 1', function($sheet) use($export){
    			$sheet->fromArray($export);
    		});
    	})->export('xlsx');
    }

}
