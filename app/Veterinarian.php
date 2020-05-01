<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veterinarian extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'postalCode', 'phone', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function Patient()
    {
        return $this->hasMany(Patient::class);
    }
}
