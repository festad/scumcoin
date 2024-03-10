<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\DataLayer\DataLayer;

class RegisterController extends Controller
{
    
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        UserController::store($request);
        return redirect('/');
    }

    public function show()
    {
        return view('register');
    }

    public function check_email(Request $request)
    {
        // grab email from request
        $email = $request->input('email');
        // check if email is already in use
        $dataLayer = new DataLayer();
        if ($dataLayer->check_email_exists($email)) {
            return response()->json(['exists' => 'not_available']);
        } else {
            return response()->json(['exists' => 'available']);
        } 
    }
}
