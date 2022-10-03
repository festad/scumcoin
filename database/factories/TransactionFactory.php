<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nusers = 10;
        $sender_id = rand(1, $nusers-1);
        $sender = User::findOrFail($sender_id);
        $receiver_id = rand($sender_id+1, $nusers);
        $receiver = User::findOrFail($receiver_id);
        $amount = rand(10, 500);
	
        return [
            'sender' => $sender->pubkey,
            'receiver' => $receiver->pubkey,
            'amount' => $amount,
        ];
    }
}
