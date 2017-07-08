<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estados', 'EstadosController@create');
Route::get('/cidades', 'CidadesController@create');
Route::get('/empresas', 'EmpresasController@create');
