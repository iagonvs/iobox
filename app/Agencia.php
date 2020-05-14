<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    public $timestamps = false;
    protected $table = 'tbAgencia';
    protected $primaryKey = 'idAgencia';
}
