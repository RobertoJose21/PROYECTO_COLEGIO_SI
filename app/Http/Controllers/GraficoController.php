<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function graficoMatricula()
    {
        $registros=DB::select('call alumnosxgrados()');
        $registrosDos=DB::select('call alumnosxperiodo()');
        $registrosTres=DB::select('call alumnosxnivel()');
        return view('matricula.grafico',compact('registros','registrosDos','registrosTres'));
    }

   
}
