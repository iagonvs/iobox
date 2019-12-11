<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoStatus extends Model
{
    public $timestamps = false;
    protected $table = 'tbSolicitacao_Status';
    protected $primaryKey = 'idSolicitacaoStatus';
}
