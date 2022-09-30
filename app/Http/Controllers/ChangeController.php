<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class ChangeController extends Controller
{
    public function show(Request $request)
    {
        return view('change_password');
    }

    public function change(Request $request)
    {
        if (Auth::user()->password
              == hash('sha256', $request->old_password) &&
            $request->password
              == $request->password_confirmation)
        {
            Auth::user()->password = hash('sha256', $request->password);

            Auth::user()->change_password = false;
            
            Auth::user()->save();
            
            return view('success_change');
        }

        abort(401);
    }
}
