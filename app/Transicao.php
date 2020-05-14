<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transicao extends Model
{
    public $timestamps = false;
    protected $table = 'tbTransicao';
    protected $primaryKey = 'idTransicao';
}
