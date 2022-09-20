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

        $otherUsers = User::whereNotIn('pubkey',
                                       [Auth::user()->pubkey])
                    ->get();
        
        return view('pay', [
            'otherUsers' => $otherUsers
        ]);
    }

    public function execute_payment(Request $request) {
        if ($request->pubkey_sender != Auth::user()->pubkey) {
            abort(401); // NON AUTHORIZED!
        }

        if ($request->pubkey_receiver == Auth::user()->pubkey) {
            abort(401); // CAN'T PAY TO MYSELF!
        }

        $sender = User::where('pubkey',
                             $request->pubkey_sender)->firstOrFail();
        $receiver = User::where('pubkey',
                               $request->pubkey_receiver)->firstOrFail();

        if ($sender->balance < $request->amount) {
            abort(401); // CAN'T SPEND MORE THAN I HAVE!
        }

        if ($request->amount <= 0) {
            abort(401); // CAN'T SPEND NEGATIVE AMOUNT OF SCUMCOIN!
        }
        
        
        $transaction = TransactionController::store($request);
        $sender->balance = $sender->balance - $request->amount;
        $receiver->balance = $receiver->balance + $request->amount;

        $sender->save();
        $receiver->save();

        $sender->transactions()->save($transaction);
        $receiver->transactions()->save($transaction);
        

        return view('success', ['pubkey' => $receiver->pubkey,
                                'amount' => $request->amount]);
    }
        
}
