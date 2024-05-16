<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoCategoriaController;


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

Route::get('/', [IndexController::class, 'index'])->name('index');


Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/main', [RedirectController::class, 'index'])->name('main.index');



Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::put('/productos', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos', [ProductoController::class, 'delete'])->name('productos.delete');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias', [CategoriaController::class, 'delete'])->name('categorias.delete');

Route::get('/productos-categoria', [ProductoCategoriaController::class, 'index'])->name('productos-categoria.index');
Route::post('/productos-categoria', [ProductoCategoriaController::class, 'store'])->name('productos-categoria.store');
Route::put('/productos-categoria', [ProductoCategoriaController::class, 'update'])->name('productos-categoria.update');
Route::delete('/productos-categoria', [ProductoCategoriaController::class, 'delete'])->name('productos-categoria.delete');



    Route::middleware('auth')->group(function (){
    /*Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/main', [RedirectController::class, 'index'])->name('main.index');



    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::put('/productos', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos', [ProductoController::class, 'delete'])->name('productos.delete');

    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::put('/categorias', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias', [CategoriaController::class, 'delete'])->name('categorias.delete');

    Route::get('/productos-categoria', [ProductoCategoriaController::class, 'index'])->name('productos-categoria.index');
    Route::post('/productos-categoria', [ProductoCategoriaController::class, 'store'])->name('productos-categoria.store');
    Route::put('/productos-categoria', [ProductoCategoriaController::class, 'update'])->name('productos-categoria.update');
    Route::delete('/productos-categoria', [ProductoCategoriaController::class, 'delete'])->name('productos-categoria.delete');

*/

});
