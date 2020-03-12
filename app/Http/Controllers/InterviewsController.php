<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helper;
use App\Interview;
use App\Appointment;
use Carbon\Carbon;
use App\User;
use Auth;
use Session;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use File;


class InterviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('interviews.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $codigoDelPaciente = Helper::makeCode();
       

        return view('interviews.create', compact('codigoDelPaciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request['active'] = 1;
        // $data['mimeType'] = $request['mime'];
        // $data['originalName'] = $request['originalName'];
        
       
        $data = $this->validateMyFields();
        
        
        // $file = $request->file('image')->store('img');
        // dd($request->file('image'));
        
        $user = User::findOrFail(Auth::user()->id);
        
        

        $user->interviews()->create($data);
        $this->storeImage($user, $request);
        


        Session::flash('success', 'Entrevista ha sido guardada.');
        $id = $data['appointment_id'];

        // return view('interviews.show');

        // $appointment = Appointment::findOrFail($data['appointment_id']);

        // $interview = Interview::findOrFail($data['appointment_id']);

        // return view('interviews.show', compact('appointment', 'interview'));
        // return view('interviews.show', compact('appointment', 'interview'));
        return redirect()->route('entrevistas.show', ['id' => $id]);
        
        // return back();
    }

    public function interview($id)
    {
        $codigoDelPaciente = Helper::makeCode();
        $appointment = Appointment::findOrFail($id);
       

        return view('interviews.create', compact('appointment', 'codigoDelPaciente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //Carbon::createFromFormat('Y-m-d','2019-08-03')->diffForHumans())
        // $codigoDelPaciente = Helper::makeCode();
        $appointment = Appointment::findOrFail($id);

        $interview = Interview::findOrFail($id);
        

        // $date = Carbon::parse($appointment->date);
        // $month = $date->format('F');
        // $day = $date->format('l');
        // // $day = $date->format('d.m.Y H:i:s');
        // $day = $date->format('d, F, Y');


        
        /**This method comes from the class Helper 
         * $date->isoFormat('LL') = 21 De Febrero De 2020
         * $date->monthName = Febrero
        */
        $date = Helper::setsDateToSpanish($appointment->date);
        

        return view('interviews.show', compact('appointment', 'date', 'interview'));
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
        $user = User::findOrFail(Auth::user()->id);
        
        $request['active'] = 1;
        
        $data = $this->validateMyFields();

        
        
        
        #Deletes old image, before loading the new one
        $this->deleteOldInterviewImageAfterUpdatingForNewOne($id);

        $user->interviews()->update($data);
        $this->storeImage($user, $request);
        

        // dd($user);

        Session::flash('success', 'Entrevista Actualizada.');
        $id = $data['appointment_id'];

        return redirect()->route('entrevistas.show', ['id' => $id]);
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

    private function validateMyFields()
    {
        return request()->validate([
            'dob' => 'required|string', 
            'appointment_id' => 'required|integer', 
            'email' => 'required|email',
            'age' => 'required|integer', 
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
            'weigth' => 'required|string',
            'heigth' => 'required|string',
            'image' => 'sometimes|file|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            // 'mimeType' => 'nullable|string',
            // 'originalName' => 'nullable|string',
            'active' => 'required|integer',
        ]);
    }

    private function storeImage($user, $request)
    {

        if (request()->has('image')) {

            

            // $image = Image::make(request()->file('image'))->resize(200, 200, function ($c) {
            //     $c->aspectRatio();
            // });
            
            // $image->save('img/' . time() . '.png');
            // // dd($image);

            
            // $user->interviews()->update([
            //     'image' => $image->basename,
            // ]);
            
            ///--------------------------------new
            $user->interviews()->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            
        }
        
    }

    
    private function deleteOldInterviewImageAfterUpdatingForNewOne($id)
    {
        $oldImageName = Interview::findOrFail($id);

        if(request()->has('image') && $oldImageName->image)
        {
            
            Storage::delete('public/'.$oldImageName->image);
        }
        
    }

    
}


