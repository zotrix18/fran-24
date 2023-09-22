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

Route::patch('/usuario/suspender/{id}', [UsuarioController::class, 'suspender'])->middleware('auth');
Route::resource('usuario', UsuarioController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [UsuarioController::class, 'index'])->name('dashAdmin')->middleware('auth', 'can:dashAdmin');

Route::prefix(['middleware' => 'auth'], function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('dashAdmin');
});
