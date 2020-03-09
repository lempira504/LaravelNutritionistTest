<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Appointment;
use App\Hour;
use Session;

class SearchHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $hours = Hour::all();
        $appointments = Appointment::all();
    
        return view('search.index', compact('hours', 'appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view('search.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateMyFields();
        
        $appointments = Appointment::where('date', '=', $data['date'])->get();

        Session::flash('appointments', $appointments);

        return view('search.create');


        /**Checks for date if available */
        // if ($data = request()->validate(['date' => 'required|date'])) {
        //     $appointments = Appointment::where('date', '=', $data['date'])->get();

        //     Session::flash('appointments', $appointments);
        //     // dd(session()->all());

        //     return back()->with('search', $data['date']);
        // }

        //https://stackoverflow.com/questions/37620524/how-to-send-values-to-session-laravel
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function validateMyFields()
    {
        return $data = request()->validate([
            'date' => 'required|date',
        ]);
    }
}
