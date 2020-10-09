<?php

namespace App\Http\Controllers;
use App\Seccion;   //no olvidar poner esto
use Illuminate\Http\Request;
use App\Grado;
use DB;


class SeccionController extends Controller
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

    CONST PAGINACION=6;  //numero de filas en la tabla para que apse a las siguiente

    public function index( Request $request)  //voy a hacer una consulta por descripcion poer eso request
    
    {
       $buscarpor=$request->get('buscarpor');
       $seccion=Seccion::where('estado','=','1')->where('seccion','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);  
       return view('seccion.index',compact('seccion','buscarpor'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $grado=Grado::where('estado','=','1')->get();
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
            $data=request()->validate([
                'seccion'=>'required|max:1'
            ],
            [
                'seccion.required'=>'Ingrese seccion ',
                'seccion.max'=>'Máximo 1 caracter para seccion'
                ]);
      
                $seccion=new Seccion();    //instanciamos nuestro modelo categoria
                $seccion->seccion=$request->seccion;  //designamos el valor de descripcion
                $seccion->idgrado=$request->idgrado;  //designamos el valor de descripcion
                $seccion->estado='1';   //campo de descripcion
                
                if((DB::table('secciones as s','s.estado','=','1')->where('s.seccion','=',$request->seccion))->where('s.idgrado','=',$request->idgrado)->count()>=1)
                {
                    return redirect()->route('seccion.create')->with('datos','Esta Seccion ya esta asignado a ese grado...!');
                }            
                else
                {
                  $seccion->save();     
                  return redirect()->route('seccion.index')->with('datos','Registro Nuevo Guardado...!'); 
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
        $grado=Grado::where('estado','=','1')->get();
        $seccion=Seccion::findOrfail($id);
        
        return view('seccion.edit',compact('seccion','grado'));
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
            'seccion'=>'required|max:1'
        ],
        [
            'seccion.required'=>'Ingrese seccion ',
            'seccion.max'=>'Máximo 1 caracter para seccion'
        ]);

        $seccion=Seccion::findOrFail($id);
        $seccion->seccion=$request->seccion;
        $seccion->idgrado=$request->idgrado;  //designamos el valor de descripcion
    
        $seccion->estado='1';   //campo de descripcion

        if((DB::table('secciones as s','s.estado','=','1')->where('s.seccion','=',$request->seccion))->where('s.idgrado','=',$request->idgrado)->count()>=1)
                {
                    return redirect()->route('seccion.edit',$seccion->idseccion)->with('datos','Esta Seccion ya esta asignado a ese grado...!');
                }
                else{

                    $seccion->save();  
                    return redirect()->route('seccion.index')->with('datos','Registro Actualizado...!');
                }
    }

    


    public function confirmar($id){
        $seccion=Seccion::find($id);
        return view('seccion.confirmar',compact('seccion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seccion=Seccion::findOrFail($id);
        $seccion->estado='0';
        $seccion->save();
        return redirect()->route('seccion.index')->with('datos','Registro Eliminado...!');
    }
}
