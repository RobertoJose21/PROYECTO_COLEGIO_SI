<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Curso;
use App\Seccion;
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

    public function nivel(){
        return $this->hasOne('App\Nivel','idnivel','idnivel');
    }
    
}
