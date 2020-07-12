<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrinho;
use App\Transportadora;
use App\TipoPagamento;
use App\Pagamento;
use App\Compra;
use App\Endereco;
use App\Produto;
use App\CompraProduto;
use Auth;
class HistoricoController extends Controller
{
    public function index(){
        $lista = Compra::where('userId', Auth::user()->id)->get();
        $compras;
        // dd($lista);
        foreach($lista as $compra){
            $pagamento = (object) Pagamento::find($compra->pagamentoId);
            $comprasProduto = CompraProduto::where('compraId',$compra->id )->get();
            $produtos;
            

            foreach($comprasProduto as $produto){
                $produtos[$produto->produtoId] = [
                    "id" => $produto->produtoId,
                    "quantidade" => $produto->quantidade,
                    "valor" => $produto->valor,
                    "produto" => Produto::find($produto->produtoId)

                ];
            }

            $compras[$compra->id] = [
                'id' => $compra->id,
                'codRastreio'=>$compra->codRastreio,
                'transportadora'=>Transportadora::find($compra->transportadoraId),
                'endereco' => Endereco::find($compra->enderecoId),
                'pagamento' => $pagamento,
                'tipoPagamento' => TipoPagamento::find($pagamento->tipoPagamentoId),
                'produtos' => $produtos,
                'dataCompra'=>$compra->created_at->format('d/m/Y H:i:s') 
            ];
        }
        

        return view('historico.index',compact('compras'));
    }
}
