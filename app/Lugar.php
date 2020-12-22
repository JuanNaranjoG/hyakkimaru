<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
   public $table = "hkm_lugar";
   public $timestamps = false;
   protected $fillable = ['nombre_lug','ubicacion_lug','clima_lug'];
}
