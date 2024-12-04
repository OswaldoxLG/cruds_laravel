<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\isAuthenticated;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::middleware([isAuthenticated::class])->group(function () {

//rutas de productos
Route::get('/producto', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/producto/creado', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/producto/creado', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/producto/edit/{producto}', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/producto/update/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/producto/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

//rutas de usuarios
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuario/creado', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuario/creado', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuario/edit/{usuario}', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuario/update/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

//ruta de factura
Route::get('/factura', [FacturaController::class, 'index'])->name('facturas.index');
Route::get('/factura/creado', [FacturaController::class, 'create'])->name('facturas.create');
Route::post('/factura/creado', [FacturaController::class, 'store'])->name('facturas.store');
Route::get('/factura/edit/{factura}', [FacturaController::class, 'edit'])->name('facturas.edit');
Route::put('/factura/update/{factura}', [FacturaController::class, 'update'])->name('facturas.update');
Route::delete('/factura/{factura}', [FacturaController::class, 'destroy'])->name('facturas.destroy');
});

Route::get('/registro', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.submit');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
