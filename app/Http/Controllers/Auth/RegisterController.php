<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Helper;
use App\License;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Redirect;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'license_id' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'license_id'    => $data['license_id'],
        //     'name'          => $data['name'],
        //     'phone'         => $data['phone'],
        //     'email'         => $data['email'],
        //     'password'      => Hash::make($data['password']),
        // ]);


        $licenseId = Helper::checkIfLicenseExists($data['license_id']);
        
        
        
        #404 license not found
        // $license = License::findOrfail($licenseId);
        
        //     $data['license_id'] = strtolower($data['license_id']);
        //     $data['password'] = Hash::make($data['password']);

        //     return $license->users()->create($data);
        


        
        
        
    }
}
