<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'sex', 'race', 'chip', 'fur', 'weight', 'name', 'birthday', 'activity', 'connivance',
        'castrated', 'nutrition', 'frequency', 'comment', 'slug', 'specie_id', 'customer_id', 'veterinarian_id'
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function Task()
    {
        return $this->belongsTo(Task::class);
    }

    public function Veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function Specie()
    {
        return $this->belongsTo(Specie::class);
    }
}
