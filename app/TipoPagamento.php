<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    public function lista(){
        return TipoPagamento::all();
     }
 
 
     public function findById($id){
         return TipoPagamento::find($id);
     }
}
