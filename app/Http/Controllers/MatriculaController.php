<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Estudiante;
use App\Matricula;
use App\Grado;
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
        //$producto=Producto::where('estado','=','1')->paginate($this::PAGINATION);
        $matricula=Matricula::where('estado','=','1')->where('fecha','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);   //creo una variable categorias y llamo a todas con estado 1 y lo almacena
        return view('matricula.index',compact('matricula','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seccion=Seccion::where('estado','=','1')->get();
        $estudiante=Estudiante::where('estado','=','1')->get();
        $grado=Grado::where('estado','=','1')->get();
        return view('matricula.create',compact('seccion','estudiante','grado'));

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
            'escala'=>'required|max:1',
            
            'añoescolar'=>'required|max:4',
            
        ],
        [

            'escala.required'=>'Ingrese la escala de la matricula',
            'escala.max'=>'Máximo  1 caracter para la escala',
            'añoescolar.required'=>'Ingrese el año escolar de la matricula',
            'añoescolar.max'=>'Máximo  4 caracter para el año escolar',
        
        ]);


    $matricula=new Matricula();    
    $matricula->fecha=$request->fecha;  //designamos el valor de descripcion
    $matricula->estudiante_id=$request->estudiante_id;  //designamos el valor de descripcion
    $matricula->nivel=$request->nivel;  //designamos el valor de descripcion
    $matricula->año=$request->año;  //designamos el valor de descripcion
    $matricula->nameseccion=$request->nameseccion;  //seccion 
    $matricula->escala=$request->escala;  //designamos el valor de descripcion
    $matricula->añoescolar=$request->añoescolar;  //designamos el valor de descripcion

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
    public function edit($numeromatricula)
    {
        
        $matricula=Matricula::findOrfail($numeromatricula);
        $seccion=Seccion::where('estado','=','1')->get();
        $estudiante=Estudiante::where('estado','=','1')->get();
        $grado=Grado::where('estado','=','1')->get();

        return view('matricula.edit',compact('matricula','seccion','estudiante','grado'));
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
            'escala'=>'required|max:1',
            
            'añoescolar'=>'required|max:4',
            
        ],
        [

            'escala.required'=>'Ingrese la escala de la matricula',
            'escala.max'=>'Máximo  1 caracter para la escala',
            'añoescolar.required'=>'Ingrese el año escolar de la matricula',
            'añoescolar.max'=>'Máximo  4 caracter para el año escolar',
        
        ]);


    $matricula=Matricula::findOrfail($numeromatricula);    //instanciamos nuestro modelo categoria
    $matricula->fecha=$request->fecha;  //designamos el valor de descripcion
    $matricula->estudiante_id=$request->estudiante_id;  //designamos el valor de descripcion
    $matricula->nivel=$request->nivel;  //designamos el valor de descripcion
    $matricula->año=$request->año;  //designamos el valor de descripcion
    $matricula->nameseccion=$request->nameseccion;  //seccion 
    $matricula->escala=$request->escala;  //designamos el valor de descripcion
    $matricula->añoescolar=$request->añoescolar;  //designamos el valor de descripcionon

    $matricula->estado='1';   //campo de descripcion
    $matricula->save();       
    return redirect()->route('matricula.index')->with('datos','Registro Actualizado...!'); //devolvem
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
}
