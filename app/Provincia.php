<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table='provincias';
    protected $primaryKey = 'idprovincia';
    public $timestamps=false;
    protected $fillable = ['iddepartamento','provincia','estado'];

    public function distritos(){
        return $this->hasMany(Distrito::class,'idprovincia','idprovincia');
    }
}
