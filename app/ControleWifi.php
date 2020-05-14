<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControleWifi extends Model
{
    public $timestamps = false;
    protected $table = 'tbWifi_Onibus';
    protected $primaryKey = 'idWifi_Onibus';
}
