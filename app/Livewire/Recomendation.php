<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Recomendation extends Component
{
    public $vehicles = [
        [
        'make' => 'Toyota',
        'model' => 'Corolla',
        'year' => 2020,
        'price' => 18000,
        'currency' => 'USD',
        'description' => 'Reliable compact sedan with low mileage and full service history.',
        'images' => [
            'toyota_corolla_1.jpg',
            'toyota_corolla_2.jpg',
            'toyota_corolla_3.jpg',
        ],
        'price_breakdown' => [
            'base_price' => 17000,
            'taxes' => 800,
            'registration' => 200,
        ],
        'extra_specs' => [
            'Bluetooth',
            'Backup Camera',
            'Cruise Control',
            'Air Conditioning',
        ],
        'currency_symbol' => '$',
        'mileage' => 15000,
        'color' => 'White',
        'transmission' => 'Automatic',
        'fuel_type' => 'Petrol',
        'drivetrain' => 'FWD',
        'status' => 'Used',
      ],
       [
        'make' => 'Honda',
        'model' => 'Civic',
        'year' => 2019,
        'price' => 19000,
        'currency' => 'USD',
        'description' => 'Sporty and efficient compact car, perfect for city driving.',
        'images' => [
            'honda_civic_1.jpg',
            'honda_civic_2.jpg',
        ],
        'price_breakdown' => [
            'base_price' => 18000,
            'taxes' => 900,
            'registration' => 100,
        ],
        'extra_specs' => [
            'Sunroof',
            'Heated Seats',
            'Lane Assist',
        ],
        'currency_symbol' => '$',
        'mileage' => 12000,
        'color' => 'Silver',
        'transmission' => 'Manual',
        'fuel_type' => 'Petrol',
        'drivetrain' => 'FWD',
        'status' => 'Used',
       ],
      [
        'make' => 'Ford',
        'model' => 'Mustang',
        'year' => 2021,
        'price' => 35000,
        'currency' => 'USD',
        'description' => 'Iconic sports car with powerful V8 engine and low mileage.',
        'images' => [
            'ford_mustang_1.jpg',
            'ford_mustang_2.jpg',
            'ford_mustang_3.jpg',
        ],
        'price_breakdown' => [
            'base_price' => 33000,
            'taxes' => 1500,
            'registration' => 500,
        ],
        'extra_specs' => [
            'Leather Seats',
            'Navigation System',
            'Bluetooth',
            'Backup Camera',
        ],
        'currency_symbol' => '$',
        'mileage' => 5000,
        'color' => 'Red',
        'transmission' => 'Automatic',
        'fuel_type' => 'Petrol',
        'drivetrain' => 'RWD',
        'status' => 'Used',
      ],
];

    public $reccomendation;
        // protected $listeners = ['hydrate' => 'createList'];

    //     public function recommend()
    // {
    //     [$column, $identifier] = $this->resolveViewerIdentity();

    //     $viewedVehicleIds = DB::table('vehicle_views')
    //         ->where($column, $identifier)
    //         ->latest()
    //         ->pluck('vehicle_id');

    //     if ($viewedVehicleIds->isEmpty()) {
    //         return $this->fallbackRecommendations();
    //     }

    //     $baseVehicles = Vehicle::whereIn('id', $viewedVehicleIds)->get();
    //     Log::info($viewedVehicleIds);

    //     if ($baseVehicles->isEmpty()) {
    //         return $this->fallbackRecommendations();
    //     }

    //     $makes = $baseVehicles->pluck('make')->unique();
    //     $models = $baseVehicles->pluck('model')->unique();

    //     return Vehicle::query()
    //         ->whereNotIn('id', $viewedVehicleIds)
    //         ->where(function ($query) use ($makes, $models) {
    //             $query->whereIn('model', $models)
    //                 ->orWhereIn('make', $makes);
    //         })
    //         ->get()
    //         ->toArray();
    // }

    // protected function resolveViewerIdentity(): array
    // {
    //     if (Auth::check()) {
    //         return ['user_id', Auth::id()];
    //     }

    //     return ['guest_id', session()->getId()];
    // }

    // protected function fallbackRecommendations()
    // {
    //     return Vehicle::latest()
    //         ->limit(40)
    //         ->get()
    //         ->toArray();
    // }


    // public function createList()
    // {
    //     $this->reccomendation = $this->vehicles;
    // }

    // public function mount(){
    //     $this->reccomendation = $this->fallbackRecommendations();
    // }

    public function render()
    {
        $this-> reccomendation  = $this->vehicles;
        return view('livewire.recomendation');
    }
}
