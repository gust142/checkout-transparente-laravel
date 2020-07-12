<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    public function lista(){
        return Transportadora::all();
     }
 
 
     public function findById($id){
         return Transportadora::find($id);
     }
}
