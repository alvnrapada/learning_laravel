<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)     
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($attributes)) {
            $request->session()->regenerate();
            return redirect('/jobs');
        } else {    
            throw ValidationException::withMessages([
                'email' => 'Invalid login credentials',
            ]);
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
