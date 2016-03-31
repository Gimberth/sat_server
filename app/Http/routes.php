<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/', function () {
        return view('welcome');
    });
    
    
    /*Rutas Estado*****************************************/
//    Route::get('/estado','EstadoController@index');
//    Route::post('/estado/create','EstadoController@create');
    //Route::get('/estado','EstadoController@edit');
//    Route::get('/estado/{id}/destroy',[
//	'uses'=>'EstadoController@destroy',
//	'as'=>'estado.destroy'
//	]);
    /******************************************************/
    

    Route::resource('estado', 'EstadoController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('service', 'ServicioController');
    Route::resource('notas', 'NotaServicioController');

    Route::get('/service/{id}/destroy', [
        'uses' => 'ServicioController@destroy',
        'as' => 'service.destroy'
    ]);

//Route::get('/notas/buscar/{ci}','NotaServicioController@buscar');

    Route::get('test', function() {
        return view('notas.create');
    });

    Route::post('buscli', 'NotaServicioController@buscarCliente');
    Route::post('itemservi', 'NotaServicioController@agregarServicio');
    Route::post('guardarnota', 'NotaServicioController@guardarNota');
    Route::post('quitarservi', 'NotaServicioController@quitarServicio');
});
