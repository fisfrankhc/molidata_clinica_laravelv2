<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\UsuariosController;

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::view('/home', "home")->middleware('auth')->name('home');

Route::post('validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('usuarios', UsuariosController::class);
Route::resource('roles', RolesController::class);
Route::resource('sucursales', SucursalesController::class);