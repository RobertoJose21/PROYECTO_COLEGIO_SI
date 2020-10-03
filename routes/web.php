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
Route::get('/', function () {    return view('index');});
Route::post('/', 'UserController@login')->name('user.login');
Route::get('/inicio', function () {    return view('inicio');});
Route::get('/integrantes','UserController@integrantes')->name('user.integrantes');
Route::resource('cuenta', 'UserController');


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

Route::get('/matricula/{numeromatricula}/confirmar', 'MatriculaController@confirmar')->name('matricula.confirmar');
Route::get('/seccion/{idseccion}/confirmar', 'SeccionController@confirmar')->name('seccion.confirmar');


Route::Get('/gradobyniveles/{id}', 'MatriculaController@byGrado');
Route::Get('/seccionesbygrados/{id}', 'MatriculaController@bySeccion');


//impresion
Route::get('/imprime/{idmatricula}/imprime','MatriculaController@show')->name('imprimeMatricula');

//grafico
Route::get('grafico','GraficoController@graficoMatricula')->name('graficoMatricula');