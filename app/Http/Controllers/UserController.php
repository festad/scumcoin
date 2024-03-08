<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserDataLayer;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $user = UserDataLayer::create($name, $email, $password);
        Auth::login($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pubkey = $request->pubkey;
        $user = User::where('pubkey', $pubkey)->firstOrFail();
        $transactions = $user->transactions()
                             ->orderBy('created_at', 'desc')
                             ->paginate(20);
        return view('user', [
            'user' => $user,
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function confirm(Request $request)
    {
        $user = User::where('pubkey', $request->pubkey)->firstOrFail();
        $email = $user->email;
        
        return view('confirm_deletion', [
            'pubkey' => $request->pubkey,
            'email' => $email
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function execute_deletion(Request $request)
    {
        if ($request->pubkey != Auth::user()->pubkey &&
            Auth::user()->power != 'admin')
        {
            abort(401);
        }

        $user = User::where('pubkey',
                            $request->pubkey)->firstOrFail();
        $email = $user->email;
        $user->delete();

        return view('success_deletion', ['pubkey' => $request->pubkey,
                                         'email' => $email]);
    }
}
