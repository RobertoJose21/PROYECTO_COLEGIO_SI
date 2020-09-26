<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table='estudiantes';
    protected $primaryKey = 'estudiante_id';
    public $timestamps=false;

    protected $fillable = ['nameestudiante','dni','grado_id','estado'];

    public function grado(){
        return $this->hasOne('App\Grado','grado_id','grado_id');
    }
    public function notas(){
        return $this->hasMany(Nota::class,'nota_id','nota_id');
    }
    
    public function matriculas()
    {
        return $this->hasMany(Matricula::class,'estudiante_id','estudiante_id');
    }
}
