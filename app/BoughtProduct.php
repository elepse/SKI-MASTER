<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoughtProduct extends Model
{
    protected $table = 'bought_products';
    public $timestamps = false;
    protected $guarded = [''];
}
