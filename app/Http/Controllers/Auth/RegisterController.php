<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:3'],
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
        /* Si la case dispo est coher*/
        if (isset($_POST['dispo'])){
            $dispo = 1;
        }
        else{
            $dispo = 0;
        }
        /* Si la case mentor est cocher*/
        if (isset($_POST['mentor'])){
            $mentor = 1;
        }
        else{
            $mentor = 0;
        }
        /* Si la case mentorer est cocher*/
        if (isset($_POST['mentorer'])){
            $mentorer = 1;
        }
        else{
            $mentorer = 0;
        }

        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'age' => $data['age'],
            'dispo' => $dispo,
            'candidature_mentor' => $mentor,
            'candidature_mentorer' => $mentorer,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
