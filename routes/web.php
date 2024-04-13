<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminDataPasienController;
use App\Http\Controllers\AdminAntrianPasienController;
use App\Http\Controllers\ControllerCollectionData;
use App\Http\Controllers\ControllerDataMarts;
use App\Http\Controllers\ControllerModulo;
use App\Http\Controllers\ControllerConstructor;
use App\Http\Controllers\ControllerConstructorPDF;
use App\Http\Controllers\ControllerDocuments;
use App\Http\Controllers\ControllerCompras;
use App\Http\Controllers\ControllerProducto;
use App\Http\Controllers\ControllerEquipos;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin/dashboard');
});

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', function () {
    return redirect('/');
});

// dashboard admin
Route::get('/admin/dashboard',  [AdminDashboardController::class, 'index'])->middleware('admin');

//MODULO 0
Route::get('/admin/modulo0', [ControllerModulo::class, 'index'])->middleware('admin');
Route::post('/admin/modulo0', [ControllerModulo::class, 'index'])->name('modulo0.index');

//Data Marts, crear graficas y vistas predeterminadas de una manera mas rapida
Route::get('/admin/datamarts', [ControllerDataMarts::class, 'index'])->middleware('admin');

Route::get('/admin/datamarts/accounts', [ControllerDataMarts::class, 'accounts'])->middleware('admin');
Route::get('/admin/datamarts/accounts', [ControllerDataMarts::class, 'reportaccounts'])->middleware('admin');

Route::get('/admin/datamarts/compras', [ControllerCompras::class, 'accounts'])->middleware('admin');
Route::get('/admin/datamarts/compras', [ControllerCompras::class, 'reportaccounts'])->middleware('admin');

Route::get('/admin/datamarts/producto', [ControllerProducto::class, 'accounts'])->middleware('admin');
Route::get('/admin/datamarts/producto', [ControllerProducto::class, 'reportaccounts'])->middleware('admin');

Route::get('/admin/datamarts/equipos', [ControllerEquipos::class, 'accounts'])->middleware('admin');
Route::get('/admin/datamarts/equipos', [ControllerEquipos::class, 'reportaccounts'])->middleware('admin');

//Collection Data, almacena las graficas y reportes creados por cada administrador por separado, con la ventaja de que se puede compartir
Route::get('/admin/collectiondata', [ControllerCollectionData::class, 'index'])->middleware('admin');
Route::post('/admin/collectiondata', [ControllerCollectionData::class, 'index'])->name('collectiondata.index');
Route::get('/informes/{nombreArchivo}', [ControllerCollectionData::class, 'verPDF'])->name('verPDF');

// Ruta para mostrar el índice y las tablas
Route::get('/admin/constructor', [ControllerConstructor::class, 'index'])->name('admin.constructor.index');

// Ruta para mostrar los datos de una tabla específica
Route::get('/admin/constructor/mostrar', [ControllerConstructor::class, 'mostrarDatosTabla'])->name('mostrarDatosTabla');

// Ruta para generar la gráfica con los datos seleccionados
Route::post('/admin/constructor/generar', [ControllerConstructor::class, 'generarGrafica'])->name('generarGrafica');
// Route::get('/admin/constructor/datosTabla', [ControllerConstructor::class, 'obtenerDatosTabla'])->name('admin.constructor.datosTabla');
Route::post('/admin/constructor/coleccion', [ControllerConstructor::class, 'coleccion'])->name('constructor.coleccion');
Route::get('/informes/{nombreArchivo}', [ControllerConstructor::class, 'verPDF'])->name('verPDF');
// Route::post('/admin/constructor/generatePDF', [ControllerConstructor::class, 'generatePDF'])->name('constructor.generatePDF');

// Importacion de Archivos hacia la base de datos.
Route::get('/admin/files/', [ControllerDocuments::class, 'showUploadForm'])->middleware('admin');
Route::post('/admin/files/file', [ControllerDocuments::class, 'uploadFile'])->middleware(('admin'));

// Setting admin
Route::get('/admin/setting', [AdminSettingsController::class, 'index'])->middleware('admin');
Route::post('/admin/setting', [AdminSettingsController::class, 'store'])->middleware('admin');
Route::post('/admin/setting/verify', [AdminSettingsController::class, 'verify'])->middleware('admin');
Route::post('/admin/setting/setemail', [AdminSettingsController::class, 'setemail'])->middleware('admin');
Route::get('/admin/setting/setemail', function () {
    return back();
})->middleware('admin');
Route::get('/admin/setting/verify', function () {
    return back();
})->middleware('admin');
Route::post('/admin/setting/changepassword', [AdminSettingsController::class, 'changepassword'])->middleware('admin');
Route::get('/admin/setting/changepassword', function () {
    return back();
})->middleware('admin');
Route::post('/admin/setting/app', [AdminSettingsController::class, 'updateapp'])->middleware('admin');
Route::get('/admin/setting/app', function () {
    return back();
})->middleware('admin');
