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


Route::get('/login',['as'=>'login','uses' =>'Auth\LoginController@index']);
Route::post('/login/entrar',['as'=>'login.entrar','uses' =>'Auth\LoginController@login']);
Route::get('/login/sair',['as'=>'login.sair','uses' =>'Auth\LoginController@logout']);


Route::group(['middleware'=>'auth'] , function(){
    Route::get('/',['as'=>'homepage','uses' =>'HomeController@index']);
    Route::get('/produtos',['as'=>'produtos','uses' =>'HomeController@index']);
    Route::get('/produtos/carrinho/{id}',['as'=>'produtos.add','uses' =>'HomeController@addToCart']);
    Route::get('/carrinho',['as'=>'carrinho','uses' =>'HomeController@Cart']);
    Route::get('/checkout',['as'=>'checkout','uses' =>'CheckoutController@index']);
    Route::post('/finalizar',['as'=>'finalizar','uses' =>'CheckoutController@finalizar']);
    Route::get('/historico',['as'=>'historico','uses' =>'HistoricoController@index']);
});







