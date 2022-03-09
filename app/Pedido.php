<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $fillable = ['cliente_id'];

    // USANDO BOAS PRATICAS DO LARAVEL PARA PEGAR DADOS RELACIONADOS N PRA N (METODO 'PERTENCE A MUITOS' - OU SEJA PRODUTO 'PERTENCE A MUITOS' PEDIDOS)
    public function produtos() {
        return $this->belongsToMany('App\Produto', 'pedido_produtos')->withPivot('id','created_at');
    }
}
