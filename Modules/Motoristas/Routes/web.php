<?php

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

use Modules\Motoristas\Http\Controllers\MotoristasController;

Route::group(
    ['prefix' => 'motorista', 'middleware' => ['auth', 'web']],
    function() {
        Route::get('/', [MotoristasController::class, 'index'])->name('Admin.Motoristas');
        Route::get('/create', [MotoristasController::class, 'create'])->name('Admin.Motoristas.create');
        Route::get('/edit/{motorista:id}', [MotoristasController::class, 'edit'])->name('Admin.Motoristas.edit');
        Route::post('/store', [MotoristasController::class, 'store'])->name('Admin.Motoristas.store');
        Route::put('/update/{motorista:id}', [MotoristasController::class, 'update'])->name('Admin.Motoristas.update');
        Route::delete('/delete/{motorista:id}', [MotoristasController::class, 'destroy'])->name('Admin.Motoristas.delete');
    }
);