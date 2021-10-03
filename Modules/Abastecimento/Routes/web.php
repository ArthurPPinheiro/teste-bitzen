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
    ['prefix' => 'abastecimento', 'middleware' => ['auth', 'web']],
    function() {
        Route::get('/', 'AbastecimentoController@index')->name('Admin.Abastecimento');
        Route::get('/create', 'AbastecimentoController@create')->name('Admin.Abastecimento.create');
        Route::get('/edit/{abastecimento}', 'AbastecimentoController@edit')->name('Admin.Abastecimento.edit');
        Route::post('/store', 'AbastecimentoController@store')->name('Admin.Abastecimento.store');
        Route::put('/update/{abastecimento}', 'AbastecimentoController@update')->name('Admin.Abastecimento.update');
        Route::delete('/delete/{abastecimento}', 'AbastecimentoController@destroy')->name('Admin.Abastecimento.delete');
    }
);