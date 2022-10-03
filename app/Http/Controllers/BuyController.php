<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Voucher;

class BuyController extends Controller
{
    public function show(Request $request)
    {
        return view('buy');
    }

    public function show_buy_cc(Request $request)
    {
        return view('buy_cc', [
            'amount' => $request->amount
        ]);
    }

    public function show_buy_cc_amount(Request $request)
    {
        return view('buy_cc_amount');
    }

    public function show_buy_voucher(Request $request)
    {
        return view('buy_voucher');
    }

    public function buy_with_voucher(Request $request)
    {
        $amount = Voucher::where('code', $request->code)->firstOrFail()->amount;
        Auth::user()->balance = Auth::user()->balance + $amount;
        Auth::user()->save();
        Voucher::where('code', $request->code)->delete();
        return view('success_buy', [
            'amount' => $amount
        ]);
    }
    
    public function complete_payment(Request $request)
    {
        Auth::user()->balance = Auth::user()->balance + floatval($request->amount);
        Auth::user()->save();
        
        return redirect()->route("home");
    }
    
}

