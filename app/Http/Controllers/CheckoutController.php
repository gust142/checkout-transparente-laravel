<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Carrinho;
use App\Transportadora;
use App\TipoPagamento;
use App\Pagamento;
use App\Compra;
use App\Endereco;
use App\CompraProduto;
class CheckoutController extends Controller
{
    public function index(){

        if(!Session::has('carrinho')){
            return view('checkout.index',['produtos'=>null]);
        }
        $carrinhoAntigo = Session::get('carrinho');
        $carrinho = new Carrinho($carrinhoAntigo);
        $transportadoras = new Transportadora();
        $formaPagamentos = new TipoPagamento();
        
        return view('checkout.index',['id',$carrinho->userId,
        'produtos'=>$carrinho->items,
        'valorTotal'=>$carrinho->valorTotal,
        'transportadoras'=> $transportadoras->lista(),
        'pagamento'=>$formaPagamentos->lista()
        
        ]);
    }

    public function finalizar(Request $request){
        $dadosRequest = $request->all();
        
        $carrinhoAntigo = Session::get('carrinho');

        
        $carrinho = new Carrinho($carrinhoAntigo); //informações do carrinho
        
        
        //armazenar endereço
        $enderecoCriado = Endereco::create(['descricao'=>$dadosRequest['endereco'],'userId'=>Auth::user()->id]);
        //procurar transportadora por id para buscar o valor do frete
        $transportadora = Transportadora::find((integer)$dadosRequest['transportadoraId']);
        //inserção na tabela de pagamento
        $pagamento = Pagamento::create([
            'valor'=>$transportadora->valor + $carrinho->valorTotal ,
            'tipoPagamentoId'=>(integer)$dadosRequest['pagamentoId']
            ]);
        //inserção na tabela de compra
        $codRastreio = 'AA'. rand(100000000,999999999) ."BR";
        $compra = Compra::create([
            'pagamentoId'=>$pagamento->id,
            'userId'=>Auth::user()->id,
            'enderecoId'=>$enderecoCriado->id,
            'transportadoraId'=>$transportadora->id,
            'codRastreio' =>$codRastreio
            ]);
            foreach ($carrinho->items as $produto) {
                $pagamento = CompraProduto::create([
                    'compraId'=>$compra->id,
                    'produtoId'=>$produto['item']->id,
                    'quantidade'=>$produto['qtd'],
                    'valor'=>$produto['valor']
                    ]);
            }

            $request->session()->forget('carrinho');
            
        return redirect()->route('homepage')->with('codRastreio', $codRastreio)->with('compra', $compra->id);
    }

    
}
