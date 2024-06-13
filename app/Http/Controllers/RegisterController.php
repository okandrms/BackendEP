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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
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
