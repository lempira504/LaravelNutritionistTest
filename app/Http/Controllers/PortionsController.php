<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portion;
use Session;

class PortionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portions = Portion::paginate(6); 

        return view('portions.index', compact('portions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portions = Portion::latest('id')->first(); //calls the last stored record

        return view('portions.create', compact('portions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $this->validateFields();//validates fields

        Portion::create($data); //store data in db

        
        Session::flash('success', 'Hecho.'); 
        return redirect()->back();

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
        $portion = Portion::findOrFail($id);
        $portion->delete();
        
        Session::flash('success', 'Eliminado');

        return back();

    }

    public function validateFields()
    {
        return $data = request()->validate([
            'time' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
        ]);
    }
}
