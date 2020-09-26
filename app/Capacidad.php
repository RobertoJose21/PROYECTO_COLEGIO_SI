<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nota;
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

    public function curso(){
        return $this->hasOne('App\Curso','idcurso','idcurso');
    }
}
