<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Helper;
use App\Hour;
use App\User;
use Auth;
use Session;
use App\Appointment;
use Carbon\Carbon;
use Redirect;

class AppointmentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $appointments = Appointment::orderBy('date', 'ASC')->paginate(6);
        $availableHours = Hour::all();
        $codigoDelPaciente = Helper::makeCode();

        // return view('appointments.index', compact('appointments'));
        return view('appointments.index', compact('appointments', 'availableHours', 'codigoDelPaciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $codigoDelPaciente = Helper::makeCode();//makecode() comes from Helpers/helper.php
        $availableHours = Hour::all();

        $appointment = Appointment::orderBy('date','desc')->first();
        
        return view('appointments.create', compact('codigoDelPaciente', 'availableHours', 'appointment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //good
        // dd($request['date']);
       
        
        // //end of good

        if(Helper::checkIfHourIsTakenWhenMakingAnAppointment($request['date'], $request['hour_id']))
        {
            $request->request->add(['hour_id' => '']);

            $data = $this->validateMyFields();
            Session::flash('danger', 'Hora y Fecha Ya Existen.');
            return Redirect::back();
        }
        
        $data = $this->validateMyFields();
        $user = User::findOrFail(Auth::user()->id);
        
        $user->appointments()->create($data);
        
        Session::flash('success', 'Cita Creada.');
        
        return back();

     

        
        
    }

    public function buscar(Request $request)
    {
        
        // $data = request()->validate(['search' => 'required|date']);
        
        /**Checks for date if available */
        if ($data = request()->validate(['search' => 'required|date'])) {
            // dd($data['search']);
            $appointments = Appointment::where('date', '=', $data['search'])->get();
            // dd($appointments->hour_id);
            // foreach ($appointments as $appointment) {
            //     $hours = Hour::where('id', $appointment->hour_id);
            // }
            // dd($dateId);

            Session::flash('appointments', $appointments);
            
            // dd(session()->all());

            return back()->with('date', $data['search']);
        }//This code ends and its working

/*
|
|--------------------------------------------------------------------------
| AJAX
|--------------------------------------------------------------------------
|       $messages = [
            'required' => 'El :attribute campo es requerido por mi'
        ];
        // $data = request()->validate(['search' => 'required|date']);
        $data = Validator::make(
            $request->all(),
            [
                'search' => 'required|date',
            ],
            $messages
        );
        
        if ($data->fails()) {
            $response = $data->messages();
        }else
        {
            // $response = ['success' => 'Submitted'];
            // $response = ['success' => 'Submitted'];
        }
        
        
        // return response()->json(['message' => $data], 200);
        return response()->json($response, 200);
        // return 'subm';
*/       

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
    public function destroy(Appointment $cita)
    {
        $cita->delete();

        Session::flash('success', 'Eliminado.');
        
        return back();
    }


    public function validateMyFields()
    {
        return $data = request()->validate([
            'code' => 'required|string',
            'name' => 'required|string',
            'hour_id' => 'required|string',
            'date' => 'required|date',
            'phone' => 'required|string',
        ]);
    }

    public function checksAvailableDateAndTimeForAppt(Request $requests)
    {
        return $requests->name;
    }

    
}
