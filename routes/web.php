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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    
    // Route::get('/home', function() {
    //     return view('home');
    // })->name('home');

    Route::get('/dash', function() {
        return view('dash');
    })->name('dash');

    Route::get('/cicloPagamento', 'cicloPagamento@index');

    Route::get('/sumCredidos', 'cicloPagamento@sumCredidos');

    Route::get('/getLancamentoAnualCreditos', 'cicloPagamento@getLancamentoAnualCreditos');
    Route::get('/getLancamentoAnualDeditos', 'cicloPagamento@getLancamentoAnualDeditos');

    Route::get('/creditos', 'cicloPagamento@getCredito');
    Route::post('/creditos', 'cicloPagamento@postCredito');
    Route::put('/creditos', 'cicloPagamento@putCredito');
    Route::delete('/creditos', 'cicloPagamento@deleteCredito');

    Route::get('/debitos', 'cicloPagamento@getDebito');
    Route::post('/debitos', 'cicloPagamento@postDebito');
    Route::put('/debitos', 'cicloPagamento@putDebito');
    Route::delete('/debitos', 'cicloPagamento@deleteDebito');

});