<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTunGajian extends Model
{
    protected $table 		= 'tb_dt_tun_gajian';
	protected $primaryKey 	= 'kode_tunjangan';
	public $incrementing 	= false;
	public $timestamps 		= false;

	protected $fillable 	= [
		'kode_karyawan', 'kode_transaksi', 'kode_tunjangan', 'jumlah_tunjangan'
	];

	public function masterTunjangan()
	{
		$this->belongsTo('App\MasterTunjangan', 'kode_tunjangan');
	}

	public function masterKaryawan()
	{
		$this->belongsTo('App\MasterKaryawan', 'kode_karyawan');
	}

	public function masterTransaksi()
	{
		$this->belongsTo('App\MasterTransaksi', 'kode_transaksi');
	}
}
