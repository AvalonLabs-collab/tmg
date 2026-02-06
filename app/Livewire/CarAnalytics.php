<?php

namespace App\Livewire;

use App\Models\Vehicle;
use App\VehicleStatus;
use Filament\Widgets\Widget;
use finfo;

class CarAnalytics extends Widget
{
    public $bestPerformingList = [];

    protected int|string|array $columnSpan = 'full';

    protected string $view = 'volt-livewire::livewire.car-analytics';

    public static function test()
    {
        $file = file_get_contents(public_path('storage/01KEKFAT578Z0TNCVNKGF2STAW.png'));
        $finfo = new finfo(FILEINFO_MIME_TYPE);

        $mime_type = $finfo->buffer($file);

        $base64_image = base64_encode($file);
        $src = 'data:'.$mime_type.';base64,'.$base64_image;

        return $src;
    }

    // public function vehicles(){
    //    $vehicles = Vehicle::where('status' , VehicleStatus::AVAILABLE)->get();
    //    $this->vehicleList = $vehicles;
    // }

    public function bestPerforming()
    {
        // Get all sold vehicles
        $soldVehicles = Vehicle::where('status', VehicleStatus::SOLD)->get();
        $fastestVehicles = $soldVehicles->map(function ($vehicle) {
            $vehicle->days_to_sell = $vehicle->created_at->diffInDays($vehicle->sold_at);

            return $vehicle;
        })->sortBy('days_to_sell')
            ->take(5);

        $this->bestPerformingList = $fastestVehicles;
    }

    public function __construct()
    {
        $this->vehicles();
    }
}
