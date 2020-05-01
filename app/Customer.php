<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'dni', 'email', 'address', 'city_id','phone', 'veterinarian_id'
    ];

    public function Veterinarian()
    {
        return $this->hasOne(Veterinarian::class);
    }

    public function Turn()
    {
        return $this->hasMany(Turn::class);
    }

    public function Patient()
    {
        return $this->hasMany(Patient::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class);
    }
}
