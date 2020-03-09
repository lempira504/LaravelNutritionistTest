<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    //
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        $this->hasMany(Appointment::class);
    }
}
