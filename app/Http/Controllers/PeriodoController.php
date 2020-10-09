<?php

namespace App\Http\Controllers;
use App\Periodo;   //no olvidar poner esto
use Illuminate\Http\Request;
use DB;

class PeriodoController extends Controller
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
       $periodo=Periodo::where('periodo','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);   //creo una variable categorias y llamo a todas con estado 1 y lo almacena
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
        $perioditos=DB::table('periodos')->get();
        foreach($perioditos as $period){
            if($period->periodo==$request->periodo){
            return redirect()->route('periodo.create')->with('datos','Este Periodo Ya Existe...!');}
            }
        $periodo=new Periodo();    //instanciamos nuestro modelo categoria
        $periodo->periodo=$request->periodo;  //designamos el valor de descripcion
        $periodo->estado='1';   //campo de descripcion


        if((DB::table('periodos as p','p.estado','=','1')->where('p.periodo','=',$request->periodo))->count()>=1)
                {
                    return redirect()->route('periodo.create')->with('datos','Este Periodo ya esta registrado...!');
                }
                
                else
                {
                  $periodo->save();     
                  return redirect()->route('periodo.index')->with('datos','Registro Nuevo Guardado...!'); 

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
        $perioditos=DB::table('periodos')->get();
        foreach($perioditos as $period){
            if($period->periodo==$request->periodo){
            return redirect()->route('periodo.edit',$id)->with('datos','Este Periodo Ya Existe...!');}
            }

        $periodo=Periodo::findOrFail($id);
        $periodo->periodo=$request->periodo;
        $periodo->estado=$request->estado;   //campo de descripcion
        $periodo->save();
        return redirect()->route('periodo.index')->with('datos','Registro Actualizado...!');
      

        if((DB::table('periodos as p','p.estado','=','1')->where('p.periodo','=',$request->periodo))->count()>=1)
        {
            return redirect()->route('periodo.create')->with('datos','Este Periodo ya esta registrado...!');
        }
        
        else
        {
          $periodo->save();     
          return redirect()->route('periodo.index')->with('datos','Registro Actualizado...!'); 

         }
       
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
        if($periodo->estado==1){$periodo->estado='0';}
        else{ $periodo->estado='1';} 
        $periodo->save();
        return redirect()->route('periodo.index')->with('datos','Estado Del Periodo Cambiado...!');
    }
}
