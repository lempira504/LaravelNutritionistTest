<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use Redirect;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userComments = Contact::orderBy('created_at', 'ASC')->paginate(10);
        return view('contacts.index', compact('userComments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
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
        $data = $this->validateMyFields();

        Contact::create($data);
        
        return back()->with('success', 'Enviado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contacto)
    {
        //
        
        return view('contacts.show', compact('contacto'));
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
    public function destroy(Contact $contacto)
    {
        //
        $contacto->delete();

        // return back()->with('success', 'Comentario Eliminado.');
        return redirect('contactos')->with('success', 'Comentario Eliminado.');
    }

    public function validateMyFields()
    {
        return $data = request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string|min:10',
        ]);
    }
}
