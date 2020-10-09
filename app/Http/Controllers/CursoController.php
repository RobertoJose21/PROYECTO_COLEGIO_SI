<?php

namespace App\Http\Controllers;
use App\Grado;
use App\Capacidad;
use App\Curso;
use Illuminate\Http\Request;
use App\Nivel;
use DB;



class CursoController extends Controller
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
        $curso=Curso::where('estado','=','1')->where('curso','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);   //creo una variable categorias y llamo a todas con estado 1 y lo almacena
        return view('curso.index',compact('curso','buscarpor'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grado=Grado::where('estado','=','1')->get();
        $capacidad=Capacidad::where('estado','=','1')->get();
        $nivel=Nivel::where('estado','=','1')->get();

        return view('curso.create',compact('grado','capacidad','nivel'));
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
            'curso'=>'required|max:50',
            'codigocurso'=>'required|max:2'
        ],
        [
            'curso.required'=>'Ingrese curso ',
            'curso.max'=>'Máximo 50 caracteres para el curso',
            'codigocurso.required'=>'Ingrese codigo del curso ',
            'codigocurso.max'=>'Máximo 2 caracteres para el codigo del curso'
            ]);
  
            $curso=new Curso();    //instanciamos nuestro modelo categoria
            $curso->curso=$request->curso;  //designamos el valor de descripcion
            $curso->codigocurso=$request->codigocurso;  //designamos el valor de descripcion
            $curso->idgrado=$request->idgrado;  //designamos el valor de descripcion
            $curso->estado='1';   //campo de descripcion
            
            if((DB::table('cursos as c','c.estado','=','1')->where('c.curso','=',$request->curso))->where('c.idgrado','=',$request->idgrado)->count()>=1)
            {
                return redirect()->route('curso.create')->with('datos','Esta Curso ya esta asignado a ese grado...!');
            }            
            else
            {
                $curso->save();     
              return redirect()->route('curso.index')->with('datos','Registro Nuevo Guardado...!'); 
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
        $curso=Curso::findOrfail($id);
        $grado=Grado::where('estado','=','1')->get();
        $nivel=Nivel::where('estado','=','1')->get();
        return view('curso.edit',compact('curso','grado','nivel'));
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
            'curso'=>'required|max:50',
            'codigocurso'=>'required|max:2'
        ],
        [
            'curso.required'=>'Ingrese curso ',
            'curso.max'=>'Máximo 50 caracteres para el curso',
            'codigocurso.required'=>'Ingrese codigo del curso ',
            'codigocurso.max'=>'Máximo 2 caracteres para el codigo del curso'
            ]);
  
            $curso=Curso::findOrfail($id);    //instanciamos nuestro modelo categoria
            $curso->curso=$request->curso;  //designamos el valor de descripcion
            $curso->codigocurso=$request->codigocurso;  //designamos el valor de descripcion
            $curso->idgrado=$request->idgrado;  //designamos el valor de descripcion
            $curso->estado='1';   //campo de descripcion
            
            if((DB::table('cursos as c','c.estado','=','1')->where('c.curso','=',$request->curso))->where('c.idgrado','=',$request->idgrado)->count()>=1)
            {
                return redirect()->route('curso.edit')->with('datos','Esta Curso ya esta asignado a ese grado...!');
            }            
            else
            {
                $curso->save();     
              return redirect()->route('curso.index')->with('datos','Registro Actualizado...!'); 
             }
    }

    public function confirmar($id){
        $curso=Curso::find($id);
        return view('curso.confirmar',compact('curso'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Curso::findOrFail($id);
        $curso->estado='0';
        $curso->save();
        return redirect()->route('curso.index')->with('datos','Registro Eliminado...!');
    }

    public function byGrado($id){
        return Grado::where('estado','=','1')->where('idnivel','=',$id)->get();
    }
}
