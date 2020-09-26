<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $primaryKey = 'docente_id';
    public $timestamps=false;

    protected $filleable =[
        'nombre','codigo','estado'
    ];
}
