<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOnibus extends Model
{
    public $timestamps = false;
    protected $table = 'tbTipo_Bus';
    protected $primaryKey = 'idTipo_Bus';
}
