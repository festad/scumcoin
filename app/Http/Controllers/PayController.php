<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Models\User;


class PayController extends Controller
{
    public function show(Request $request)
    {

        if ($request->pubkey != Auth::user()->pubkey) {
            return redirect('/');
        }
        
        return view('pay', [
            'users' => User::all()
        ]);
    }

    public function execute_payment(Request $request) {
        if ($request->pubkey_sender != Auth::user()->pubkey) {
            abort(401); // NON AUTHORIZED!
        }

        $sender = User::where('pubkey',
                             $request->pubkey_sender)->firstOrFail();
        $receiver = User::where('pubkey',
                               $request->pubkey_receiver)->firstOrFail();

        if ($sender->balance < $request->amount) {
            abort(401);
        }
        
        
        TransactionController::store($request);
        $sender->balance = $sender->balance - $request->amount;
        $receiver->balance = $receiver->balance + $request->amount;

        $sender->save();
        $receiver->save();

        return redirect('/');
    }
        
}
