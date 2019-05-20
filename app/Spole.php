<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spole extends Model
{
    protected $table = 'spoles';
    protected $primaryKey = 'id_spoles';
    public $timestamps = false;
}
