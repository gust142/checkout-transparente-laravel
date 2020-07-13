<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'valor', 'tipoPagamentoId','nomeCompleto','numeroCartao','exp','cvv'
    ];
}
