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
use App\Http\Controllers\InformePlaniController;
use App\Http\Controllers\DescBlendingController;
use App\Http\Controllers\DescMaquinariaController;



   

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


Route::get('login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');


Route::controller(AdminController::class)->middleware('auth')->group(function(){
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
Route::get('informePlanificacion', [InformePlaniController::class, 'index'])->name('InformePlani');
Route::get('informePlaniDetalle/{id}', [InformePlaniController::class, 'InformesDes'])->name('InformePlaniDetalle');
Route::get('informeProduccion', [InformePlaniController::class, 'produccion'])->name('InformeProduc');
Route::get('informeConciliacion', [InformePlaniController::class, 'conciliacion'])->name('InformeConci');

    // Route::get('Trabajador', 'trabajador');


    //area de planificacion
Route::resource('planificacions',PlanificacionController::class)->middleware('auth');
Route::resource('topografias',TopografiaController::class);
Route::resource('poligonos',PoligonoController::class);
Route::resource('explotaciones',ExplotacioneController::class);
Route::resource('perforaciones',PerforacioneController::class);
Route::resource('muestras',MuestraController::class);
Route::resource('materias',MateriaController::class);
Route::resource('laboratorios',LaboratorioController::class);
Route::resource('blendings',BlendingController::class);
Route::resource('descblendings',DescBlendingController::class);
// Route::post('blendings', [BlendingController::class, 'guardar'])->name('guardarBlending');

    //importar datos 
    Route::post('importar/laboratorio',[LaboratorioController::class,'importarStore'] )->name('importarStore');


    //reporte pdf
Route::get('donwload_pdf/{id}',[BlendingController::class,'generar_pdf'] )->name('pdf');
Route::get('donwload_pdf_volqueta/{id}',[VolquetaController::class,'generar_pdf'] )->name('pdfVolqueta');
Route::get('donwload_pdf_planificacion/{id}',[PlanificacionController::class,'generar_pdf'] )->name('pdfPlani');
Route::get('donwload_pdf_panel_control/{id}',[PaneleController::class,'generar_pdf'] )->name('pdfPanel');
Route::get('donwload_pdf_produccion/{id}',[ProduccioneController::class,'generar_pdf'] )->name('pdfProduccion');

    //reporte excel
Route::get('donwload_excel_panel_control/{id}',[PaneleController::class,'generar_excel'] )->name('excelPanel');
Route::get('donwload_excel_produccion/{id}',[ProduccioneController::class,'generar_excel'] )->name('excelProduccion');
   

    //ajax
Route::post('planificaciones/all',[InformePlaniController::class, 'all']);
Route::post('producciones/pro',[InformePlaniController::class, 'pro']);
Route::post('poligonos/all',[InformePlaniController::class, 'poli']);
Route::post('/informePlaniDetalle/planiBlendings/all',[InformePlaniController::class, 'Blending']);


  //area produccion
Route::get('/produccionesIndex', function() { return view('pro.home');})->name('produccionIndex')->middleware('auth');
Route::put('producciones/{id}/sumarviajes', [ProduccioneController::class, 'actualizar'])->name('actualizar');
Route::resource('producciones',ProduccioneController::class);
Route::resource('paneles',PaneleController::class);
Route::resource('viajes', ViajeController::class);
Route::put('viajes/{id}/sumarviajes', [ViajeController::class, 'sumar'])->name('sumarviaje');
Route::put('viajes/{id}/restarviajes', [ViajeController::class, 'restar'])->name('restarviaje');
Route::resource('paradas', ParadaController::class);
Route::resource('descMaquinarias', DescMaquinariaController::class);
Route::resource('actividades', ActividadeController::class);


 