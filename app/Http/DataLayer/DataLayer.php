<?php

namespace App\Http\DataLayer;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        if ($amount <= 0) {
            throw new Exception('Invalid amount');
        }

        DB::beginTransaction();

        try {

            $sender = User::where('pubkey', $pubkey_sender)->firstOrFail();
            $receiver = User::where('pubkey', $pubkey_receiver)->firstOrFail();

            // If the sender and receiver are the same, throw an exception
            if ($sender->pubkey === $receiver->pubkey) {
                throw new Exception('Cannot send money to yourself');
            }

            // If the sender does not coincide with the authenticated user, throw an exception
            if ($sender->pubkey !== Auth::user()->pubkey) {
                throw new Exception('You cannot ask others to pay for yourself!');
            }

            // If the sender does not have enough balance, throw an exception
            if ($sender->balance < $amount) {
                throw new Exception('Insufficient funds');
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

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
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