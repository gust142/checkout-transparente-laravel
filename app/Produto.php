<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    
    public function lista(){
       return Produto::all();
    }


    public function findById($id){
        return Produto::find($id);
    }
}
