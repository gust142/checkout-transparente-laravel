<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'pagamentoId', 'userId','enderecoId','transportadoraId'
    ];
    public function lista(){
        return Compra::all();
     }
 
 
     public function findById($id){
         return Compra::find($id);
     }
}
