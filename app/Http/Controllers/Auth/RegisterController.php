<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return Validator::make(
            $data,
            [
                'name' => ['string', 'min:3', 'max:255'],
                'last_name' => ['nullable', 'string', 'min:3', 'max:255'],
                'date_of_birth' => ['nullable', 'date', 'before:' . now()->subYears(18)->toDateString()],
                'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            //Custom messages
            [
                'name.string' => 'The name must be a valid string.',
                'name.min' => 'The name must be at least 3 characters long.',
                'name.max' => 'The name cannot exceed 255 characters.',

                'last_name.string' => 'The last name must be a valid string.',
                'last_name.min' => 'The last name must be at least 3 characters long.',
                'last_name.max' => 'The last name cannot exceed 255 characters.',

                'date_of_birth.date' => 'The date of birth must be a valid date.',
                'date_of_birth.date_format' => 'The date of birth must be in the format yyyy-mm-dd.',
                'date_of_birth.before:now' => 'The date of birth must be a date before today.',
                'date_of_birth.before' => 'You must be at least 18 years old.',

                'email.required' => 'The email address is required.',
                'email.string' => 'The email address must be a valid string.',
                'email.email' => 'The email address must be a valid email.',
                'email.max' => 'The email address cannot exceed 255 characters.',
                'email.unique' => 'The email address is already in use.',

                'password.required' => 'The password is required.',
                'password.string' => 'The password must be a valid string.',
                'password.min' => 'The password must be at least 8 characters long.',
                'password.confirmed' => 'The password confirmation does not match.',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'date_of_birth' => $data['date_of_birth'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
