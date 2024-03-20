<?php

namespace App\Http\DataLayer;

use App\Models\User;
use App\Models\Transaction;

use Exception;

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

    public function execute_payment($pubkey_sender, $pubkey_receiver, $amount)
    {
        $sender = User::where('pubkey', $pubkey_sender)->firstOrFail();
        $receiver = User::where('pubkey', $pubkey_receiver)->firstOrFail();

        if ($sender->balance < $amount) {
            throw new Exception('Insufficient funds');
        }

        if ($amount <= 0) {
            throw new Exception('Invalid amount');
        }

        $sender->balance -= $amount;
        $receiver->balance += $amount;
        $transaction = new Transaction([
            'sender' => $pubkey_sender,
            'receiver' => $pubkey_receiver,
            'amount' => $amount,
        ]);

        $transaction->save();
        $sender->save();
        $receiver->save();
        $sender->transactions()->save($transaction);
        $receiver->transactions()->save($transaction);
    }

    public function search_users_by_public_key($public_key)
    {
        $all_users = User::all();
        return $all_users->filter(function ($user) use ($public_key) {
            return strpos($user->pubkey, $public_key) !== false;
        });
    }

    public function search_users_by_email($email)
    {
        $all_users = User::all();
        return $all_users->filter(function ($user) use ($email) {
            return strpos($user->email, $email) !== false;
        });
    }

}