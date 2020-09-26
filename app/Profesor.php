<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Detalle_Catedra;

class Profesor extends Model
{
    protected $table='profesores';
    protected $primaryKey = 'idprofesor';
    public $timestamps=false;
    protected $fillable = ['profesor','codigoprofesor','estado'];

    public function detalles_catedra()    
    {
        return $this->hasMany(Detalle_Catedra::class,'idprofesor','idprofesor');
    }
}
