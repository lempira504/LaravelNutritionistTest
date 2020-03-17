<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\License;
use Hash;

class License extends Model
{
    //

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Generates license for new users when they want more access
     */
    public static function generateLicenseForUser()
    {
        
        // $license = Hash::make('yourpassword');
        // $license = str_replace('.', '',substr($license, 35));
        // $license = str_replace('/', '',$license($license, 35));
        $license = array();
        // dd(now());
        $doctor = Hash::make(now());//hash todays time pass
        $doctor = substr($doctor, 6);//deletes 6 characters
        $doctor = str_replace('.', '',$doctor);
        $doctor = str_replace('/', '',$doctor);
        $doctor = str_replace('$', '',$doctor);

        $total = strlen($doctor) / 2;
        $employee = substr($doctor, $total);

        $license[0] = $doctor;
        $license[1] = $employee;


        return $license;
    }
}
