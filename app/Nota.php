<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table='notas';
    protected $primaryKey = 'idnota';
    public $timestamps=false;
    protected $fillable = ['idmatricula','idcapacidad','nota1','nota2','nota3','promedio','estado'];
    
    //un registro de notas tiene muchos estudiantes
    /*public function estudiantes(){
        return $this->hasMany(Estudiante::class,'nota_id','nota_id');
    }*/
    /*public function estudiante(){
        return $this->hasOne('App\Estudiante','estudiante_id','estudiante_id');
    }*/
    
}
