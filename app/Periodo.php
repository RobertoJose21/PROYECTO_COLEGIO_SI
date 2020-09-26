<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table='periodos';
    protected $primaryKey = 'idperiodo';
    public $timestamps=false;
    protected $fillable = ['periodo','estado'];

    public function matriculas(){
        return $this->hasMany(Matricula::class,'idperiodo','idperiodo');
    }
}
