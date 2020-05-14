<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{   
    public $timestamps = false;
    protected $table = 'tbInventario_Agencia';
    protected $primaryKey = 'idInventario_Agencia';
}
