<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VolquetaController;
use App\Http\Controllers\MaquinariaController;
use App\Http\Controllers\PlanificacionController;
use App\Http\Controllers\TopografiaController;
use App\Http\Controllers\PoligonoController;
use App\Http\Controllers\ExplotacioneController;
use App\Http\Controllers\PerforacioneController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\BlendingController;
use App\Http\Controllers\ProduccioneController;
use App\Http\Controllers\PaneleController;
use App\Http\Controllers\ViajeController;
use App\Http\Controllers\ParadaController;
use App\Http\Controllers\ActividadeController;
use App\Http\Controllers\SessionController;


   

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


Route::get('login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

Route::controller(AdminController::class)->group(function(){
    Route::get('Administracion', 'admin')->name('admin');
    Route::get('Usuarios', 'usuario')->name('usuarios');
    Route::post('Usuarios', 'guardar')->name('usuarios.guardar');
    Route::get('Detalle/{id}', 'detalle')->name('usuarios.detalle');
    Route::put('Detalle/{id}', 'editar')->name('usuarios.editar');
    Route::delete('Detalle/{id}', 'eliminar')->name('usuarios.eliminar');

});

    //con esto se resumen las anteriores direcciones
Route::resource('volquetas', VolquetaController::class);
Route::resource('maquinarias', MaquinariaController::class);
    // Route::get('Trabajador', 'trabajador');


    //area de planificacion
Route::resource('planificacions',PlanificacionController::class);
Route::resource('topografias',TopografiaController::class);
Route::resource('poligonos',PoligonoController::class);
Route::resource('explotaciones',ExplotacioneController::class);
Route::resource('perforaciones',PerforacioneController::class);
Route::resource('muestras',MuestraController::class);
Route::resource('materias',MateriaController::class);
Route::resource('laboratorios',LaboratorioController::class);
Route::resource('blendings',BlendingController::class);

    //reporte
Route::get('donwload_pdf/{id}',[BlendingController::class,'generar_pdf'] )->name('pdf');

  //area produccion
Route::resource('producciones',ProduccioneController::class);
Route::resource('paneles',PaneleController::class);
Route::resource('viajes', ViajeController::class);
Route::resource('paradas', ParadaController::class);
Route::resource('actividades', ActividadeController::class);


 