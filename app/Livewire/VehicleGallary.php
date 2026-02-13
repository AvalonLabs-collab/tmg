<?php
namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class VehicleGallary extends Component
{
    public $vehicle;
    public $vehicleImages = [];

    public function mount(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->vehicleImages = $vehicle->images ?? [];
    }

    public function render()
    {
        return view('livewire.vehicle-gallary');
    }
}
