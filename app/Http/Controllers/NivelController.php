<?php

namespace App\Http\Controllers;
use App\Nivel;   //no olvidar poner esto
use Illuminate\Http\Request;


class NivelController extends Controller
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

    CONST PAGINACION=10;  //numero de filas en la tabla para que apse a las siguiente

    public function index( Request $request)  //voy a hacer una consulta por descripcion poer eso request    
    {
       $buscarpor=$request->get('buscarpor');
       $nivel=Nivel::where('estado','=','1')->where('nivel','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);   //creo una variable categorias y llamo a todas con estado 1 y lo almacena
       return view('nivel.index',compact('nivel','buscarpor'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nivel.create');
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
                'nivel'=>'required|max:30'
            ],
            [
                'nivel.required'=>'Ingrese nivel',
                'nivel.max'=>'Máximo 30 caracteres para el nivel'
            ]);
        $nivel=new Nivel();    //instanciamos nuestro modelo categoria
        $nivel->nivel=$request->nivel;  //designamos el valor de descripcion
        $nivel->estado='1';   //campo de descripcion
        $nivel->save();       
        return redirect()->route('nivel.index')->with('datos','Registro Nuevo Guardado...!'); //devolvemos los datos q usara el index
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
        $nivel=Nivel::findOrfail($id);
        return view('nivel.edit',compact('nivel'));
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
            'nivel'=>'required|max:30'
        ],[
            'nivel.required'=>'Ingrese nivel',
            'nivel.max'=>'maximo de 30 caracteres para nivel',
        ]);

        $nivel=Nivel::findOrFail($id);
        $nivel->nivel=$request->nivel;
        $nivel->save();
        return redirect()->route('nivel.index')->with('datos','Registro Actualizado...!');
    }


    public function confirmar($id){
        $nivel=Nivel::find($id);
        return view('nivel.confirmar',compact('nivel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nivel=Nivel::findOrFail($id);
        $nivel->estado='0';
        $nivel->save();
        return redirect()->route('nivel.index')->with('datos','Registro Eliminado...!');
    }
}
