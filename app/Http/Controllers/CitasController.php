<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Helper;

class CitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $codigoDelPaciente = Helper::makeCode();//makecode() comes from Helpers/helper.php

        $citas = Cita::all();

        return view('citas.index', compact('codigoDelPaciente', 'citas'));
    }

    public function create()
    {
        // $codigoDelPaciente = $this->makeCode();
        $codigoDelPaciente = Helper::makeCode();//makecode() comes from Helpers/helper.php

        return view('citas.create', compact('codigoDelPaciente'));
    }

    public function store()
    {
        //data calls a method to validate
        $data = $this->validateMyFields();

        Cita::create($data);


        return back();
    }

    public function edit(Cita $cita)
    {
        // $cita = Cita::findOrFail($id);

        return view('citas.edit', compact('cita'));
    }

    public function show(Cita $cita)
    {
        // $cita = Cita::findOrFail($id);

        return view('citas.show', compact('cita'));
    }

    public function update(Cita $cita)
    {
        // $cita = Cita::findOrFail($id);


        return view('citas.edit', compact('cita'));
    }

    /**
     * Valida mis campos del formulario Citas
     */
    public function validateMyFields()
    {
        return $data = request()->validate([
            'code' => 'required',
            'name' => 'required',
            'time' => 'required',
            'date' => 'required',
            'phone' => 'required',
            'email' => '',
            'address' => '',
        ]);
    }

}
