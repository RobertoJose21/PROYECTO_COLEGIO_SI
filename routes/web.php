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
Route::Get('/gradobyniveles/{id}', 'NotaController@byGrado');
Route::Get('/seccionesbygrados/{id}', 'NotaController@bySeccion');
Route::Get('/cursosbygrados/{id}', 'NotaController@byCurso');

Route::get('/', function () {    return view('index');});
 
Route::post('/', 'UserController@login')->name('user.login');
Route::get('/inicio', function () {    return view('inicio');});



Route::get('/integrantes','UserController@integrantes')->name('user.integrantes');

Route::resource('cuenta', 'UserController');


Route::resource('estudiante','EstudianteController');
Route::resource('nota','NotaController');
Route::resource('seccion','SeccionController');
Route::resource('grado','GradoController');

Route::get('/cancelarnota',function(){
    return redirect()->route('nota.index')->with('datos','ACCIÓN CANCELADA...!');
})->name('cancelarnota');




Route::resource('matricula', 'MatriculaController');  //para darle un mejor nombre a als categorias

Route::get('cancelarMatricula', function () {
    return redirect()->route('matricula.index')->with('datos','Accion cancelada..!');
})->name('cancelarMatricula');  //le damos nombre a la ruta

Route::get('/matricula/{numeromatricula}/confirmar', 'MatriculaController@confirmar')->name('matricula.confirmar');

