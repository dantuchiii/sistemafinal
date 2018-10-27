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
})->name('welc');

//Resources
Route::resource('Products','ProductController');
Route::resource('Pedido','PedidoController');
Route::resource('PedidoDet','PedidoDetController');
Route::resource('User', 'UserController');
Route::resource('Articulos','ArticulosController');


//Agregar al carro/pedido
Route::post('add/{id}', 'ProductController@add2')->name('Products.add');

//Ver carro/pedido
Route::get('carro', 'PedidoController@carro')->name('Pedido.carro');

//Confirmar pedido/carro
Route::get('confirmarpedido/{pedido}', 'PedidoController@confirmarpedido')->name('Pedido.confirmarpedido');

//Traer catalogo
Route::get('catalogo','ProductController@catalogo')->name('Products.catalog');

//sumar/restar cantidad de productos en carro
Route::get('sum/{id}/{num}','PedidoDetController@sum')->name('Pedido.sum');

//create 2 de articulos
Route::get('createart/{id}', 'ArticulosController@create')->name('Articulos.create2');

//store 2 de articulos
Route::post('storeart/{id}', 'ArticulosController@store')->name('Articulos.store2');

//Ver producto desde catalogo
Route::get('showcatalog/{id}', 'ProductController@showcatalog')->name('Product.showcatalog');

//Index MIS PEDIDOS
Route::get('mispedidos', 'PedidoController@index2')->name('Pedido.index2');

//Show MIS PEDIDOS
Route::get('showmipedido/{id}', 'PedidoController@show2')->name('Pedido.show2');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('changeart/{id}','ArticulosController@byArticulo');

Route::post('laurlquevosquieras/{art}', 'ArticulosController@typeaheadart');






//rutas para probar cosas
Route::get('show2', function(){
    
    return view('products.create2');
});

Route::get('test/{id_pe}','PedidoController@test')->name('pedido.test');


Route::post('test2','PedidoDetController@test2')->name('pedido.test2');
