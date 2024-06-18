<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//RouteServicePRovider
use App\Providers\RouteServiceProvider;
// request
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // use RegistersUsers;

    // protected $redirectTo = 'jobs.index';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        $messages = [
            'password.min' => 'Password requires at least 8 characters and 1 special character.',
            'password.regex' => 'Password requires at least 1 special character.'
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    // Check for minimum length of 8 characters
                    if (strlen($value) < 8) {
                        // Check for at least one special character
                        if (!preg_match('/[^\w\s]/', $value)) {
                            $fail('Password requires at least 8 characters and 1 special character.');
                        } else {
                            $fail('Password requires at least 8 characters.');
                        }
                    }
                },
                'confirmed',],
        ]);
    }

    protected function create(Request $request)
{
    // Validate the request
    $this->validator($request->all())->validate();

    // Create the user
    $user = User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
    ]);

    // Attempt to log the user in
    if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        // If successful, redirect to /home
        return redirect()->intended('/');
    }

    // If authentication fails, you can handle it here (optional)
    return redirect()->route('login')->with('error', 'Registration successful, but login failed.');
}
}
