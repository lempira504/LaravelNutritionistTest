<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $guarded = [];

    public function appts()
    {
        return $this->hasMany(Appt::class);
    }
}
