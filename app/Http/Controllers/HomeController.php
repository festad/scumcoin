<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function show()
    {
	    return view('home', [
            'transactions' => DB::table('transactions')
            ->orderBy('created_at', 'desc')
            ->paginate(50)
        ]);
    }
}
