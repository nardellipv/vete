<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    public $timestamps = false;

    public function Patient()
    {
        return $this->hasMany(Patient::class);
    }
}
