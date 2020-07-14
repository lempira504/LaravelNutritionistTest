<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HourStoreRequest;

use Session;
use Auth;
use App\User;
use App\Hour;
use Redirect;
use App\Helper;

class HoursController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $todaysDate = Helper::getTimeZoneDate('dddd, D Y', 'America/Tegucigalpa');
        $user = User::findOrFail(Auth::user()->id);
        // dd($user->license_id);
        

        $hours = Hour::where('license_id', $user->license_id)
                        ->orderBy('time','DESC')->get();
        // $hours = Hour::join('users', 'hours.user_id', '=', 'users.id')
        //                     ->where('license_id', $user->license_id)
        //                     ->orderBy('time','ASC')
        //                     ->get();
        

        return view('hours.index', compact('hours', 'todaysDate'));
    }

    public function create()
    {
        return view('hours.create');
    }

    public function store(Request $request)
    {
        
        $user = User::findOrFail(Auth::user()->id);
        // dd($user);
        $request['user_id'] = $user->id;
        $request['license_id'] = $user->license_id;
        
        
        $data = $this->myValidation();
       
        
        
        $user->hours()->create($data);

        Session::flash('success', 'Hecho!');

        $hours = Hour::orderBy('id','ASC')->get();
        // return view('hours.index', compact('hours'));
        return redirect()->back()->with('hours', $hours);

    }


    

    public function edit(Hour $hora)
    {

        return view('hours.edit', compact('hora'));
    }

    public function update(Request $request)
    {
        /**Good one with redirect */
        // $data = $this->myValidation();

        // $hora->update($data);
        /**Good one with redirect */



        /**With Modal */

        /**Grabs users license belong to a doctor and assign it to license_id request*/
        $user = User::findOrFail(Auth::user()->id);
        $request['user_id'] = $user->id;
        
        $request['license_id'] = $user->license_id;

        $editHour = Hour::findOrFail($request->hour_id);
        $data = $this->myValidation();
        // dd($data);
        $editHour->update($data);

        Session::flash('success', 'Actualizado.');

        $hours = Hour::orderBy('id','ASC')->get();;
        // return view('hours.index', compact('hours'));
        return redirect()->back()->with('hours', $hours);
    }

    public function destroy(Hour $hora)
    {
        $hora->delete();

        Session::flash('success', 'Eliminado.');

        $hours = Hour::orderBy('id','ASC')->get();
        // return view('hours.index', compact('hours'));
        return redirect()->back()->with('hours', $hours);
        
    }



    /**
     * Validates my Plan fields
     */
    public static function myValidation()
    {
        return $data = request()->validate([
            'user_id' => 'required|integer',
            'license_id' => 'required|integer',
            'time' => 'required|string'
        ]);
    }
}
