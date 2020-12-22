<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demonio extends Model
{
    public $table = "hkm_demonio";
    public $timestamps = false;
    protected $fillable = ['nombre_dem','descrip_dem','nombre_lug','nombre_pcu','imagen_dem'];
}
