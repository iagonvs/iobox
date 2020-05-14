<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo_Impressora extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idModelo_Impressora';
    public $table = 'tbModelo_Impressora';
}
