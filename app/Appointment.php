<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hour()
    {
        return $this->belongsTo(Hour::class);
    }

    public function interview()
    {
        return $this->belongsTo(Interview::class);
    }

    public static function findDate($data)
    {
        return Appointment::where('date', $data['date'])->first();
    }

    public static function checkForAvailableDateAndHour($data)
    {
        $hourExist = Appointment::where('hour_id', $data['hour_id'])->first() ? true : false;
        $dateExist = Appointment::where('date', $data['date'])->first() ? true : false;

        // if(!$hourExist->hour_id && !$dateExist->date)
        // {
        //     return false;
        // }

        if($hourExist && $dateExist)
        {
            return true;
        }else
        {
            return false;
        }

        
        // dd($hourExist->hour_id . ' ' . $dateExist->date);
    }

    public static function fetchAvailableHours($data)
    {
        $hourExist = Appointment::where('hour_id', $data['hour_id'])->orWhere('date', $data['date'])->first();

        return $hourExist;

    }


}
