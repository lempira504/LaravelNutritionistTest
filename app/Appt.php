<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appt extends Model
{
    //
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
