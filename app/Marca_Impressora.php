<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca_Impressora extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idMarca_Impressora';
    public $table = 'tbMarca_Impressora';
}
