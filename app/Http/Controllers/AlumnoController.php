<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Pais;
use App\Distrito;
use App\Provincia;
use App\Departamento;
use DB;
class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION=5;
    
    public function index(Request $request)
        {
            $buscarpor=$request->get('buscarpor');
            $alumno=Alumno::where('apellidos','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
            
            if (Alumno::where('estado','==','1')) {
                $estadom='REGISTRADO';
            }
            else
            {
                $estadom='NO REGISTRADO';
            }
           
            return view('alumno.index',['alumno'=>$alumno,'buscarpor'=>$buscarpor,'estadom'=>$estadom]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais=Pais::where('estado','=','1')->get(); 
        return view('alumno.create',['pais'=>$pais]);
    }


    public function store(Request $request)
    {
        $data=request()->validate([
            'nombres'=>'required|max:50',
            'apellidos'=>'required|max:50',
            'lenguamaterna'=>'required|max:50',
            'colegioprocedencia'=>'required|max:50',
            'direccion'=>'required|max:50',
            'mediotransporte'=>'required|max:50',
            'tiempodemora'=>'required',
            'dni'=>'required|max:8',
            'codigoalumno'=>'required|max:10',
        ],[
            'nombres.required'=>'Ingrese el nombre del alumno',
            'nombres.max'=>'Maximo 50 caracteres para el nombre',
            'apellidos.required'=>'Ingrese el apellido del alumno',
            'apellidos.max'=>'Maximo 50 caracteres para el apellido del alumno',
            'colegioprocedencia.required'=>'Ingrese el colegio de procedencia del alumno',
            'colegioprocedencia.max'=>'Maximo 50 caracteres para el colegio procedencia del alumno',
            'direccion.required'=>'Ingrese la direccion del alumno',
            'direccion.max'=>'Maximo 50 caracteres para la direccion del alumno',
            'mediotransporte.required'=>'Ingrese el medio de transporte del alumno',
            'mediotransporte.max'=>'Maximo 50 caracteres para el medio de transporte del alumno',
            'tiempodemora.required'=>'Ingrese el tiempo de demora del transporte del alumno',
            'lenguamaterna.required'=>'Ingrese la lengua materna del alumno',
            'lenguamaterna.max'=>'Maximo 50 caracteres para la lengua materna del alumno',
            'dni.required'=>'Ingrese el DNI del alumno',
            'dni.max'=>'Maximo 8 caracteres para el dni del alumno',
            'codigoalumno.required'=>'Ingrese el código del codigoalumno',
            'codigoalumno.max'=>'Maximo 10 caracteres para el codigo del alumno',
            'dni.required'=>'Ingrese el dni del alumno',
    ]);

        $alumno=new Alumno();
        $alumno->iddistrito=$request->iddistrito;
        $alumno->codigoalumno=$request->codigoalumno;
        $alumno->dni=$request->dni;
        $alumno->apellidos=$request->apellidos;
        $alumno->nombres=$request->nombres;
        $alumno->sexo=$request->sexo;
        $alumno->fechanacimiento=$request->fechanacimiento;
        $alumno->lenguamaterna=$request->lenguamaterna;
        $alumno->estadocivil=$request->estadocivil;
        $alumno->religion=$request->religion;
        $alumno->colegioprocedencia=$request->colegioprocedencia;
        $alumno->direccion=$request->direccion;
        $alumno->telefono=$request->telefono;
        $alumno->mediotransporte=$request->mediotransporte;
        $alumno->tiempodemora=$request->tiempodemora;
        $alumno->materialdomicilio=$request->materialdomicilio;
        $alumno->energiaelectrica=$request->energiaelectrica;
        $alumno->aguapotable=$request->aguapotable;
        $alumno->desague=$request->desague;
        $alumno->sshh=$request->sshh;
        $alumno->numerohabitaciones=$request->numerohabitaciones;
        $alumno->numerohabitantes=$request->numerohabitantes;
        $alumno->situacion=$request->situacion;
        $alumno->estado='1';
        $alumno->save();
        return redirect()->route('alumno.index')->with('datos', 'Alumno agregado correctamente!');
    }

 
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $alumno=Alumno::findOrFail($id);
        $pais=Pais::where('estado','=','1')->get();
        $departamento=Departamento::where('estado','=','1')->get();
        $provincia=Provincia::where('estado','=','1')->get();
        $distrito=Distrito::where('estado','=','1')->get();
        return view('alumno.edit',compact('alumno','pais','departamento','provincia','distrito'));
    }

  
    public function update(Request $request, $id)
    {
        $data=request()->validate([
            'nombres'=>'required|max:50',
            'apellidos'=>'required|max:50',
            'lenguamaterna'=>'required|max:50',
            'colegioprocedencia'=>'required|max:50',
            'direccion'=>'required|max:50',
            'mediotransporte'=>'required|max:50',
            'tiempodemora'=>'required',
            'dni'=>'required|max:8',
            'codigoalumno'=>'required|max:10',
        ],[
            'nombres.required'=>'Ingrese el nombre del alumno',
            'nombres.max'=>'Maximo 50 caracteres para el nombre',
            'apellidos.required'=>'Ingrese el apellido del alumno',
            'apellidos.max'=>'Maximo 50 caracteres para el apellido del alumno',
            'colegioprocedencia.required'=>'Ingrese el colegio de procedencia del alumno',
            'colegioprocedencia.max'=>'Maximo 50 caracteres para el colegio procedencia del alumno',
            'direccion.required'=>'Ingrese la direccion del alumno',
            'direccion.max'=>'Maximo 50 caracteres para la direccion del alumno',
            'mediotransporte.required'=>'Ingrese el medio de transporte del alumno',
            'mediotransporte.max'=>'Maximo 50 caracteres para el medio de transporte del alumno',
            'tiempodemora.required'=>'Ingrese el tiempo de demora del transporte del alumno',
            'lenguamaterna.required'=>'Ingrese la lengua materna del alumno',
            'lenguamaterna.max'=>'Maximo 50 caracteres para la lengua materna del alumno',
            'dni.required'=>'Ingrese el DNI del alumno',
            'dni.max'=>'Maximo 8 caracteres para el dni del alumno',
            'codigoalumno.required'=>'Ingrese el código del codigoalumno',
            'codigoalumno.max'=>'Maximo 10 caracteres para el codigo del alumno',
            'dni.required'=>'Ingrese el dni del alumno',
    ]);
    $alumno=Alumno::findOrFail($id);
    $alumno->iddistrito=$request->iddistrito;
        $alumno->codigoalumno=$request->codigoalumno;
        $alumno->dni=$request->dni;
        $alumno->apellidos=$request->apellidos;
        $alumno->nombres=$request->nombres;
        $alumno->sexo=$request->sexo;
        $alumno->fechanacimiento=$request->fechanacimiento;
        $alumno->lenguamaterna=$request->lenguamaterna;
        $alumno->estadocivil=$request->estadocivil;
        $alumno->religion=$request->religion;
        $alumno->colegioprocedencia=$request->colegioprocedencia;
        $alumno->direccion=$request->direccion;
        $alumno->telefono=$request->telefono;
        $alumno->mediotransporte=$request->mediotransporte;
        $alumno->tiempodemora=$request->tiempodemora;
        $alumno->materialdomicilio=$request->materialdomicilio;
        $alumno->energiaelectrica=$request->energiaelectrica;
        $alumno->aguapotable=$request->aguapotable;
        $alumno->desague=$request->desague;
        $alumno->sshh=$request->sshh;
        $alumno->numerohabitaciones=$request->numerohabitaciones;
        $alumno->numerohabitantes=$request->numerohabitantes;
        $alumno->situacion=$request->situacion;
        $alumno->save();
    return redirect()->route('alumno.index')->with('datos', 'Alumno editado correctamente!');

    }

  
    public function destroy($id)
    {
        $alumno=Alumno::find($id);
        $alumno->estado='0';
        $alumno->save();
        return redirect()->route('alumno.index')->with('datos', 'Alumno eliminado');

    }

    public function PaisDepartamento($id){
        return Departamento::where('estado','=','1')->where('idpais','=',$id)->get();
    }

    public function DepartamentoProvincia($id){
        return Provincia::where('estado','=','1')->where('iddepartamento','=',$id)->get();
    }
    public function ProvinciaDistrito($id){
        return Distrito::where('estado','=','1')->where('idprovincia','=',$id)->get();
    }
}
