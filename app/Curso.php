<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table='cursos';
    protected $primaryKey = 'idcurso';
    public $timestamps=false;
    protected $fillable = ['curso','codigocurso','idgrado'];

    public function capacidades()    
    {
        return $this->hasMany(Capacidad::class,'idcurso','idcurso');
    }

    public function detalles_catedra()    
    {
        return $this->hasMany(Detalle_Catedra::class,'idcurso','idcurso');
    }
}
