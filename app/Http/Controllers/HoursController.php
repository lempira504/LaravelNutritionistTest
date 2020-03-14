<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        $hours = Hour::orderBy('id','ASC')->paginate(6);
        $todaysDate = Helper::getTimeZoneDate('dddd, D Y', 'America/Tegucigalpa');

        return view('hours.index', compact('hours', 'todaysDate'));
    }

    public function create()
    {
        return view('hours.create');
    }

    public function store()
    {
        
        $user = User::findOrFail(Auth::user()->id);

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
        $editHour = Hour::findOrFail($request->hour_id);
        $data = $this->myValidation();
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
            'time' => 'required|string'
        ]);
    }
}
