<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use App\Detalle_Catedra;
use DB;
class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    const PAGINACION=5;

    public function index(Request $request)
    {
            $buscarpor=$request->get('buscarpor');
            $profesor=Profesor::where('estado','=','1')->where('profesor','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);           
            if (Profesor::where('estado','=','1')) {
                $estadoprof='REGISTRADO';
            }
            else
            {
                $estadoprof='NO REGISTRADO';
            }
            return view('profesor.index',['profesor'=>$profesor,'buscarpor'=>$buscarpor,'estadoprof'=>$estadoprof]);
    }

    
    public function create()
    {
        $profesor=Profesor::where('estado','=','1')->get(); 
        return view('profesor.create',compact('profesor'));
    }

    
    public function store(Request $request)
    {
        $data=request()->validate([
            'codigoprofesor'=>'required|max:18',
            'profesor'=>'required|max:50',
         ],[
            'codigoprofesor.required'=>'Ingrese el codigo del profesor',
            'codigoprofesor.max'=>'Maximo 18 caracteres para el codigo',
            'profesor.required'=>'Ingrese el nombre del profesor',
            'profesor.max'=>'Maximo 50 caracteres para el nombre del profesor',
    ]);

        $profesor=new Profesor();
        $profesor->codigoprofesor=$request->codigoprofesor;
        $profesor->profesor=$request->profesor;
        $profesor->estado='1';
        $profesor->save();
        return redirect()->route('profesor.index')->with('datos', 'Profesor Creado correctamente!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $profesor=Profesor::findOrFail($id);
        return view('profesor.edit',compact('profesor'));
    }

    
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'codigoprofesor'=>'required|max:18',
            'profesor'=>'required|max:50',
        ],[
            'codigoprofesor.required'=>'Ingrese el codigo del profesor',
            'codigoprofesor.max'=>'Maximo 18 caracteres para el codigo',
            'profesor.required'=>'Ingrese el nombre del profesor',
            'profesor.max'=>'Maximo 50 caracteres para el nombre del profesor',
    ]);
        $profesor=Profesor::findOrFail($id);
        $profesor->codigoprofesor=$request->codigoprofesor;
        $profesor->profesor=$request->profesor;
        $profesor->save();
    return redirect()->route('profesor.index')->with('datos', 'Profesor editado correctamente!');

    }

    
    public function destroy($id)
    {
        
        $profesor=Profesor::find($id);
        $profesor->estado='0';
        $profesor->save();
        return redirect()->route('profesor.index')->with('datos', 'Profesor eliminado');
    }
}
