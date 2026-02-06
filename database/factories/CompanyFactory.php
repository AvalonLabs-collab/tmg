<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,

            'about_us' => $this->faker->optional()->paragraph(),

            'address' => $this->faker->optional()->address(),

            'phone' => $this->faker->optional()->phoneNumber(),

            'other_branches' => $this->faker->optional()->randomElements([
                $this->faker->address(),
                $this->faker->address(),
                $this->faker->address(),
            ], rand(1, 3)),

            'social_handles' => $this->faker->optional()->randomElement([
                [
                    'twitter' => '@'.$this->faker->userName(),
                    'instagram' => '@'.$this->faker->userName(),
                ],
                [
                    'facebook' => $this->faker->url(),
                    'linkedin' => $this->faker->url(),
                ],
            ]),

            'service_ensurance' => $this->faker->optional()->randomElement([
                [
                    'warranty' => true,
                    'duration' => '12 months',
                ],
                [
                    'support' => true,
                    'response_time' => '24 hours',
                ],
            ]),
        ];
    }
}
