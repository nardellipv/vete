<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $fillable = [
        'name', 'motive', 'import', 'customer_id', 'patient_id'
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
