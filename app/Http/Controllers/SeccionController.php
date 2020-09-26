<?php

namespace App\Http\Controllers;
use App\Seccion;   //no olvidar poner esto
use Illuminate\Http\Request;
use App\Grado;


class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    CONST PAGINACION=4;  //numero de filas en la tabla para que apse a las siguiente

    public function index( Request $request)  //voy a hacer una consulta por descripcion poer eso request
    
    {

        $buscarpor=$request->get('buscarpor');
        //el del dolar tiene q ser igual con el de compact las variables

       // $categoria=Categoria::where('estado','=','1')->get();
       $seccion=Seccion::where('estado','=','1')->where('nameseccion','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);   //creo una variable categorias y llamo a todas con estado 1 y lo almacena
     //  return view('categoria.index',compact('categoria')); 
       return view('seccion.index',compact('seccion','buscarpor'));  //llamamos a la vista y luego envio a la vista mi varibale categoria 
        //el valor de buscarpor no se pierda
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view('seccion.create',compact('grado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
         /*   $data=request()->validate([
                'descripcion'=>'required|max:30'
            ],
            [
                'descripcion.required'=>'Ingrese descripcion de categoria',
                'descripcion.max'=>'Máximo 30 caracteres para la descripcion'
            ]);
        $seccion=new Categoria();    //instanciamos nuestro modelo categoria
        $seccion->descripcion=$request->descripcion;  //designamos el valor de descripcion
        $seccion->estado='1';   //campo de descripcion
        $seccion->save();       
        return redirect()->route('seccion.index')->with('datos','Registro Nuevo Guardado...!'); *///devolvemos los datos q usara el index
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
       /* $seccion=Categoria::findOrfail($id);
        return view('seccion.edit',compact('seccion'));*/
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
       /* $data=request()->validate([
            'descripcion'=>'required|max:30'
        ],[
            'descripcion.required'=>'Ingrese descripcion de categoria',
            'descripcion.max'=>'maximo de 30 caracteres para descripcion',
        ]);

        $seccion=Categoria::findOrFail($id);
        $seccion->descripcion=$request->descripcion;
        $seccion->save();
        return redirect()->route('seccion.index')->with('datos','Registro Actualizado...!');*/
    }


    public function confirmar($id){
       /* $seccion=Categoria::find($id);
        return view('seccion.confirmar',compact('categoria'));*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      /*  $seccion=Seccion::findOrFail($id);
        $seccion->estado='0';
        $seccion->save();
        return redirect()->route('seccion.index')->with('datos','Registro Eliminado...!');*/
    }
}
