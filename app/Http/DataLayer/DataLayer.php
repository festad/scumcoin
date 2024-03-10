<?php

namespace App\Http\DataLayer;

use App\Models\User;

class DataLayer 
{
    public function check_email_exists($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            return true;
        }
        return false;
    }

}