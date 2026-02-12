<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class filamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

      protected $model = User::class;
    public function definition(): array
    {
        return [
            'name' => 'kleinmoretti',
            'email' => 'kleinmoretti@lotm.com',
            'email_verified_at' => now(),
            'password' => 'kelinmorettikey',
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ];
    }
}
