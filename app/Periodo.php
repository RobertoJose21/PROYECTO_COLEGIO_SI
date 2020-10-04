<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Matricula;

class Periodo extends Model
{
    protected $table='periodos';
    protected $primaryKey = 'idperiodo';
    public $timestamps=false;
    protected $fillable = ['periodo','estado'];

    public function matriculas(){
        return $this->hasMany(Matricula::class,'idperiodo','idperiodo');
    }

    public function catedras(){
        return $this->hasMany(Detalle_Catedra::class,'idperiodo','idperiodo');
    }
    
}
