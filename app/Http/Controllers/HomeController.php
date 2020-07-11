<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Carrinho;
use Session;
class HomeController extends Controller
{
    public function index(){
        $produto= new Produto();
        $lista = $produto->lista();
        return view('home.index',compact('lista'));
    }

    public function lista(){

    }

    public function addToCart(Request $request, $id){
        $produto= new Produto();
        $produtoSelecionado = $produto->findById($id);
        $carrinhoAntigo = Session::has('carrinho')? Session::get('carrinho'): null;
        $carrinho = new Carrinho($carrinhoAntigo);
        $carrinho->add($produtoSelecionado,$produto->id);
        $request->session()->put('carrinho',$carrinho);
        
        return redirect()->route('produtos');
    }

    public function checkout(){

    }
}
