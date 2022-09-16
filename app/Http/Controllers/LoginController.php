<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class LoginController extends Controller
{
    public function show()
    {
	    return view('login');
    }

    // The password IS NOT ALREADY HASHED
    public function authenticate(Request $request)
    {
        
        $user = User::where('email', $request->email)
              ->firstOrFail();

        if (hash('sha256', $request->password) ==
                        $user->password) {
            $request->session()->regenerate();
            Auth::login($user);
            return redirect()->intended('/');
        }

        // else
        return back()->withErrors([
            'password' => 'Death end: mismatch.',
        ])->onlyInput('password');
    }
}
