<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterJabatan extends Model
{
    protected $table 		= 'tb_mt_jabatan';
	protected $primaryKey 	= 'kode_jabatan';
	public $incrementing 	= false;
	public $timestamps 		= false;

    protected $fillable = [
    	'kode_jabatan', 'kode_departemen', 'nama_jabatan',
    	'golongan'
    ];

    public function mtKaryawan()
    {
    	return $this->hasMany('App\MasterKaryawan', 'kode_jabatan');
    }
}
