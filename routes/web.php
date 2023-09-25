<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

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
    return view('auth.login');
});

Auth::routes();

//Rutas ADMIN, acceso restringido a dasg
Route::group(['middleware' => ['auth', 'checkPermission:dashAdmin']], function () {
    Route::resource('usuario', UsuarioController::class);
    Route::patch('/usuario/suspender/{id}', [UsuarioController::class, 'suspender']);
    Route::get('/home', [UsuarioController::class, 'index'])->name('dashAdmin');
    Route::resource('producto', ProductoController::class);
    Route::patch('/producto/baja/{id}', [ProductoController::class, 'baja']);
    Route::resource('categoria', CategoriaController::class);
    Route::patch('/categoria/baja/{id}', [CategoriaController::class, 'baja']);
    Route::resource('proveedor', ProveedorController::class);
    Route::patch('/proveedor/baja/{id}', [ProveedorController::class, 'baja']);
});

Route::group(['middleware' => ['auth', 'checkPermission:vendedor']], function () {
    Route::get('/ventas', [VentasController::class, 'index']);


});

Route::middleware('auth')->group(function () {
    // Route::get('/', [UsuarioController::class, 'index'])->name('dashAdmin');
    Route::get('/venta', [VentaController::class, 'index'])->name('vendedor');
});

