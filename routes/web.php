<?php

use App\Http\Livewire\CategoryCreate;
use App\Http\Livewire\CategoryEdit;
use App\Http\Livewire\CategoryIndex;
use Illuminate\Support\Facades\Route;

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

    // indicar solo rutas que sea necesario iniciar sesion
    // osea que no son publicas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // verbos en HTTP= GET = mostrar datos, POST = generar datos, PUT/PATCH = editar datos, DELETE = borrar datos
    // vistas resource o livewire
    Route::get('/category', CategoryIndex::class)->name('categories.index');
    Route::get('/category/{category}/edit', CategoryEdit::class)->name('categories.edit'); // $category = 7
    Route::get('/category/create', CategoryCreate::class)->name('categories.create');
});
