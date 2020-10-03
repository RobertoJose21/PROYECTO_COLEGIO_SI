<?php

namespace App\Http\Controllers;
use App\Nota;
use DB;
use App\Alumno;
use App\Grado;
use App\Seccion;
use App\Periodo;
use App\Curso;
use App\Matricula;
use App\Capacidad;
use App\Profesor;
use App\Detalle_Catedra;
use App\Nivel;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION=6;
    public function index(Request $request)
    {

            $buscarpor=$request->get('buscarpor');
            $notas=DB::table('notas as n','n.estado','=','1')
            ->join('matriculas as m','n.idmatricula','=','m.idmatricula')
            ->join('alumnos as a','m.idalumno','=','a.idalumno')
            ->where('a.apellidos','like','%'.$buscarpor.'%')
            ->select('m.idmatricula','n.nota1','n.idnota','n.nota2','n.nota3','n.promedio','a.idalumno','a.nombres','a.apellidos')->paginate($this::PAGINACION);

            /*$nota=Nota::where('estado','=','1')->join('matriculas m','m.idmatricula','=','notas.idmatricula')
            ->where('m.idalumno','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);*/
            $grado=Grado::where('estado','=','1')->get();
            $seccion=Seccion::where('estado','=','1')->get();
            $periodo=Periodo::where('estado','=','1')->get();
            $curso=Curso::where('estado','=','1')->get();
            $profesor=Profesor::where('estado','=','1')->get();
            $nivel=Nivel::where('estado','=','1')->get();
            $capacidad=Capacidad::where('estado','=','1')->get();
            $matricula=Matricula::where('estado','=','1')->get();
            $alumno=Alumno::where('estado','=','1')->get();
            /*foreach($notas as $itemnota)
            {
                $itemnota->promedio=floor(($itemnota->nota1+$itemnota->nota2+$itemnota->nota3)/3);
                $itemnota->save();
            }*/

            return view('nota.index',['alumno'=>$alumno,'matricula'=>$matricula,'capacidad'=>$capacidad,'nivel'=>$nivel,'profesores'=>$profesor,'nota'=>$notas,'buscarpor'=>$buscarpor,'grado'=>$grado,'seccion'=>$seccion,'periodo'=>$periodo,'curso'=>$curso]);
    }

    public function libretas(Request $request){

        $buscarpor=$request->get('buscarpor');
        $notas=DB::table('matriculas as m','m.estado','=','1')
        ->join('periodos as p','p.idperiodo','=','m.idperiodo')
        ->join('alumnos as a','m.idalumno','=','a.idalumno')
        ->where('a.apellidos','like','%'.$buscarpor.'%')
        ->select('m.idmatricula','m.fecha','p.idperiodo','p.periodo','a.nombres','a.apellidos','a.idalumno')->paginate($this::PAGINACION);
        return view('nota.libretas',['nota'=>$notas,'buscarpor'=>$buscarpor]);
    }

       public function libretaNotas($id){
        $matricula= Matricula::where('idmatricula','=',$id)->first();
                            ////richard no borres mi funcion 
        $notita = DB::table('matriculas as m','m.estado','=','1')->where('m.idmatricula','=',$id)
        ->join('secciones as s','s.idseccion','=','m.idseccion')
        ->join('grados as g','g.idgrado','=','s.idgrado')
        ->join('cursos as c','c.idgrado','=','g.idgrado')
        ->join('capacidades as ca','ca.idcurso','=','c.idcurso')
        ->join('notas as n','n.idcapacidad','=','ca.idcapacidad')
        ->where('n.idmatricula','=',$id)
        ->select('c.curso','ca.idcurso','ca.capacidad','n.promedio','n.nota1','n.nota2','n.nota3')
        ->get();

        $cursos = DB::table('cursos as c','c.estado','=','1')
        ->join('grados as g','g.idgrado','=','c.idgrado')
        ->join('secciones as s','s.idgrado','=','g.idgrado')
        ->join('matriculas as m','m.idseccion','=','s.idseccion')
        ->where('m.idmatricula','=',$id)
        ->select('c.idcurso','c.curso')->get();


        $pdf = \PDF::loadView('nota.notas', ['cursos'=>$cursos,'matricula'=>$matricula,'notitas'=>$notita]);
        return $pdf->stream('libreta.pdf');
               
    }

    public function Notas($id){
     $matricula= Matricula::where('idmatricula','=',$id)->first();
     
     $pdf = \PDF::loadView('nota.notas', compact('matricula'))->setPaper('a4', 'landscape');
      return $pdf->stream('libreta.pdf');
            
     }
    
    public function registrosNotas(Request $request){
        
        $buscarpor=$request->get('buscarpor');
        $notas=DB::table('secciones as s','s.estado','=','1')
        ->join('grados as g','g.idgrado','=','s.idgrado')
        ->join('niveles as ni','ni.idnivel','=','g.idnivel')
        ->join('cursos as c','c.idgrado','=','g.idgrado')
        ->join('detalle_catedra as dc','dc.idcurso','=','c.idcurso')
        ->join('profesores as pro','pro.idprofesor','=','dc.idprofesor')
        ->where('c.curso','like','%'.$buscarpor.'%')
        ->select('pro.idprofesor','pro.profesor','c.idcurso','c.curso','ni.nivel','g.grado')->paginate($this::PAGINACION);
        
        return view('nota.registrosNotas',['nota'=>$notas,'buscarpor'=>$buscarpor]);
    }
        
    
    public function reporteRegistroNotas($id){
        $curso=Curso::where('idcurso','=',$id)->first();
        $matricula= Matricula::where('idmatricula','=',$id)->first();
        $alumno=Matricula::where('idalumno','=',$id)->first();
        $profesor=Detalle_Catedra::where('idprofesor','=',$id)->get();
        
        $notas=DB::table('matriculas as m','m.estado','=','1')
        ->join('secciones as s','s.idseccion','=','m.idseccion')
        ->join('grados as g','g.idgrado','=','s.idgrado')
        ->join('cursos as c','c.idgrado','=','g.idgrado')
        ->join('capacidades as ca','ca.idcurso','=','c.idcurso')
        ->where('ca.idcurso','=',$id)
        ->join('notas as n','n.idmatricula','=','m.idmatricula')
        ->join('alumnos as a','a.idalumno','=','m.idalumno')
        ->where('c.idcurso','=',$id)
        ->select('m.idmatricula','n.nota1','n.idnota','n.nota2','n.nota3','n.promedio','a.idalumno','a.nombres','a.apellidos')->get();
      
     $pdf = \PDF::loadView('nota.registros', compact('profesor','alumno','notas','matricula','curso',))->setPaper('a4', 'portrait');
      return $pdf->stream('registros.pdf');
            
    }
    

    public function byGrado($id){
        return Grado::where('estado','=','1')->where('idnivel','=',$id)->get();
    }
    public function bySeccion($id){
        return Seccion::where('estado','=','1')->where('idgrado','=',$id)->get();
    }
    public function byCurso($id){
        return Curso::where('estado','=','1')->where('idgrado','=',$id)->get();
    }
    public function byCapacidad($id){
     
    return Capacidad::where('estado','=','1')->where('idcurso','=',$id)->get();
    }
    public function byCapacidadNotas($id){
      

    return DB::table('capacidades as c','c.estado','=','1')
    ->where('c.idcurso','=',$id)
    ->join('cursos as cu','cu.idcurso','=','c.idcurso')
    ->where('cu.idcurso','=',$id)
    ->join('grados as g','g.idgrado','=','cu.idgrado')
    ->join('secciones as s','s.idgrado','=','g.idgrado')
    ->join('notas as n','n.idcapacidad','=','c.idcapacidad')
    ->select('n.idmatricula','c.idcapacidad','c.capacidad','c.idcurso')->get();
    //['capNotas'=>$capNotas,'todCap'=>$todCap];

    }
    public function byCapacidadNotas2($id){

        return DB::table('capacidades as c','c.estado','=','1')
        ->where('c.idcurso','=',$id)
        ->join('cursos as cu','cu.idcurso','=','c.idcurso')
        ->where('cu.idcurso','=',$id)
        ->join('grados as g','g.idgrado','=','cu.idgrado')
        ->join('secciones as s','s.idgrado','=','g.idgrado')
        ->select('c.idcapacidad','c.capacidad','c.idcurso')->get();

    }
    public function byProfesor($id){
       $catedra= Detalle_Catedra::where('estado','=','1')->where('idcurso','=',$id)->get();
       
        return  DB::table('detalle_catedra as dc','dc.estado','=','1')->join('profesores as p','dc.idprofesor','=','p.idprofesor')
        ->where('dc.idcurso','=',$id)->select('p.idprofesor','p.profesor','dc.idcurso')->get();
    }

    public function byNotas($id){

        /**/
        return DB::table('notas as n','n.estado','=','1')
        ->join('matriculas as m','n.idmatricula','=','m.idmatricula')
       // ->join('secciones as s','s.idseccion','=','%'.$seccion.'%')
        ->join('alumnos as a','m.idalumno','=','a.idalumno')
        ->where('n.idcapacidad','like',$id)
        ->select('m.idmatricula','m.idperiodo','n.nota1','n.idnota','n.nota2','n.nota3','n.promedio','a.idalumno','a.nombres','a.apellidos')->get();
    
    }

    public function MiNota($id){
     
        return Nota::where('estado','=','1')->where('idnota','=',$id)->get();
        }

    public function byMatricula($id){
     
       return Matricula::where('estado','=','1')->where('idalumno','=',$id)->get();
     }
     public function byCursoM($id){

        return DB::table('cursos as c','c.estado','=','1')
        ->join('grados as g','c.idgrado','=','g.idgrado')
        ->join('secciones as s','g.idgrado','=','s.idgrado')
        ->join('matriculas as m','m.idseccion','=','s.idseccion')
        ->where('m.idmatricula','like','%'.$id.'%')->select('c.idcurso','c.curso','s.idseccion','s.seccion')->get();
    }

    public function create()
    {
        $capacidad=Capacidad::where('estado','=','1')->get();
        //,$itemnota->idcapacidad
        $matricula=Matricula::where('estado','=','1')->get();
        $alumno=Alumno::where('estado','=','1')->get();   
        $notas=Nota::where('estado','=','1')->get();      
        return view('nota.create',['notitas'=>$notas,'alumno'=>$alumno,'matricula'=>$matricula,'capacidad'=>$capacidad]);
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
            'idalumno'=>'required',
            'idmatricula'=>'required',
            'idcapacidad'=>'required',
            'nota1'=>'required',
            'nota2'=>'required',
            'nota3'=>'required',
        ],
        [
         'idalumno.required'=>'Seleccione un alumno',
         'idmatricula.required'=>'Seleccione una matricula',
         'idcapacidad.required'=>'Seleccione una capacidad',
         'nota1.required'=>'ingrese la nota 1',
         'nota2.required'=>'ingrese la nota 2',
         'nota3.required'=>'ingrese la nota 3',
         
        ]);
 
    if(
    (DB::table('notas as n','n.estado','=','1')->where('n.idmatricula','=',$request->idmatricula)->where('n.idcapacidad','=',$request->idcapacidad))->count()>=1)
        {
        return redirect()->route('nota.create')->with('datos','Este Alumno Ya Tiene Notas en Esta Capacidad...!');
        }
    else
    {
        
    $nota=new Nota();    
    $nota->idmatricula=$request->idmatricula;   
    $nota->idcapacidad=$request->idcapacidad;  
    $nota->nota1=$request->nota1;  
    $nota->nota2=$request->nota2;   
    $nota->nota3=$request->nota3;   
    $nota->promedio=($request->nota1+$request->nota2+$request->nota3)/3; 
    
    $nota->estado='1';   //campo de estado
    $nota->save();       
    return redirect()->route('nota.index')->with('datos','Registro Nuevo Guardado...!'); //devolvemos los datos q usara el index
   }
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
        $alumno=Alumno::where('estado','=','1')->get();        
        return view('nota.edit',compact('nota','alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actualizar(Request $request)
    {
        $data=request()->validate([
            'idnota'=>'required',
            'nota1'=>'required|max:20',
            'nota2'=>'required|max:20',
            'nota3'=>'required|max:20',
           
        ],
        [
            'nota1.required'=>'INGRESE NOTA 1 DEL ESTUDIANTE',
            'nota1.max'=>'MAXIMO 20 CARACTERES PARA LA NOTA 1',
            'nota2.required'=>'INGRESE NOTA 2 DEL ESTUDIANTE',
            'nota2.max'=>'MAXIMO 20 CARACTERES PARA LA NOTA 2',
            'nota3.required'=>'INGRESE NOTA 3 DEL ESTUDIANTE',
            'nota3.max'=>'MAXIMO 20 CARACTERES PARA LA NOTA 3',
             
        ]);
        $nota=Nota::findOrFail($request->idnota);
        $nota->nota1=$request->nota1;
        $nota->nota2=$request->nota2;
        $nota->nota3=$request->nota3;
        $nota->promedio=($request->nota1+$request->nota2+$request->nota3)/3;
        $nota->save();
        return redirect()->route('nota.index')->with('datos','REGISTRO ACTUALIZADO...!');
    

    }


    public function update(Request $request)
    {
        $data=request()->validate([
            'nota1'=>'required|max:2',
            'nota2'=>'required|max:2',
            'nota3'=>'required|max:2',
           
        ],
        [
            'nota1.required'=>'INGRESE NOTA 1 DEL ESTUDIANTE',
            'nota1.max'=>'MAXIMO 2 CARACTERES PARA LA NOTA 1',
            'nota2.required'=>'INGRESE NOTA 2 DEL ESTUDIANTE',
            'nota2.max'=>'MAXIMO 2 CARACTERES PARA LA NOTA 2',
            'nota3.required'=>'INGRESE NOTA 3 DEL ESTUDIANTE',
            'nota3.max'=>'MAXIMO 2 CARACTERES PARA LA NOTA 3',
             
        ]);
        $nota=Nota::findOrFail($request->idnota);
        $nota->nota1=$request->nota1;
        $nota->nota2=$request->nota2;
        $nota->nota3=$request->nota3;
        $nota->promedio=($request->nota1+$request->nota2+$request->nota3)/3;
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
