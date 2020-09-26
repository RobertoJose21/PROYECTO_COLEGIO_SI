<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;
class Distrito extends Model
{
    protected $table='distritos';
    protected $primaryKey = 'iddistrito';
    public $timestamps=false;
    protected $fillable = ['idprovincia','distrito','estado'];
    
    public function alumnos(){
        return $this->hasMany(Alumno::class,'iddistrito','iddistrito');
    }

    public function provincia(){
        return $this->hasOne('App\Provincia','idprovincia','idprovincia');
    }
}
