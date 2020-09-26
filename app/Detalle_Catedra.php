<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Catedra extends Model
{
    public $table = 'detalle_catedra';
    public $timestamps=false;
    protected $fillable = ['idcurso','idprofesor'];
}
