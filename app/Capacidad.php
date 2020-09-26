<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    protected $table='capacidades';
    protected $primaryKey = 'idcapacidad';
    public $timestamps=false;
    protected $fillable = ['capacidad','idcurso','estado'];

    public function notas()    
    {
        return $this->hasMany(Nota::class,'idcapacidad','idcapacidad');
    }
}
