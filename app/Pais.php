<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Departamento;

class Pais extends Model
{
    protected $table='paises';
    protected $primaryKey = 'idpais';
    public $timestamps=false;
    protected $fillable = ['pais','estado'];

    public function departamentos(){
        return $this->hasMany(Departamento::class,'idpais','idpais');
    }

    /*public function estudiantes(){
        return $this->hasMany(Estudiante::class,'nota_id','nota_id');
    }*/
}
