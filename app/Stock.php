<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = [
      'name', 'provider', 'internalCode', 'category_id', 'buyPrice', 'quantity', 'expire', 'veterinarian_id'
    ];

    public function Veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function Sale()
    {
        return $this->hasOne(Sale::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
