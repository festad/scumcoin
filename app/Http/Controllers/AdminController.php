<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function show_dash()
    {
        // All users (both admin and normal)
        // ordered by descending balance
        $users = User::orderBy('balance', 'desc')
                     ->paginate(20);

        return view('admin_dash',
                    ['users' => $users]);
    }
}
