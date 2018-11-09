<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterTunjangan extends Model
{
    protected $table 		= 'tb_mt_tunjangan';
	protected $primaryKey 	= 'kode_tunjangan';
	public $incrementing 	= false;
	public $timestamps 		= false;

	protected $fillable 	= [
		'kode_tunjangan', 'nama_tunjangan', 'status'
	];

	public function tunjanganKaryawan()
	{
		return $this->hasMany('App\MasterTunKaryawan', 'kode_tunjangan');
	}

	public function tunjanganGajian()
	{
		return $this->hasMany('App\DataTunKaryawan', 'kode_tunjangan', 'kode_tunjangan');
	}
}
