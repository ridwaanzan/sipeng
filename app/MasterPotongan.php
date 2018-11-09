<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPotongan extends Model
{
    protected $table 		= 'tb_mt_potongan';
    protected $primaryKey 	= 'kode_potongan';
    public $timestamps 		= false;

    public function dataPotonganGajian()
    {
    	return $this->hasMany('App\Data');
    }
}
