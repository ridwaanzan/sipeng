<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKaryawan extends Model
{
    protected $table 		= 'tb_mt_karyawan';
	protected $primaryKey 	= 'kode_karyawan';
	public $incrementing 	= false;
    protected $fillable 	= [
    	'kode_karyawan', 'kode_jabatan', 'nama_karyawan',
    	'alamat', 'kota', 'kota', 'provinsi',
    	'kode_pos', 'negara', 'telp', 'email',
    	'kontak', 'no_rekening', 'an', 'bank',
    	'keterangan', 'create_by', 'update_by', 'status'
    ];

    public function dataKaryawan()
    {
    	return $this->hasOne('App\DataKaryawan', 'kode_karyawan');
    }

    public function dataGajian()
    {
        return $this->hasMany('App\MasterGajian', 'kode_karyawan');
    }

    public function dataTunjangan()
    {
        return $this->hasMany('App\DataTunKaryawan', 'kode_karyawan');
    }

    public function dataAbsensi()
    {
        return $this->hasMany('App\MasterAbsensi', 'kode_karyawan');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\MasterJabatan', 'kode_jabatan');
    }
}
