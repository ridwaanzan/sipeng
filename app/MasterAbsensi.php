<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterAbsensi extends Model
{
    protected $table 		= 'tb_mt_absensi';
	public $timestamps		= false;

	protected $fillable		= [
		'kode_transaksi', 
		'kode_karyawan', 
		'hari_kerja', 
		'masuk', 
		'absen'
	];

	public function mKaryawan()
	{
		return $this->belongsTo('App\MasterKaryawan', 'kode_karyawan');
	}

	public function dKaryawan()
	{
		return $this->hasMany('App\MasterAbsensi', 'kode_karyawan');
	}
}
