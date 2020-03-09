<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appt;
use Session;
use App\Helper;
use Auth;
use App\User;

class ApptsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $appointments = Appt::orderBy('id','ASC')->get();

        return view('appts.index', compact('appointments'));
    }

    public function create()
    {
        
        return view('appts.create');
    }

    public function store()
    {
        
        // $data = $this->myValidation();
        
        // Appt::create($data);
        // Session::flash('success', 'Hecho!');
        // return back();

        // 
        
        $user = User::findOrFail(Auth::user()->id);

        $data = $this->myValidation();

        $user->appts()->create($data);

        Session::flash('success', 'Hecho!');

        return back();

    }


    

    public function edit(Appt $horario)
    {

        return view('appts.edit', compact('horario'));
    }

    public function update(Request $request, Appt $horario)
    {
        $data = $this->myValidation();

        $horario->update($data);

        Session::flash('success', 'Actualizado.');

        $appointments = Appt::orderBy('id','ASC')->get();;
        return view('appts.index', compact('appointments'));
    }

    public function destroy(Appt $horario)
    {
        $horario->delete();

        Session::flash('success', 'Eliminado.');

        $appointments = Appt::orderBy('id','ASC')->get();
        return view('appts.index', compact('appointments'));
        
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
