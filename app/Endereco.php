<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'descricao', 'userId'
    ];

    public function lista(){
        return Endereco::all();
     }
 
 
     public function findById($id){
         return Endereco::find($id);
     }
     
     public function findByUserId($id){
        return Endereco::where('userId', $id);
    }

    
     
}
