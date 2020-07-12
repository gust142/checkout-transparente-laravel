<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraProduto extends Model
{
    protected $fillable = [
        'compraId', 'produtoId','quantidade','valor'
    ];
}
