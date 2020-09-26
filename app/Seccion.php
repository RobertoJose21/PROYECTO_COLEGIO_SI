<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table='secciones';
    protected $primaryKey = 'idseccion';
    public $timestamps=false;
    protected $fillable = ['seccion','idgrado'];

    public function matriculas()    
    {
        return $this->hasMany(Matricula::class,'idseccion','idseccion');
    }
}
