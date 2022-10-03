<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $email  = fake()->unique()->safeEmail();
        $pubkey = hash('sha256', $email);
        $pass   = Str::random(16);
        $hash    = hash('sha256', $pass);
        $balance = rand(10, 500);
	
        return [
            'name' => fake()->name(),
            'email' => $email,
            'pubkey' => $pubkey,
            'email_verified_at' => now(),
            'password' => $hash,
            'balance' => $balance,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
