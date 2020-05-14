<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    public $timestamps = false;
    protected $table = 'tbOnibus';
    protected $primaryKey = 'idOnibus';
}
