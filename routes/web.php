<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//rutas pa el inicio
/*
Route::get('/', function () {    return view('index');});
Route::post('/', 'UserController@login')->name('user.login');*/
Route::post('/', 'UserController@login')->name('user.login'); 
Route::get('/inicio', function () {    return view('inicio');});
//Route::get('/integrantes','UserController@integrantes')->name('user.integrantes');
//Route::resource('cuenta', 'UserController');


//rutas para los combobox dependientes de las notas
Route::Get('/gradobyniveles/{id}', 'NotaController@byGrado');
Route::Get('/seccionesbygrados/{id}', 'NotaController@bySeccion');
Route::Get('/cursosbygrados/{id}', 'NotaController@byCurso');
Route::Get('/capacidadbycursos/{id}', 'NotaController@byCapacidad');
Route::Get('/profesorbycurso/{id}', 'NotaController@byprofesor');
Route::Get('/notasbycapacidad/{id}', 'NotaController@byNotas');
Route::Get('/matriculabyalumno/{id}', 'NotaController@byMatricula');
Route::Get('/cursobymatricula/{id}', 'NotaController@byCursoM');
Route::Get('/Minota/{id}', 'NotaController@MiNota');
Route::Get('/capacidadbycursos2/{id}', 'NotaController@byCapacidadNotas');
Route::Get('/capacidadbycursos3/{id}', 'NotaController@byCapacidadNotas2');

//rutas para la libreta y actualizar notas
Route::get('/libretas','NotaController@libretas')->name('nota.libretas');
Route::get('/registros','NotaController@registrosNotas')->name('nota.registros'); //modificado richard
Route::get('/libretaNotas/{idmatricula}','NotaController@libretaNotas')->name('nota.libretaNotas');
Route::get('/registroNotas/{idmatricula}','NotaController@reporteRegistroNotas')->name('nota.registroNotas'); //modificado ricahrd
Route::post('/nota/actualizar','NotaController@actualizar')->name('nota.actualizar');

//ruta para cancelar una accion en las notas



Route::Get('/paisdepartamento/{id}', 'AlumnoController@PaisDepartamento');
Route::Get('/departamentoprovincia/{id}', 'AlumnoController@DepartamentoProvincia');
Route::Get('/provinciadistrito/{id}', 'AlumnoController@ProvinciaDistrito');

Route::get('/cancelarnota',function(){
    return redirect()->route('nota.index')->with('datos','ACCIÓN CANCELADA...!');
})->name('cancelarnota');


// rutas generales
Route::resource('alumno','AlumnoController');
Route::resource('nota','NotaController');
Route::resource('nivel','NivelController');
Route::resource('grado','GradoController');
Route::resource('seccion','SeccionController');
Route::resource('periodo','PeriodoController');
Route::resource('catedra','Detalle_CatedraController');
Route::resource('profesor','ProfesorController');
Route::resource('curso','CursoController');
Route::resource('capacidad','CapacidadController');
Route::resource('matricula', 'MatriculaController');  //para darle un mejor nombre a als categorias

Route::get('cancelarMatricula', function () {
    return redirect()->route('matricula.index')->with('datos','Accion cancelada..!');
})->name('cancelarMatricula');  //le damos nombre a la ruta

Route::get('cancelarProfesor', function () {
    return redirect()->route('profesor.index')->with('datos','Accion cancelada..!');
})->name('cancelarProfesor');  //le damos nombre a la ruta

Route::get('cancelarSeccion', function () {
    return redirect()->route('seccion.index')->with('datos','Accion cancelada..!');
})->name('cancelarSeccion');  //le damos nombre a la ruta

Route::get('cancelarPeriodo', function () {
    return redirect()->route('periodo.index')->with('datos','Accion cancelada..!');
})->name('cancelarPeriodo');  //le damos nombre a la ruta

Route::get('cancelarCurso', function () {
    return redirect()->route('curso.index')->with('datos','Accion cancelada..!');
})->name('cancelarCurso');  //le damos nombre a la ruta

Route::get('cancelarCapacidad', function () {
    return redirect()->route('capacidad.index')->with('datos','Accion cancelada..!');
})->name('cancelarCapacidad');  //le damos nombre a la ruta

Route::get('/matricula/{numeromatricula}/confirmar', 'MatriculaController@confirmar')->name('matricula.confirmar');
Route::get('/seccion/{idseccion}/confirmar', 'SeccionController@confirmar')->name('seccion.confirmar');
Route::get('/periodo/{idperiodo}/confirmar', 'PeriodoController@confirmar')->name('periodo.confirmar');
Route::get('/curso/{idcurso}/confirmar', 'CursoController@confirmar')->name('curso.confirmar');
Route::get('/capacidad/{idcapacidad}/confirmar', 'CapacidadController@confirmar')->name('capacidad.confirmar');


Route::Get('/gradobyniveles/{id}', 'MatriculaController@byGrado');
Route::Get('/seccionesbygrados/{id}', 'MatriculaController@bySeccion');

Route::Get('/gradobynivelesCurso/{idcurso}', 'CursoController@byGrado');

Route::Get('/gradobynivelesCapacidad/{id}', 'CapacidadController@byGrado');
Route::Get('/cursosbygradosCapacidad/{id}', 'CapacidadController@byCurso');
//impresion
Route::get('/imprime/{idmatricula}/imprime','MatriculaController@show')->name('imprimeMatricula');

//grafico
Route::get('grafico','GraficoController@graficoMatricula')->name('graficoMatricula');

//Autenticacion Laravel
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
