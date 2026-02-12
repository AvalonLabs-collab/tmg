<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\filamentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class filamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::factory()->count(1)->create([
              'name' => 'kleinmoretti',
              'email' => 'kleinmoretti@lotm.com',
              'is_admin' => true,
              'password' => 'kelinmorettikey',
              'remember_token' => Str::random(10),
        ]);
    }
}
