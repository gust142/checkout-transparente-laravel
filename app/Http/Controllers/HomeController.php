<?php

namespace App\Http\Controllers;

use Auth;
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
        
        $carrinho->add($produtoSelecionado,$produtoSelecionado->id,Auth::user()->id);
        $request->session()->put('carrinho',$carrinho);
        
        return redirect()->route('homepage');
    }

    public function cart(){
        if(!Session::has('carrinho')){
            return view('carrinho.index',['produtos'=>[]]);
        }
        $carrinhoAntigo = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoAntigo);
        
        return view('carrinho.index',['id',$carrinho->userId,'produtos'=>$carrinho->items,'valorTotal'=>$carrinho->valorTotal]);

    }

    public function addQtd( Request $request,$id){
        $carrinhoAntigo = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoAntigo);

        $carrinho->addQtd($id);
        $request->session()->put('carrinho',$carrinho);
        return redirect()->route('carrinho');
    }

    public function removeQtd(Request $request,$id){
        $carrinhoAntigo = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoAntigo);

        $carrinho->removeQtd($id);
        $request->session()->put('carrinho',$carrinho);
        return redirect()->route('carrinho');
    }

    public function removeitem(Request $request, $id){
        $carrinhoAntigo = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoAntigo);
        $carrinho->removeItem($id);

        if(count($carrinho->items) == 0){
            $request->session()->forget('carrinho');
        }else{
            $request->session()->put('carrinho',$carrinho);
        }

        return redirect()->route('carrinho');
    }
}
