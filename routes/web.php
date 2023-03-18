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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
   });
});

Auth::routes();

Route::get('/symlink', function () {
   $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
   $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
   symlink($target, $link);
   echo "Done";
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('juzgados', App\Http\Controllers\JuzgadoController::class)->middleware('auth');


Route::resource('circunscripcions', App\Http\Controllers\CircunscripcionController::class)->middleware('auth');


Route::resource('circunscripcionJuzgados', App\Http\Controllers\Circunscripcion_juzgadoController::class)->middleware('auth');


Route::resource('clientes', App\Http\Controllers\ClienteController::class)->middleware('auth');


Route::resource('expedientes', App\Http\Controllers\ExpedienteController::class)->middleware('auth');


Route::resource('gastoExpedientes', App\Http\Controllers\Gasto_expedienteController::class)->middleware('auth');



Route::post('/clientes/crear', [App\Http\Controllers\ClienteController::class, 'crear'])->middleware('auth');
Route::post('/juzgados/crear', [App\Http\Controllers\JuzgadoController::class, 'crear'])->middleware('auth');
Route::post('/circunscripcions/crear', [App\Http\Controllers\CircunscripcionController::class, 'crear'])->middleware('auth');

Route::resource('expedienteDetalles', App\Http\Controllers\Expediente_detalleController::class)->middleware('auth');


Route::resource('pagoExpedientes', App\Http\Controllers\Pago_expedienteController::class)->middleware('auth');
Route::get('pagoExpediente/archivo', [App\Http\Controllers\Pago_expedienteController::class, 'archivo'])->name('pagoExpedientes.archivo')->middleware('auth');
Route::get('gastoExpediente/archivo', [App\Http\Controllers\Gasto_expedienteController::class, 'archivo'])->name('gastoExpedientes.archivo')->middleware('auth');


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');



Route::get('audiencias', [App\Http\Controllers\AudienciasController::class, 'index'])->name('audiencias.index')->middleware('auth');
Route::post('audiencias', [App\Http\Controllers\AudienciasController::class, 'store'])->name('audiencias.store')->middleware('auth');
Route::patch('audiencias/update/{id}', [App\Http\Controllers\AudienciasController::class, 'update'])->name('audiencias.update')->middleware('auth');
Route::delete('audiencias/destroy/{id}', [App\Http\Controllers\AudienciasController::class, 'destroy'])->name('audiencias.destroy')->middleware('auth');

Route::get('/audiencias/mostrar', [App\Http\Controllers\AudienciasController::class, 'mostrar'])->middleware('auth');
Route::post('audiencia_crear', [App\Http\Controllers\AudienciasController::class, 'audiencia'])->middleware('auth');	

Route::resource('reporte', App\Http\Controllers\ReporteController::class)->middleware('auth');

Route::resource('pdf', App\Http\Controllers\PdfController::class)->middleware('auth');

Route::get('graficos/index', [App\Http\Controllers\GraficoController::class, 'grafico'])->name('graficos')->middleware('auth');
Route::get('audiencias/consulta', [App\Http\Controllers\Consulta_audiencaController::class, 'consulta'])->name('consultas')->middleware('auth');

Route::resource('fueros', App\Http\Controllers\FueroController::class)->middleware('auth');


Route::get('consultas', [App\Http\Controllers\ReporteController::class, 'consulta_expediente'])->name('consultas.expedientes')->middleware('auth');

Route::resource('seguimintos', App\Http\Controllers\SeguimintoController::class)->middleware('auth');
