<?php
namespace App;

use Carbon\Carbon;
use App\Appointment;
use App\Hour;
use DateTimeZone;

class Helper
{

    static function setLocalTime()
    {
        // var_dump(DateTimeZone::listIdentifiers());
        date_default_timezone_set('America/Costa_Rica');
    }

    public static function printArray($value)
    {
        echo"<pre>";
        print_r($value);
        echo "</pre>";
    }


    /**Genera el codigo para el paciente
     *date('F Y h:i:s');
     */
    public static function makeCode()
    {
        Helper::setLocalTime();
        // $customerCode = bcrypt(date('F Y h:i:s'));
        /**With underscore _ */
        // $customerCode = 'NG-' . date('Y');
        // $customerCode .= '_' . date('m');
        // $customerCode .= '_' . date('d');
        // $customerCode .= '_' . date('h');
        // $customerCode .= '_' . date('i');
        // $customerCode .= '_' . date('s');

        /**without underscore _ */
        $customerCode = 'NG'.date('Y').date('m').date('d').date('h').date('i').date('s').'LCB';


        return $customerCode;
    }

    /**This functions sets the Locale to Spanish and return translated days, months in spanish from enlgish */
    public static function setsDateToSpanish($value)
    {
        $date = Carbon::now()->locale('es');
        $date = Carbon::parse($value);

        return $date; 
    }

    /**Set Localization where the user is */
    // public static function setLocalizationWhereUserIsLocated()
    // {
    //     // $date = Carbon\Carbon::now()->locale('es');
                
    //     // setlocale(LC_TIME, 'es_ES');
    //     // $lo = Carbon\Carbon::setLocale('es');

    //     setlocale(LC_TIME, 'es_ES');
    //     Carbon::setLocale('es');

    //     // echo $date->day . ', ' . $date->monthName . ', ', $date->year;
    //     // $date = Carbon::now()->locale('fr_FR');

    //     // echo $date->locale();            // fr_FR
    //     // echo "\n";
    //     // echo $date->diffForHumans();     // il y a 1 seconde
    //     // echo "\n";
    //     // echo $date->monthName;           // janvier
    //     // echo "\n";

    //     /**This one works $date->isoFormat('LLL')*/
    //     // $date->isoFormat('LLL')
    //     //$date->isoFormat('DD MMMM YYYY')
    // }

    /**Returns day-montName and year: 21, Febrero, 2020 */
    public static function showDayMonthNameAndYearDate($date)
    {
        $date = Carbon::parse($date);

        return $date->day . ', ' . $date->monthName . ', ' . $date->year ;
    }

    /*var_dump($modifiedMutable->isoFormat('dddd, D Y'));     // string(8) "Sunday 1"
    **/
    public static function getTimeZoneDate($dateToDisplay, $timeZone)
    {
        $date = Carbon::now(new DateTimeZone($timeZone));
        
        return ucwords($date->isoFormat($dateToDisplay));
    }



    // public static function checkIfHourIsTakenWhenMakingAnAppointment($date)
    // {
    //     $appArray = array();
    //     $hoursArray = array();

    //     $appointments = Appointment::where('date', $date)->get();

    //     foreach ($appointments as $appointment) {
    //         $hours = Hour::where('id', $appointment->hour_id)->get();
    //         $appArray[] = $appointment->hour_id;
    //         // dd($hours);
    //         foreach ($hours as $hour) {
                
                
    //             $hoursArray[] = $hour->id;

    //             if ($hour->id == $appointment->hour_id) {
    //                 echo $appointment->hour_id . ' '. $appointment->date .', ' . $hour->id. ' '.$hour->time . '<br>';
                    
                    
    //             }
    //         }
    //     }

    //     $result = !empty(array_intersect($appArray, $hoursArray));

    //     var_dump($result);

    //     exit;
        
    // }

    public static function checkIfHourIsTakenWhenMakingAnAppointment($date, $hour_id)
    {
        $hour = array();
        $app = array();
        $counter = 0;

        if (!empty($hour_id)) {
                $hours = Hour::where('id', $hour_id)->first();
                $hour[] = $hours->id;

                $appointments = Appointment::where('date', $date)->get();

            foreach ($appointments as $appointment) {
                $app[] = $appointment->hour_id;
                
            }

            return $result = !empty(array_intersect($hour, $app));
            // dd($result);

            // while($counter < sizeof($app))
            // {
            //     if($hour == $app[$counter])
            //     {
                
            //         return true;
            //         // echo $app[$counter].'=True <br>';
            //     }
            //     // echo '<br>'.$app[$counter].'=False<br>';
                
            //     $counter++;
            // }
            

        }
        
        return false;


        

        

        // exit;
        // $hour = Hour::where('id', $hour_id)->first();

        // $hour = $hour->id;

        // // dd($appointment->hour_id);
        

        // dd($hour . ' ' . $app);

        // foreach ($hours as $hour) {
        //     $hoursArray[] = $hour->id;
        // }

        // $appointments = Appointment::where('date', $date)->get();

        // foreach ($appointments as $appointment) {
        //     // $hours = Hour::where('id', $appointment->hour_id)->get();
        //     $appArray[] = $appointment->hour_id;

        //     foreach ($hours as $hour) {
        //         if($hour->id)
        //         {
        //             dd(true);
        //         }else
        //         {
        //             dd(false);
        //         }
        //     }
            
        // }

        // dd($appArray);
        
        // $filteredFoo = array_diff($hoursArray, $appArray);

       
        
        // dd(count($hours) . ' ' . count($filteredFoo));

        // dd($filteredFoo);

        // if (empty($filteredFoo )) {
            
        //     dd('true');
        //     return true;
        // }else
        // {
        //     // $result = !empty(array_intersect($hoursArray, $appArray));
        //     dd($filteredFoo);
        // }

        // var_dump($appArray);
        // $result = !empty(array_intersect($appArray , $hoursArray));

        // dd($result);

        // exit;
        
    }

    


    
}