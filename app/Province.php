<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
