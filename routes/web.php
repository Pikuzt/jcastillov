<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EmpleadosDetalleTraduccionesController;
use App\Http\Controllers\WebService;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/empleado-detalle-cliente/{empleados?}', [EmpleadosController::class, 'detalleSinGrafica'])->name('index.detalle.singrafica.empleados');
Route::get('/', [EmpleadosController::class, 'indexCliente'])->name('index.empleados.clientes');


Route::get('/empleado', [EmpleadosController::class, 'index'])->name('index.empleados')->middleware('canAccess');
Route::get('/empleado-detalle', [EmpleadosController::class, 'detalle'])->name('index.detalle.empleados')->middleware('canAccess');
Route::get('eliminar-empleado/{empleados?}', [EmpleadosController::class, 'eliminar'])->name('eliminar.empleados')->middleware('canAccess');
Route::get('detalle-empleado/{empleados?}', [EmpleadosController::class, 'detalle'])->name('detalle.empleado')->middleware('canAccess');
Route::post('create-empleado', [EmpleadosController::class, 'create'])->name('guardar.empleados')->middleware('canAccess');
Route::post('update-empleado', [EmpleadosController::class, 'update'])->name('update.empleados')->middleware('canAccess');
Route::get('/conversionDolares', [WebService::class, 'mostrarApi'])->name('conversionDolares.API');

// Route::group(['middleware' => 'ControlAccesoMiddleware'], function () {


// });
