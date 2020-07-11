<?php

namespace App;

class Carrinho 
{
    public $items = null;
    public $quantidadeTotal =0;
    public $valorTotal = 0;


    public function __construct($oldCart){
            if($oldCart){
                $this->items = $oldCart->items;
                $this->quantidadeTotal = $oldCart->quantidadeTotal;
                $this->valorTotal = $oldCart->valorTotal;
            }else{
                $this->items = null;
            }
    }

    public function add($item,$id){
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
        
    }
}
