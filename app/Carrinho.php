<?php

namespace App;
use Auth;
class Carrinho 
{
    public $items = null;
    public $quantidadeTotal = 0;
    public $valorTotal = 0;
    public $userId = 0;

    public function __construct($oldCart){
        
            if($oldCart){
                $this->items = $oldCart->items;
                $this->quantidadeTotal = $oldCart->quantidadeTotal;
                $this->valorTotal = $oldCart->valorTotal;
                $this->userId = $oldCart->userId;
            }
    }

    public function add($item,$id,$userId){
        
        $itemGuardado = ['qtd' => 0, 'valor' =>$item->valor, 'item' =>$item  ];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                    $itemGuardado = $this->items[$id];
            }
        }
        $itemGuardado['qtd']++;
        $itemGuardado['valor'] = $item->valor * $itemGuardado['qtd'];
        
        $this->items[$id] = $itemGuardado;
        $this->quantidadeTotal++;
        $this->valorTotal += $item->valor;
        $this->userId = $userId;
        
    }
    public function addQtd($id){
        
        foreach($this->items as $index => $produtosCarrinho){
            if($produtosCarrinho['item']['id'] == $id){
                $objProduto;
                $posicao = $index;
                $valor = (integer) $produtosCarrinho['item']['valor'];
                $produtosCarrinho['qtd'] = $produtosCarrinho['qtd'] + 1;
                $produtosCarrinho['valor'] = $produtosCarrinho['valor'] + $valor;
                $this->quantidadeTotal ++; 
                $this->valorTotal += $valor;
                $objProduto = $produtosCarrinho;
                unset($this->items[$index]); 
                $this->items[$posicao] = $objProduto;
                ksort($this->items);
                
            }
            
        }
    }
    public function removeQtd($id){
        
        foreach($this->items as $index => $produtosCarrinho){
            if($produtosCarrinho['item']['id'] == $id){
                $objProduto;
                $posicao = $index;
                $valor = (integer) $produtosCarrinho['item']['valor'];
                $produtosCarrinho['qtd'] = $produtosCarrinho['qtd'] - 1;
                $produtosCarrinho['valor'] = $produtosCarrinho['valor'] - $valor;
                $this->quantidadeTotal --; 
                $this->valorTotal -= $valor;
                if($produtosCarrinho['qtd'] > 0){
                    $objProduto = $produtosCarrinho;
                    unset($this->items[$index]); 
                    $this->items[$posicao] = $objProduto;
                    ksort($this->items);
                }else{
                    unset($this->items[$index]);
                }
               
            }
            
        }
    }
    public function removeItem($id){
        
        foreach($this->items as $index => $produtosCarrinho){
            if($produtosCarrinho['item']['id'] == $id){
                $quantidadeProduto = $produtosCarrinho['qtd'];
                $valorProduto = $produtosCarrinho['valor'];
                
                $this->quantidadeTotal -= $quantidadeProduto; 
                $this->valorTotal -= $valorProduto;
                unset($this->items[$index]);
            }
        }
    }
}
