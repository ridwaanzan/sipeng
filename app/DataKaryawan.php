<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKaryawan extends Model
{
    protected $table 		= 'tb_dt_karyawan';
	protected $primaryKey 	= 'kode_karyawan';
	public $incrementing 	= false;
	public $timestamps 		= false;

    protected $fillable = [
    	'kode_karyawan', 'kode_jabatan', 'gaji_pokok',
    	'tgl_masuk', 'tgl_resign', 'tgl_kenaikan', 'status',
    	'approve_by'
    ];

    public function mKaryawan()
    {
    	$this->belongsTo('App\MasterKaryawan', 'kode_karyawan');
    }

    public function dAbsensi()
    {
    	$this->belongsTo('App\MasterAbsensi', 'kode_karyawan');
    }
}
