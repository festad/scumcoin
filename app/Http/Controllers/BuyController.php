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
        // // if the voucher does not exist give the control
        // // to the ajax error handler
        if (!Voucher::where('code', $request->code)->exists()) {
            error_log("Error in first if voucher does not exist");
            return response()->json(['error' => 'Voucher does not exist']);
        }

        $amount = Voucher::where('code', $request->code)->firstOrFail()->amount;
        error_log("Error in voucher amount firstOrFail");

        Auth::user()->balance = Auth::user()->balance + $amount;
        Auth::user()->save();

        Voucher::where('code', $request->code)->delete();

        error_log("Just before final return");
        return response()->json(['redirect' => route('home')]);
    }
    
    public function complete_payment(Request $request)
    {
        Auth::user()->balance = Auth::user()->balance + floatval($request->amount);
        Auth::user()->save();
        
        return response()->json(['redirect' => route('home')]);
    }
    
}

