<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    public $table = "hkm_articulo";
    public $timestamps = false;
    protected $fillable = ['nombre_art','nombre_lug','formao_art'];
}
