<?php

use App\Http\Controllers\categoriaController;
use App\Http\Controllers\graficaController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});




Route::middleware(['auth', 'nocache'])->group(function (){
   // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categoria',[categoriaController::class,'index'])->name('categoria.index');
    Route::post('/categoria-create',[categoriaController::class,'store'])->name('categoria.store');
    Route::get('/categorias/{id}/edit', [categoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/categorias/{id}', [categoriaController::class, 'update'])->name('categoria.update');
    Route::delete('/categorias/{id}', [categoriaController::class, 'destroy'])->name('categoria.destroy');
    Route::get('/productos/export/excel', [ProductoController::class, 'exportExcel'])
    ->name('productos.export.excel');

    Route::get('/producto',[productoController::class,'index'])->name('productos.index');
    Route::post('/producto-create',[productoController::class,'store'])->name('productos.store');
    Route::get('/producto/{id}/edit', [productoController::class, 'edit'])->name('productos.edit');
    Route::put('/producto/{id}', [productoController::class, 'update'])->name('productos.update');
    Route::delete('/producto/{id}', [productoController::class, 'destroy'])->name('productos.destroy');

    Route::get('/dashboard', [graficaController::class,'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
