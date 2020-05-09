<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function Veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function Sale()
    {
        return $this->hasOne(Sale::class);
    }
}
