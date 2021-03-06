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
    return view('welcome');
});
Route::get('/buscarLivro', 'LivroController@searchPesquisador');
CRUD::resource('livro', 'LivroController', ['only'=> 'show']);

Route::group(['prefix'=> 'admin'],function(){
    Route::auth();
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    // Backpack\CRUD: Define the resources for the entities you want to CRUD.
    CRUD::resource('livro', 'LivroController', ['except'=> 'show']);
    CRUD::resource('comentario', 'ComentarioController');
    CRUD::resource('livro-lido', 'LivroLidoController');

    // [...] other routes
});

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);
