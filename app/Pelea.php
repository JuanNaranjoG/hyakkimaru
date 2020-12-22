<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelea extends Model
{
    public $table = "hkm_pelea";
    public $timestamps = false;
    protected $fillable = ['ganador_pel','nombre_lug','nombre_dem','fecha_pel'];
}
