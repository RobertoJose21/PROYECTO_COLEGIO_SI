<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Matricula;

class Seccion extends Model
{
    protected $table='secciones';
    protected $primaryKey = 'idseccion';
    public $timestamps=false;
    protected $fillable = ['seccion','estado','idgrado'];

    public function matriculas()    
    {
        return $this->hasMany(Matricula::class,'idseccion','idseccion');
    }

    public function grado(){
        return $this->hasOne('App\Grado','idgrado','idgrado');
    }
}
