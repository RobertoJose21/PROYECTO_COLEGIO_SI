<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamentos';
    protected $primaryKey = 'iddepartamento';
    public $timestamps=false;
    protected $fillable = ['departamento','idpais','estado'];

    public function provincias(){
        return $this->hasMany(Provincia::class,'iddepartamento','iddepartamento');
    }
    /*public function estudiante(){
        return $this->hasOne('App\Estudiante','estudiante_id','estudiante_id');
    }*/
}

