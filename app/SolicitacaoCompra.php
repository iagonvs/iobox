<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoCompra extends Model
{
    public $timestamps = false;
    protected $table = 'tbSolicitacao_Compra';
    protected $primaryKey = 'idSolicitacaoCompra';

}
