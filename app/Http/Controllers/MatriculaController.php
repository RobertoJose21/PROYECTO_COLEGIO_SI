<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Nivel;
use App\Grado;
use App\Periodo;
use App\Seccion;
use App\Matricula;
use DB;


class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const PAGINATION=4;
    public function index(Request $request)

    {
        $buscarpor=$request->get('buscarpor');
        
        $matricula=DB::table('matriculas as m')->join('alumnos as a','a.idalumno','=','m.idalumno')
        ->join('periodos as p','p.idperiodo','=','m.idperiodo')
        ->join('secciones as s','s.idseccion','=','m.idseccion')
        ->join('grados as g','g.idgrado','=','s.idgrado')
        ->join('niveles as n','n.idnivel','=','g.idnivel')
        ->select('m.idmatricula','m.fecha','p.periodo','a.nombres','a.apellidos','n.nivel','g.grado','s.seccion') 
        ->where('a.apellidos','LIKE','%'.$buscarpor.'%')
        ->paginate($this::PAGINATION);
        return view('matricula.index',compact('matricula','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno=Alumno::where('estado','=','1')->get();
        $periodo=Periodo::where('estado','=','1')->get();
        $seccion=Seccion::where('estado','=','1')->get();
        $nivel=Nivel::where('estado','=','1')->get();
        $grado=Grado::where('estado','=','1')->get();
        return view('matricula.create',compact('alumno','periodo','seccion','nivel','grado'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'fecha'=>'required|max:30',     
        ],
        [
            'fecha.required'=>'Ingrese la escala de la matricula',  
        ]);


    $matricula=new Matricula();    
    $matricula->idalumno=$request->idalumno;  //designamos el valor de descripcion
    $matricula->fecha=$request->fecha;  //designamos el valor de descripcion
    $matricula->idseccion=$request->idseccion;  //seccion 
    $matricula->idperiodo=$request->idperiodo;  //designamos el valor de descripcion

    $matricula->estado='1';   //campo de descripcion
    $matricula->save();       
    return redirect()->route('matricula.index')->with('datos','Registro Nuevo Guardado...!'); //devolvemos los datos q usara el index
}
        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($numeromatricula)
    {
        
        $matricula=Matricula::findOrfail($numeromatricula);
        $alumno=Alumno::where('estado','=','1')->get();
        $periodo=Periodo::where('estado','=','1')->get();
        $seccion=Seccion::where('estado','=','1')->get();
        $nivel=Nivel::where('estado','=','1')->get();
        $grado=Grado::where('estado','=','1')->get();

        return view('matricula.edit',compact('matricula','alumno','periodo','seccion','nivel','grado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $numeromatricula)
    {
        $data=request()->validate([
            'fecha'=>'required|max:30',     
        ],
        [
            'fecha.required'=>'Ingrese la escala de la matricula',  
        ]);


    $matricula=Matricula::findOrfail($numeromatricula);    //instanciamos nuestro modelo categoria
    $matricula->fecha=$request->fecha;  //designamos el valor de descripcion
    $matricula->idalumno=$request->idalumno;  //designamos el valor de descripcion
    $matricula->idperiodo=$request->idperiodo;  //designamos el valor de descripcion
    $matricula->idseccion=$request->idseccion;  //seccion 

    $matricula->estado='1';   //campo de descripcion
    $matricula->save();         
    return redirect()->route('matricula.index')->with('datos','Registro Actualizado...!'); //devolvem
    }

    public function show($id)
    {
        $matricula= Matricula::where('idmatricula','=',$id)->first();
        $cursos = DB::table('cursos as c','c.estado','=','1')
        ->join('detalle_catedra as dc','c.idcurso','=','dc.idcurso')
        ->join('profesores as p','p.idprofesor','=','dc.idprofesor')
        ->join('grados as g','c.idgrado','=','g.idgrado')
        ->join('secciones as s','g.idgrado','=','s.idgrado')
        ->join('matriculas as m','m.idseccion','=','s.idseccion')
        ->where('m.idmatricula','=',$id)->get();
        $pdf = \PDF::loadView('matricula.rpmatricula', compact('matricula','cursos'))->setPaper('a4', 'portrait');
        return $pdf->stream('matricula.pdf');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function confirmar($id){
        $matricula=Matricula::find($id);
        return view('matricula.confirmar',compact('matricula'));
    }
    public function destroy($id)
    {
        $matricula=Matricula::findOrFail($id);
        $matricula->estado='0';
        $matricula->save();
        return redirect()->route('matricula.index')->with('datos','Registro Eliminadoa...!');
    }

    public function byGrado($id){
        return Grado::where('estado','=','1')->where('idnivel','=',$id)->get();
    }
    public function bySeccion($id){
        return Seccion::where('estado','=','1')->where('idgrado','=',$id)->get();
    }


}
