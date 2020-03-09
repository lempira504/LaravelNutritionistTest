<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Helper;
use App\Appt;
use App\User;
use Auth;
use Session;
use Carbon\Carbon;
use App\Appointment;


class PatientsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $patients = Appointment::orderBy('date','desc')->get();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $availableHours = Appt::all();

        $codigoDelPaciente = Helper::makeCode();

        $patient = Patient::latest('id')->first();
        

        return view('patients.create', compact('codigoDelPaciente', 'availableHours', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = User::findOrFail(Auth::user()->id);

        $availableHours = Appt::all();

        $data = $this->validateMyFields();

        Patient::create($data);

        Session::flash('success', 'Ingresada.');

        
        return back();

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $paciente)
    {
        //
        
        return view('patients.show', compact('paciente'));
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
        return 'dfa';
    }

    public function validateMyFields()
    {
        return $data = request()->validate([
            'name' => 'required|string',
            'date' => 'required|string',
            'code' => 'required|string',
            'appt_id' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',

        ]);
    }
}
