<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table='alumnos';
    protected $primaryKey = 'idalumno';
    public $timestamps=false;
    protected $fillable = ['iddistrito','codigoalumno','dni','apellidos','nombres','sexo','fechanacimiento','lenguamaterna','estadocivil','religion','colegioprocedencia','direccion','telefono','mediotransporte','tiempodemora','materialdomicilio','energiaelectrica','aguapotable','desague','sshh','numerohabitaciones','numerohabitantes','situacion','estado'];

    public function matriculas(){
        return $this->hasMany(Matricula::class,'idalumno','idalumno');
    }
}
