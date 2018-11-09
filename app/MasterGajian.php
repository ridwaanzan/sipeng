<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterGajian extends Model
{
    protected $table 		= 'tb_mt_gajian';
	protected $primaryKey 	= 'no_slip';
	public $timestamps		= false;

	protected $fillable		= [
		'no_slip',
		'kode_transaksi', 
		'kode_karyawan', 
		'tanggal', 
		'gaji_pokok',
		'total_potongan',
		'total_tunjangan',
		'total_gaji', 
		'keterangan'
	];

	public function mAbsensi()
	{
		return $this->belongsTo('App\MasterAbsensi', 'kode_transaksi');
	}

}
