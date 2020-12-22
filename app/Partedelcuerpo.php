<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partedelcuerpo extends Model
{
    public $table = "hkm_pcuerpo";
    public $timestamps = false;
    protected $fillable = ['nombre_pcu','estado_pcu'];
}
