<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $guarded = [];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
    
}
