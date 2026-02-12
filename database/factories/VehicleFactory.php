<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\File;
class VehicleFactory extends Factory
{
    public function definition(): array
    {
        $images = collect(File::files(public_path('storage')))
            ->map(fn($file) => 'storage/' . $file->getFilename())
            ->toArray();

          $selectedImages = collect($images)->random(5)->values()->toArray();
        $makes = [
            'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Highlander'],
            'Honda' => ['Accord', 'Civic', 'CR-V'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'GLC'],
            'BMW' => ['3 Series', '5 Series', 'X5'],
        ];

        $make = Arr::random(array_keys($makes));
        $model = Arr::random($makes[$make]);

        $price = $this->faker->numberBetween(4_000_000, 45_000_000);
        $isSold = $this->faker->boolean(15);

        return [
            'make' => $make,
            'model' => $model,
            'year' => $this->faker->numberBetween(2008, now()->year),

            'other_specs' => [
                'trim' => Arr::random(['Base', 'LE', 'SE', 'XLE', 'Sport']),
                'package' => Arr::random(['Standard', 'Premium', 'Luxury']),
            ],

            'import_origin' => Arr::random(['USA', 'Canada', 'Germany', 'Japan']),
            'price_negociable' => $this->faker->boolean(40),

            'price_breakdown' => [
                'downpayment' => round($price * 0.3, 2),
                'monthly_installment' => round($price / 12, 2),
                'duration_months' => 12,
            ],

            'price' => $price,
            'status' => $isSold
                ? 'sold'
                : Arr::random(['available', 'reserved']),

            'mileage' => $this->faker->numberBetween(5_000, 180_000),
            'condition' => Arr::random(['new', 'used', 'foreign_used']),

            'transmission' => Arr::random(['automatic', 'manual']),
            'fuel_type' => Arr::random(['petrol', 'diesel', 'hybrid', 'electric']),
            'engine' => Arr::random(['1.8L', '2.0L', '2.5L', '3.0L']),
            'doors' => Arr::random([2, 4, 5]),

            'images' => [
                $selectedImages,
            ],

            'description' => $this->faker->paragraphs(2, true),

            'currency' => 'NGN',

            // 'price_sold_at' => $isSold ? $price : null,
            // 'sold_at' => $isSold ? Carbon::now()->subDays(rand(1, 30)) : null,

            'is_featured' => $this->faker->boolean(10),
            'published_at' => Carbon::now()->subDays(rand(0, 14)),
        ];
    }

    /* -----------------------------
     |  Useful States (ELITE MOVE)
     |-----------------------------*/

    public function sold(): self
    {
        return $this->state(fn () => [
            'status' => 'sold',
            // 'sold_at' => now(),
            // 'price_sold_at' => $this->faker->numberBetween(5_000_000, 40_000_000),
        ]);
    }

    public function featured(): self
    {
        return $this->state(fn () => [
            'is_featured' => true,
        ]);
    }

    public function available(): self
    {
        return $this->state(fn () => [
            'status' => 'available',
            // 'sold_at' => null,
            // 'price_sold_at' => null,
        ]);
    }
}
