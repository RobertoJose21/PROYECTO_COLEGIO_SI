<?php

namespace App\Http\Controllers;
use App\Periodo;   //no olvidar poner esto
use Illuminate\Http\Request;


class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    CONST PAGINACION=10;  //numero de filas en la tabla para que apse a las siguiente

    public function index( Request $request)  //voy a hacer una consulta por descripcion poer eso request    
    {
       $buscarpor=$request->get('buscarpor');
       $periodo=Nivel::where('estado','=','1')->where('periodo','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);   //creo una variable categorias y llamo a todas con estado 1 y lo almacena
       return view('periodo.index',compact('periodo','buscarpor'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodo.create');
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
                'periodo'=>'required|max:4'
            ],
            [
                'periodo.required'=>'Ingrese periodo',
                'periodo.max'=>'Máximo 4 caracteres para el periodo'
            ]);
        $periodo=new Nivel();    //instanciamos nuestro modelo categoria
        $periodo->periodo=$request->periodo;  //designamos el valor de descripcion
        $periodo->estado='1';   //campo de descripcion
        $periodo->save();       
        return redirect()->route('periodo.index')->with('datos','Registro Nuevo Guardado...!'); //devolvemos los datos q usara el index
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
        $periodo=Periodo::findOrfail($id);
        return view('periodo.edit',compact('periodo'));
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
            'periodo'=>'required|max:4'
        ],
        [
            'periodo.required'=>'Ingrese periodo',
            'periodo.max'=>'Máximo 4 caracteres para el periodo'
        ]);

        $periodo=Periodo::findOrFail($id);
        $periodo->periodo=$request->periodo;
        $periodo->estado='1';   //campo de descripcion
        $periodo->save();
        return redirect()->route('periodo.index')->with('datos','Registro Actualizado...!');
    }


    public function confirmar($id){
        $periodo=Periodo::find($id);
        return view('periodo.confirmar',compact('periodo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo=Periodo::findOrFail($id);
        $periodo->estado='0';
        $periodo->save();
        return redirect()->route('periodo.index')->with('datos','Registro Eliminado...!');
    }
}
