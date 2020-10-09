<?php

namespace App\Http\Controllers;
use App\Grado;   //no olvidar poner esto
use App\Nivel;
use Illuminate\Http\Request;


class GradoController extends Controller
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

    CONST PAGINACION=4;  //numero de filas en la tabla para que apse a las siguiente

    public function index( Request $request)  //voy a hacer una consulta por descripcion poer eso request
    
    {

       $buscarpor=$request->get('buscarpor');
       $grado=Grado::where('estado','=','1')->where('grado','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);   
       return view('grado.index',compact('grado','buscarpor')); 
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivel=Nivel::where('estado','=','1')->get();
        return view('grado.create',compact('nivel'));
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
            'grado'=>'required|max:30'
        ],
        [
            'grado.required'=>'Ingrese grado',
            'grado.max'=>'Máximo 30 caracteres para el grado'
        ]);
        
        $grado=new Grado();    //instanciamos nuestro modelo categoria
        $grado->grado=$request->titVideo;  //designamos el valor de descripcion
        $grado->idnivel=$request->idnivel;  //designamos el valor de descripcion
        $grado->estado='1';   //campo de descripcion
        $grado->save();       
        return redirect()->route('grado.index')->with('datos','Registro Nuevo Guardado...!'); //devolvemos los datos q usara el index



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
    public function edit($idvideo)
    {
        $nivel=Nivel::where('estado','=','1')->get();
        $grado=Grado::findOrfail($idvideo);
        
        return view('grado.edit',compact('nivel','grado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idgrado)
    {
        $grado=Grado::findOrfail($idgrado);    //instanciamos nuestro modelo categoria
        $grado->grado=$request->grado;  //designamos el valor de descripcion
        $grado->idnivel=$request->idnivel;  //designamos el valor de descripcion
    
        $grado->estado='1';   //campo de descripcion
        $grado->save();       
        return redirect()->route('grado.index')->with('datos','Registro Actualizado...!'); //devolvem
       
    }


    public function confirmar($id){
        $grado=Grado::find($id);
        return view('grado.confirmar',compact('grado'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grado=Grado::findOrFail($id);
        $grado->estado='0';
        $grado->save();
        return redirect()->route('grado.index')->with('datos','Registro Eliminadoa...!');
        
    }
}
