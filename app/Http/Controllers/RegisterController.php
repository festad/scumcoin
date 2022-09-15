<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UserController;

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
}
