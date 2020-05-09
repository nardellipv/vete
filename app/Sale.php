<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'invoice', 'quantity', 'date', 'status', 'mount', 'discount', 'customer_id', 'stock_id', 'veterinarian_id'
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function Veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function Stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
