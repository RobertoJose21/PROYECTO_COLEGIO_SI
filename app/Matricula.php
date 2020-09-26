<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Nota;

class Matricula extends Model
{
    protected $table= 'matriculas';
    protected $primaryKey= 'idmatricula';
    public $timestamps= false;
    protected $filliable= ['idalumno','idperiodo','fecha','idseccion','estado']; 


    public function notas()    
    {
        return $this->hasMany(Nota::class,'idmatricula','idmatricula');
    }
    
    public function alumno(){
        return $this->hasOne('App\Alumno','idalumno','idalumno');
    }

    public function periodo(){
        return $this->hasOne('App\Periodo','idperiodo','idperiodo');
    }

    public function seccion(){
        return $this->hasOne('App\Seccion','idseccion','idseccion');
    }
}
