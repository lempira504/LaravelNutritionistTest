<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Entrevista;

class EntrevistasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Entrevista $entrevista)
    {
        dd($entrevista);
        return view('entrevistas.show', compact('entrevista'));
    }
}
