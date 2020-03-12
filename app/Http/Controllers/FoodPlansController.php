<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portion;
use App\Appointment;

class FoodPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $portions = Portion::all();

        // $patrones = [
        //     'AYUNAS y a las 4:00 p.m.',
        //     'DESAYUNO: 7:00 a.m.', 
        //     'MERIENDA: 10:00 a.m.', 
        //     'ALMUERZO: 12:00 m.d', 
        //     'MERIENDA: 3:00 p.m', 
        //     'CENA: 6:00 p.m.'
        // ];

        // $opcion1 = [
        //     '1 tz de te verde con te quema grasa',
        //     '1 1/2 tz de leche 0% con 1 tz de melón con 2 cdas de granola, licuar. 2 tz de papaya en cuadritos con 1 cdita de miel.',
        //     '1 manzana verde.',
        //     '1 1/2 tz de ensalada de lechuga con espinacas y zanahoria rallada, chile dulce, pizca de sal y limon. 1 1/2 filete de Pescado al vapor.',
        //     '1 galleta de macadamia',
        //     '1 1/2 tz de jugo de toronja con papaya. Licuar. 2 tz de melón con 2 cdas de kiwi en cuadritos y 1 cda de miel, mezclar con 2 cdas de granola, 1/2 tz de yogurt de fresa.',
        // ];

        // $opcion2 = [
        //     '1 tz de te verde con te quema grasa',
        //     '1 1/2 tz de leche 0% con 1 tz de papaya con 2 cdas de avena integral con 1 cdita de
        //     miel. Licuar. 2 barras de galleta de linaza.',
        //     '1 manzana gala',
        //     '1 1/2 tz de brócoli con coliflor y zanahoria al vapor con 1 cdita de aceite de oliva. 1
        //     1/2 filete de pollo a la plancha.',
        //     '1 galleta de soda integral.',
        //     '1 1/2 tz de leche 0% con 1 tz de melocotón, licuar con 2 cdas de granola. 2 tz de sandia
        //     con pina y 1 cda de miel.'
        // ];


        return view('foodplans.create', compact('portions'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //retrieves the appointment
        $appointment = Appointment::findOrFail($id);

        //retrieves all portions
        $portions = Portion::all();

        return view('foodplans.show')->withAppointment($appointment)->withPortions($portions);
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
}
