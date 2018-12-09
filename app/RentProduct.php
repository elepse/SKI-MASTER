<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentProduct extends Model
{
    protected $table = 'rent_products';
    public $timestamps = false;
    protected $guarded = [''];
}
