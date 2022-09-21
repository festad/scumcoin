<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class UserDataLayer
{
    public static function create($name, $email, $password)
    {
        $pubkey = hash('sha256', $email);
        $h_password = hash('sha256', $password);
        $user = new User([
            'name' => $name,
            'email' => $email,
            'pubkey' => $pubkey,
            'password' => $h_password,
            'balance' => 0,
            'power' => 'normal',
        ]);
        $user->save();
        Auth::login($user);
        return $user;
    }
}
