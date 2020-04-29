<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    protected $guarded = [];

    public function routes()
    {
        return $this->hasMany('App\Route');
    }
}
