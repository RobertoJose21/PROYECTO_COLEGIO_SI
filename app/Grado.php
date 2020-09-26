<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table='grados';
    protected $primaryKey = 'idgrado';
    public $timestamps=false;
    protected $fillable = ['grado','idnivel','estado'];

    public function cursos(){
        return $this->hasMany(Curso::class,'idgrado','idgrado');
    }
    
    public function secciones(){
        return $this->hasMany(Seccion::class,'idgrado','idgrado');
    }
    
}
