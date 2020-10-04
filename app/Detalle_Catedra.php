<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Catedra extends Model
{
   // protected $primaryKey = ['idcurso','idprofesor'];
    public $table = 'detalle_catedra';
    public $timestamps=false;

    protected $fillable = ['idcurso','idprofesor'];

    public function curso(){
        return $this->hasOne('App\Curso','idcurso','idcurso');
    }

    public function profesor(){
        return $this->hasOne('App\Profesor','idprofesor','idprofesor');
    }

    public function periodo(){
        return $this->hasOne('App\Periodo','idperiodo','idperiodo');
    }
}
