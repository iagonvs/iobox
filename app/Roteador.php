<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roteador extends Model
{
    public $timestamps = false;
    protected $table = 'tbRoteador';
    protected $primaryKey = 'idRoteador';
}
