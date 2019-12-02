<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    public $timestamps = false;
    protected $table = 'tbEntrada';
    protected $primaryKey = 'idEntrada';

}
