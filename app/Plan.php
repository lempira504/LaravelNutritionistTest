<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //
    protected $guarded = [];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    /**
     * Validates my Plan fields
     */
    public static function myValidation()
    {
        return $data = request()->validate([
            'cita_id' => 'required|integer',
            'title' => 'required|string',
            'image' => '',
            'brazos' => 'required|string',
            'espalda' => 'required|string',
            'busto' => 'required|string',
            'cintura' => 'required|string',
            'cadera' => 'required|string',
            'piernas' => 'required|string',
            'peso_inicial' => 'required|string',
            'grasa_corporal' => 'required|string',
            'grasa_visceral' => 'required|string',
            'indice_masa_corporal' => 'required|string',
            'masa_muscular' => 'required|string',
            'talla' => 'required|string',
            'edad' => 'required|integer',
        ]);
    }
}
