<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function Veterinarian()
    {
        return $this->hasMany(Veterinarian::class);
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
