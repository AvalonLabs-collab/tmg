<?php
namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class VehicleGallary extends Component
{
    public $vehicle;
    public $vehicleImages = [];

    public function mount(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->vehicleImages = $vehicle->images ?? [];
        Log::info('VehicleGallary mounted with vehicle ID: '.$vehicle->id);
    }

    public function render()
    {
        return view('livewire.vehicle-gallary');
    }
}
