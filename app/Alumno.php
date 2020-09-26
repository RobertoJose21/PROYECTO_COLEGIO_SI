<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Matricula;

class Alumno extends Model
{
    protected $table='alumnos';
    protected $primaryKey = 'idalumno';
    public $timestamps=false;
    protected $fillable = ['iddistrito','codigoalumno','dni','apellidos','nombres','sexo','fechanacimiento','lenguamaterna','estadocivil','religion','colegioprocedencia','direccion','telefono','mediotransporte','tiempodemora','materialdomicilio','energiaelectrica','aguapotable','desague','sshh','numerohabitaciones','numerohabitantes','situacion','estado'];

    public function matriculas(){
        return $this->hasMany(Matricula::class,'idalumno','idalumno');
    }

    public function distrito(){
        return $this->hasOne('App\Distrito','iddistrito','iddistrito');
    }
}
