<?php
namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class VehicleGallary extends Component
{
    public $vehicle;
    public $vehicleImages = [];

    public function mount($vehicle)
    {
        $this->vehicle = Vehicle::find($vehicle->id);
        $this->vehicleImages = $this->vehicle->images ?? [];
        Log::info('VehicleGallary mounted with vehicle ID: '.$vehicle->id);
                Log::info('VehicleGallary mounted with vehicles: '.$this->vehicleImages);
    }

    public function render()
    {
        return view('livewire.vehicle-gallary');
    }
}
