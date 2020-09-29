<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function graficoMatricula()
    {
        $registros=DB::select('call alumnosxgrados()');
        $registrosDos=DB::select('call alumnosxperiodo()');
        return view('matricula.grafico',compact('registros','registrosDos'));
    }

   
}
