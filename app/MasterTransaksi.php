<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTransaksi extends Model
{
    protected $table 		= 'tb_mt_transaksi';
    protected $primaryKey 	= 'kode_transaksi';
	public $incrementing 	= false;
	public $timestamps 		= false;

	protected $fillable		= [
		'kode_transaksi', 'tgl_transaksi', 'keterangan', 'status'
	];

	public function absensi()
	{
		return $this->hasMany('App\MasterAbsensi', 'kode_transaksi');
	}
}
