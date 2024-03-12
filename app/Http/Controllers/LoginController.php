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

        if (hash('sha256', $request->password) == $user->password) {
            $request->session()->regenerate();
            Auth::login($user);
            return redirect()->intended('/');
        }

        // log.info("User " . $user->id . " failed to login");
        // // Changing the language of the user
        // $cookieName = 'lang_pref_user_' . $user->id;
        // $userLocale = $request->cookie($cookieName, 'en'); // Default to 'en' if not set
        // app()->setLocale($userLocale); // Apply the language immediately
        // return redirect()->intended($this->redirectPath()); // Proceed as normal    

        // else
        return back()->withErrors([
            'password' => 'Email or password is incorrect.',
        ]);
    }
}
