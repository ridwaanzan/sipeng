<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTunKaryawan extends Model
{
	protected $table 		= 'tb_d_tun_karyawan';
	protected $primaryKey 	= 'id';
	public $timestamps 		= false;

	protected $fillabel 	= [
		'kode_karyawan', 'kode_tunjangan', 'jumlah', 'keterangan'
	];

	public function masterTunjangan()
	{
		return $this->belongsTo('App\MasterTunjangan', 'kode_tunjangan', 'kode_tunjangan');
	}

	public function masterKaryawan()
	{
		return $this->belongsTo('App\MasterKaryawan', 'kode_karyawan');
	}
}
