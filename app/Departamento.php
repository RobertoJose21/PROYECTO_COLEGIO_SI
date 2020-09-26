<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Provincia;

class Departamento extends Model
{
    protected $table='departamentos';
    protected $primaryKey = 'iddepartamento';
    public $timestamps=false;
    protected $fillable = ['departamento','idpais','estado'];

    public function provincias(){
        return $this->hasMany(Provincia::class,'iddepartamento','iddepartamento');
    }
    public function pais(){
        return $this->hasOne('App\Pais','idpais','idpais');
    }
}

