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
        $carrinho->add($produtoSelecionado,$produtoSelecionado->id);
        $request->session()->put('carrinho',$carrinho);
        
        return redirect()->route('produtos');
    }

    public function cart(){
        if(!Session::has('carrinho')){
            return view('carrinho.index',['produtos'=>null]);
        }
        $carrinhoAntigo = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoAntigo);
        return view('carrinho.index',['produtos'=>$carrinho->items,'valorTotal'=>$carrinho->valorTotal]);

    }
}
