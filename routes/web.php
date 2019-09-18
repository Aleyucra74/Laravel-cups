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

Route::get('/',	'PagesController@getIndex');
Route::get('/cart', 'PagesController@getCart');
Route::get('/checkout', 'PagesController@getCheckout');
Route::get('/product-details', 'PagesController@getProductDetails');
Route::get('/shop', 'PagesController@getShop');

// Definindo as rotas para o CRUD de produtos
 Route::get		('/produtos',			'ProdutosController@index'	)->middleware('auth'); // <--- LISTAR OS PRODUTOS CADASTRADOS
 Route::get		('/produtos/create',	'ProdutosController@create'	)->middleware('auth'); // <--- MOSTRAR UM FORMULÁRIO PARA CRIAR UM NOVO PRODUTO
Route::get		('/produtos/{id}/edit',	'ProdutosController@edit'	)->middleware('auth'); // <--- MOSTRAR UM FORMULÁRIO PARA ALTERAR UM NOVO PRODUTO
Route::get		('/produtos/{id}',		'ProdutosController@show'	); // <--- MOSTRAR UM ÚNICO PRODUTO COM SEUS DETALHES E OPÇÕES
Route::post		('/produtos',			'ProdutosController@store'	)->middleware('auth'); // <--- CRIAR UM PRODUTO (REDIRECIONAR PARA A LISTA...)
Route::put		('/produtos/{id}',		'ProdutosController@update'	)->middleware('auth'); // <--- ALTERAR UM PRODUTO (REDIRECIONA PARA A LISTA...)
Route::delete	('/produtos/{id}',		'ProdutosController@destroy')->middleware('auth'); // <--- REMOVE UM PRODUTO (REDIRECIONA PARA A LISTA...)

//rotas do auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
