<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Models\User;

use App\Mail\PasswordReset;


class PasswordResetController extends Controller
{

    public function show(Request $request)
    {
        return view('forgot_password');
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $new_password = str_shuffle(substr($user->password, 0, 8));

        $user->password = hash('sha256', $new_password);


        $user->change_password = true; // flag for a middleware to force
        // the user to change password at next login.
        
        $user->save();

         // Mail::to($request->email)->send(new PasswordReset($new_password));
 
        // We send the new password as a response that will be displayed in the home.

        return response()->json(['new_password' => $new_password]);
        
    }
}
