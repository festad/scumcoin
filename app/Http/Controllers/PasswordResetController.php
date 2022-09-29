<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Models\User;

use App\Mail\PasswordReset;


class PasswordResetController extends Controller
{

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $new_password = str_shuffle(substr($user->password, 0, 8));
        $user->password = hash('sha256', $new_password);
        $user->save();
 
        // Ship the order...
 
        Mail::to($request->email)->send(new PasswordReset($new_password));
        return redirect()->route('home');
    }
}
