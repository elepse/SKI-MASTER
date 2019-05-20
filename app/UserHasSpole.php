<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasSpole extends Model
{
    public $timestamps = false;
    public $table = 'user_has_spole';
    protected $guarded = [];
}
