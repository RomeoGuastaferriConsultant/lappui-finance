<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // wire-in authentication middleware
        $this->middleware('auth');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|integer|min:1|max:4',
            'password' => 'required|string|min:6|confirmed',
            'region' => 'integer|min:1|max:18',
            'organisme' => 'integer'
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
        $this->authorize('create', User::class);

        // organisme is optional
        // there might be a cleaner way to do this, but...
        if (! array_key_exists('organisme', $data))
        {
            $data['organisme'] = 0;
        }

        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'region' => $data['region'],
            'organisme' => $data['organisme'],
            'password' => bcrypt($data['password']),
        ]);

        return Auth::user();
    }
}
