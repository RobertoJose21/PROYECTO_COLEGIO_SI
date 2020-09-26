<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table='distritos';
    protected $primaryKey = 'iddistrito';
    public $timestamps=false;
    protected $fillable = ['idprovincia','distrito','estado'];
    
    public function alumnos(){
        return $this->hasMany(Alumno::class,'iddistrito','iddistrito');
    }
}
