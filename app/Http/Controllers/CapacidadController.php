<?php

namespace App\Http\Controllers;

use App\Capacidad;
use App\Curso;
use App\Grado;
use Illuminate\Http\Request;
use App\Nivel;
use DB;



class CapacidadController extends Controller
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
    const PAGINACION=5;
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $capacidad=Capacidad::where('estado','=','1')->where('capacidad','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);   //creo una variable categorias y llamo a todas con estado 1 y lo almacena
        return view('capacidad.index',compact('capacidad','buscarpor'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso=Curso::where('estado','=','1')->get();
        $nivel=Nivel::where('estado','=','1')->get();
        return view('capacidad.create',compact('curso','nivel'));
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
            'capacidad'=>'required|max:50',
            
        ],
        [
            'capacidad.required'=>'Ingrese capacidad ',
            'capacidad.max'=>'Máximo 50 caracteres para la capacidad'
          
            ]);
  
            $capacidad=new Capacidad();    //instanciamos nuestro modelo categoria
            $capacidad->capacidad=$request->capacidad;  //designamos el valor de descripcion
            $capacidad->idcurso=$request->idcurso;  //designamos el valor de descripcion
            $capacidad->estado='1';   //campo de descripcion
            
            if((DB::table('capacidades as ca','ca.estado','=','1')->where('ca.idcurso','=',$request->idcurso))->count()>=3)
            {
                return redirect()->route('capacidad.create')->with('datos','Este Curso ya tiene Tres capacidades...!');
            }            
            else
            {
                $capacidad->save();     
              return redirect()->route('capacidad.index')->with('datos','Registro Nuevo Guardado...!'); 
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
    public function edit($id)
    {
        $capacidad=Capacidad::findOrfail($id);
        $curso=Curso::where('estado','=','1')->get();
        $nivel=Nivel::where('estado','=','1')->get();

        return view('capacidad.edit',compact('capacidad','curso','nivel'));
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
            'capacidad'=>'required|max:50',
            
        ],
        [
            'capacidad.required'=>'Ingrese capacidad ',
            'capacidad.max'=>'Máximo 50 caracteres para la capacidad',
          
            ]);
   
              $capacidad=Capacidad::findOrfail($id);    //instanciamos nuestro modelo categoria
              $capacidad->capacidad=$request->capacidad;  //designamos el valor de descripcion
              $capacidad->idcurso=$request->idcurso;  //designamos el valor de descripcion
              $capacidad->estado='1';   //campo de descripcion
              $capacidad->save();     
              return redirect()->route('capacidad.index')->with('datos','Registro Actualizado...!'); 
  
              
        }

    public function confirmar($id){
        $capacidad=Capacidad::find($id);
        return view('capacidad.confirmar',compact('capacidad'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capacidad=Capacidad::findOrFail($id);
        $capacidad->estado='0';
        $capacidad->save();
        return redirect()->route('capacidad.index')->with('datos','Registro Eliminado...!');
    }


    public function byGrado($id){
        return Grado::where('estado','=','1')->where('idnivel','=',$id)->get();
    }
    public function byCurso($id){
        return Curso::where('estado','=','1')->where('idgrado','=',$id)->get();
    }

  
}
