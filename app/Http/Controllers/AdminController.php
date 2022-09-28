<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function show_dash()
    {
        if (Auth::user()->power != 'admin')
        {
            abort(401);
        }

        $users = User::whereNotIn('power', ['admin'])
               ->orderBy('balance', 'desc')
               ->paginate(20);

        return view('admin_dash',
                    ['users' => $users]);
    }
}
