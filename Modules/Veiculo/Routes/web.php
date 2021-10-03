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

Route::group(
    ['prefix' => 'veiculo', 'middleware' => ['auth', 'web']],
    function() {
        Route::get('/', 'VeiculoController@index')->name('Admin.Veiculo');
    Route::get('/create', 'VeiculoController@create')->name('Admin.Veiculo.create');
    Route::get('/edit/{veiculo}', 'VeiculoController@edit')->name('Admin.Veiculo.edit');
    Route::post('/store', 'VeiculoController@store')->name('Admin.Veiculo.store');
    Route::put('/update/{veiculo}', 'VeiculoController@update')->name('Admin.Veiculo.update');
    Route::delete('/delete/{veiculo}', 'VeiculoController@destroy')->name('Admin.Veiculo.delete');
    }
);