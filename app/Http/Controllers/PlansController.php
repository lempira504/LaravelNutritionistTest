<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Cita;

class PlansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $plans = Plan::all();
        return view('plans.index', compact('plans'));
    }

    public function show(Cita $plan)
    {
        // $cita = Cita::findOrFail($id);
        // dd($cita);

        return view('plans.show', compact('plan'));
    }

    public function store()
    {
        
        $data = Plan::myValidation();
        // dd($data);
        Plan::create($data);

        return back();
    }

    public function appointment(Plan $id)
    {
        // dd(request());
        $plans = Plan::all();

        return view('entrevistas.show', compact('plans'));
    }
}
