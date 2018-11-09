<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterDepartemen extends Model
{
    protected $table 		= 'tb_mt_departemen';
	protected $primaryKey	= 'kode_departemen';
	public $incrementing 	= false;
	public $timestamps	= false;

    protected $fillable = [
    	'kode_departemen', 'nama_departemen'
    ];
}
