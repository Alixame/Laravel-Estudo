<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    //
    protected $fillable = ['pedido_id' , 'produto_id', 'quantidade'];

}
