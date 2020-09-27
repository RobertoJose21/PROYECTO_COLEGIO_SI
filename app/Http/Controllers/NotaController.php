<?php

namespace App\Http\Controllers;
use App\Nota;
use DB;
use App\Estudiante;
use App\Grado;
use App\Seccion;
use App\Periodo;
use App\Curso;
use App\Matricula;
use App\Capacidad;
use App\Profesor;
use App\Detalle_Catedra;
 

use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION=5;
    public function index(Request $request)
    {

            $buscarpor=$request->get('buscarpor');
            $notas=DB::table('notas as n','n.estado','=','1')
            ->join('matriculas as m','n.idmatricula','=','m.idmatricula')
            ->join('alumnos as a','m.idalumno','=','a.idalumno')
            ->where('m.idalumno','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);

            /*$nota=Nota::where('estado','=','1')->join('matriculas m','m.idmatricula','=','notas.idmatricula')
            ->where('m.idalumno','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);*/
            $grado=Grado::where('estado','=','1')->get();
            $seccion=Seccion::where('estado','=','1')->get();
            $periodo=Periodo::where('estado','=','1')->get();
            $curso=Curso::where('estado','=','1')->get();
            $profesor=Profesor::where('estado','=','1')->get();

            /*foreach($notas as $itemnota)
            {
                $itemnota->promedio=floor(($itemnota->nota1+$itemnota->nota2+$itemnota->nota3)/3);
                $itemnota->save();
            }*/

            return view('nota.index',['profesor'=>$profesor,'nota'=>$notas,'buscarpor'=>$buscarpor,'grado'=>$grado,'seccion'=>$seccion,'periodo'=>$periodo,'curso'=>$curso]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nota_id)
    {
        $nota=Nota::findOrFail($nota_id);
        $estudiante=Estudiante::where('estado','=','1')->get();        
        return view('nota.edit',compact('nota','estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nota_id)
    {
        $data=request()->validate([
            'nota1'=>'required|max:2',
            'nota2'=>'required|max:2',
            'nota3'=>'required|max:2',
            'nota4'=>'required|max:2',
        ],
        [
            'nota1.required'=>'INGRESE NOTA 1 DEL ESTUDIANTE',
            'nota1.max'=>'MAXIMO 2 CARACTERES PARA LA NOTA 1',
            'nota2.required'=>'INGRESE NOTA 2 DEL ESTUDIANTE',
            'nota2.max'=>'MAXIMO 2 CARACTERES PARA LA NOTA 2',
            'nota3.required'=>'INGRESE NOTA 3 DEL ESTUDIANTE',
            'nota3.max'=>'MAXIMO 2 CARACTERES PARA LA NOTA 3',
            'nota4.required'=>'INGRESE NOTA 4 DEL ESTUDIANTE',
            'nota4.max'=>'MAXIMO 2 CARACTERES PARA LA NOTA 4',
        ]);
        $nota=Nota::findOrFail($nota_id);
        $nota->nota1=$request->nota1;
        $nota->nota2=$request->nota2;
        $nota->nota3=$request->nota3;
        $nota->nota4=$request->nota4;
        $nota->save();
        return redirect()->route('nota.index')->with('datos','REGISTRO ACTUALIZADO...!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
