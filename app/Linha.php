<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    public $timestamps = false;
    protected $table = 'tbLinha_Chip';
    protected $primaryKey = 'idLinha_Chip';
}
