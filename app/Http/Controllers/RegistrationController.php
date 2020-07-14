<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Helper;
use App\License;
use Redirect;
use Session;
use Hash;
use Auth;

class RegistrationController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('registration.create');
    }


    public function store()
    {
        
        $data = $this->validateMyFields();

        $licenseId = Helper::checkIfLicenseExists($data['license_id']);
        // dd($licenseId);

        if ($licenseId == false) {
            // dd('false');
            Session::flash('msg', 'Licencia No Disponible.');
            
            return back()->withInput();
        }else
        {
            #404 license not found
            $license = License::findOrfail($licenseId);

            
            
            // $data['license_id'] = strtolower($data['license_id']);
            $data['license_id'] = strtolower($license->id);
            $data['password'] = Hash::make($data['password']);

            // $license->users()->create($data);
            // return view('/home');
            // dd($data);
            $user = User::create($data);
            
            auth()->login($user);
        
            return redirect()->to('/');
        }

        
    }



    public function validateMyFields()
    {
        //+1 504 3269-5621
        return $data = request()->validate([
            'license_id' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }
}
