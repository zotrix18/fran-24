<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

// Route::get('/usuario', function () {
//     return view('usuario.index');
// });

Route::patch('/usuario/suspender/{id}', [UsuarioController::class, 'suspender'])->middleware('auth');
Route::resource('usuario', UsuarioController::class)->middleware('auth');



Auth::routes();

Route::get('/home', [UsuarioController::class, 'index'])->name('home');

Route::prefix(['middleware' => 'auth'], function () {
    
});