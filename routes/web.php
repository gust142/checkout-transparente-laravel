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

//Ir para a Página de Login
Route::get('/login',['as'=>'login','uses' =>'Auth\LoginController@index']);
//Função de Login
Route::post('/login/entrar',['as'=>'login.entrar','uses' =>'Auth\LoginController@login']);
//Função de Logout
Route::get('/login/sair',['as'=>'login.sair','uses' =>'Auth\LoginController@logout']);

//Ir para a Página de Cadastro
Route::get('/cadastro',['as'=>'cadastro','uses' =>'Auth\RegisterController@index']);
//Função de Cadastro
Route::post('/cadastro/cadastrar',['as'=>'cadastrar','uses' =>'Auth\RegisterController@cadastrar']);

//Rotas protegidas, só podem ser acessadas se o usuário ja está logado no sistema
Route::group(['middleware'=>'auth'] , function(){
    //Página inicial
    Route::get('/',['as'=>'homepage','uses' =>'HomeController@index']);
    //Adicionar produtos ao Carrinho
    Route::get('/produtos/carrinho/{id}',['as'=>'produtos.add','uses' =>'HomeController@addToCart']);
    //Página do Carrinho
    Route::get('/carrinho',['as'=>'carrinho','uses' =>'HomeController@Cart']);
    
    Route::get('/carrinho/adicionarQuantidade/{id}',['as'=>'carrinho.add','uses' =>'HomeController@addQtd']);

    Route::get('/carrinho/removerQuantidade/{id}',['as'=>'carrinho.remove','uses' =>'HomeController@removeQtd']);

    Route::get('/carrinho/removerItem/{id}',['as'=>'carrinho.removeItem','uses' =>'HomeController@removeItem']);
    //Página do Checkout
    Route::get('/checkout',['as'=>'checkout','uses' =>'CheckoutController@index']);
    //Ação de finalizar compra da página do Checkout
    Route::post('/finalizar',['as'=>'finalizar','uses' =>'CheckoutController@finalizar']);
    //Página de Histórico
    Route::get('/historico',['as'=>'historico','uses' =>'HistoricoController@index']);
});







