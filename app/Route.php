<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $guarded = [];

    public function loads()
    {
        return $this->hasMany('App\Load');
    }
}
