<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Http\DataLayer\DataLayer;
use Exception;


class PayController extends Controller
{
    public function show(Request $request)
    {

        if ($request->pubkey != Auth::user()->pubkey) {
            return redirect('/');
        }

        $otherUsers = User::whereNotIn('pubkey', [Auth::user()->pubkey])->get();
        
        return view('pay', [
            'otherUsers' => $otherUsers,
            'to_pubkey' => $request->to_pubkey
        ]);
    }

    public function confirm(Request $request)
    {
        return view('confirm', [
            'pubkey_sender' => $request->pubkey_sender,
            'pubkey_receiver' => $request->pubkey_receiver,
            'amount' => $request->amount
        ]);
    }

    public function execute_payment(Request $request) {

        try {

            $datalayer = new DataLayer();
    
            $datalayer->execute_payment($request->pubkey_sender,
                                        $request->pubkey_receiver,
                                        $request->amount);
    
            return redirect()->route('pay.success', [
                'pubkey' => $request->pubkey_receiver,
                'amount' => $request->amount
            ]);

        } catch (Exception $e) {
            return redirect()->route('home')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function success($pubkey, $amount) {
        return view('success', [
            'pubkey' => $pubkey,
            'amount' => $amount
        ]);
    }
        
}
