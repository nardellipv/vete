<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'motive', 'date', 'hours', 'status', 'customer_id', 'patient_id', 'priority','veterinarian_id'
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
