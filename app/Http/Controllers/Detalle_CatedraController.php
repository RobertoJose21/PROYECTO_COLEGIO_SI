<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alumno;
use App\Pais;
use App\Distrito;
use App\Provincia;
use App\Departamento;
use App\Grado;
use App\Seccion;
use App\Periodo;
use App\Curso;
use App\Matricula;
use App\Capacidad;
use App\Profesor;
use App\Detalle_Catedra;
use App\Nivel;
use DB;

class Detalle_CatedraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION=6;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
       // $profesoes=Profesor::where('profesor','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        $catedras=DB::table('detalle_catedra as ca','ca.estado','=','1')
        ->join('periodos as pe','pe.idperiodo','=','ca.idperiodo')
        ->join('profesores as p','p.idprofesor','=','ca.idprofesor')
        ->where('p.profesor','like','%'.$buscarpor.'%')
        ->join('cursos as c','c.idcurso','=','ca.idcurso')
        ->join('grados as g','g.idgrado','=','c.idgrado')
        ->join('niveles as n','n.idnivel','=','g.idnivel')
        ->where('ca.estado','=','1')
        ->select('n.nivel','g.grado','pe.idperiodo','pe.periodo','c.curso','p.profesor','ca.id','p.idprofesor','c.idcurso')->paginate($this::PAGINACION);
        
       $periodos=DB::table('periodos')->get();
        return view('catedra.index',['periodo'=>$periodos,'catedras'=>$catedras,'buscarpor'=>$buscarpor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        $grado=Grado::where('estado','=','1')->get();
        $seccion=Seccion::where('estado','=','1')->get();
        
        $curso=Curso::where('estado','=','1')->get();
        $profesor=Profesor::where('estado','=','1')->get();
        $nivel=Nivel::where('estado','=','1')->get();
        $periodo=Periodo::where('estado','=','1')->get();

       
       return view( 'catedra.create',['periodo'=>$periodo,'nivel'=>$nivel,'seccion'=>$seccion,'grado'=>$grado,'curso'=>$curso,'profesor'=>$profesor]);
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
            'idcurso'=>'required',   
            'idprofesor'=>'required', 
            'idperiodo'=>'required',     
        ],
        [
            'idcurso.required'=>'Seleccione Un Curso', 
            'idprofesor.required'=>'Seleccione Un Profesor',  
            'idperiodo.required'=>'Seleccione Un Perido', 
        ]);

        try{
            DB::beginTransaction();
              //$profesor=Profesor::find($request->idprofesor);
              $catedrita=Detalle_Catedra::all();
              $cursos=$request->idcursos;
            foreach ($cursos as $curso)
            {   try{$idcursito=$curso[0]*10+$curso[1];}
                catch(\Exception $e){$idcursito=$curso[0]; }
                    foreach($catedrita as $cat){
                        if($cat->idcurso == $idcursito && $cat->idperiodo==$request->idperiodo) {
                            return redirect()->route('catedra.create')->with('datos','Uno de Los Cursos Ya Esta Asignado a un Profesor...!');
                        }
                    }
                $catedra=new Detalle_Catedra();
                $catedra->idprofesor=$request->idprofesor;
                try{$catedra->idcurso=$curso[0]*10+$curso[1]; }   //para 2 digitos se agregaria *10+$curso[1]
                catch(\Exception $e){$catedra->idcurso=$curso[0]; }  //el id curso solo tiene un digito
                
                $catedra->idperiodo=$request->idperiodo;
                $catedra->estado='1';
                $catedra->save();
            }
            DB::commit();
        }
        catch(\Exception $e)
        { 
            dd($e);
            DB::rollback();
        }
        return redirect()->route('catedra.index')->with('datos','Registro Catedra Guardado...!');
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
    public function edit($id)
    {
      
       $catedra=Detalle_Catedra::findOrfail($id);
       $cursos= Curso::where('estado','=','1')->get();
       $profesores= Profesor::where('estado','=','1')->get();
       $nivel= Nivel::where('estado','=','1')->get();
       $periodo= DB::table('periodos as p')
       //->where('p.estado','=','1')
       ->get();
       
       return view( 'catedra.edit',['periodo'=>$periodo,'nivel'=>$nivel,'catedra'=>$catedra,'cursos'=>$cursos,'profesores'=>$profesores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'idcurso'=>'required',   
            'idprofesor'=>'required', 
            'idperiodo'=>'required',      
        ],
        [
            'idcurso.required'=>'Seleccione Un Curso', 
            'idprofesor.required'=>'Seleccione Un Profesor',
            'idperiodo.required'=>'Seleccione Un Periodo',  
        ]);
     
        
       $catedritas = Detalle_Catedra::all();
       $catedra = Detalle_Catedra::findOrfail($id);
      if($catedra->idcurso!=$request->idcurso){
        foreach($catedritas as $cat){ 
           if( $cat->idcurso == $request->idcurso){
            return redirect()->route('catedra.edit',$catedra->id)->with('datos','Este Curso Ya Tiene un Profesor Asignado...!');;
            }
        } }
       
       $catedra->idprofesor=$request->idprofesor;
       $catedra->idcurso=$request->idcurso;
       $catedra->idperiodo=$request->idperiodo;
       $catedra->save();
        return redirect()->route('catedra.index')->with('datos','Registro Catedra Actualizado...!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Detalle_Catedra::find($id)->delete();
        $catedra = Detalle_Catedra::findOrfail($id);
        $catedra->estado='0';
        $catedra->save();
        return redirect()->route('catedra.index')->with('datos','Registro Catedra Eliminado...!');
    }
}
