<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    public $timestamps = false;
    protected $table = 'tbLocalidade';
    protected $primaryKey = 'idLocalidade';
}
