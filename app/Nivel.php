<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Grado;

class Nivel extends Model
{
    protected $table='niveles';
    protected $primaryKey = 'idnivel';
    public $timestamps=false;
    protected $fillable = ['nivel','estado'];

    public function grados(){
        return $this->hasMany(Grado::class,'idnivel','idnivel');
    }

    
}
