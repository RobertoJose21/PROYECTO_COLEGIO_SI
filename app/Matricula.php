<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    

}
