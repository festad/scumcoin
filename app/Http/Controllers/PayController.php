<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;


class PayController extends Controller
{
    public function show()
    {
        return view('pay', [
            'users' => User::all()
        ]);
    }
}
