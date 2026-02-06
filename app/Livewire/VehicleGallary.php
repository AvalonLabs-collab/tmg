<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class VehicleGallary extends Component
{
    public $vehicleId;

    public $vehicleImages;

    public function mount(Vehicle $vehicle)
    {
        $this->vehicleId = $vehicle->id;
    }

    public function retriveVehicle($id)
    {
        return Vehicle::where('id', $id)->first();
    }

    public function render()
    {
        $this->vehicleImages = $this->retriveVehicle($this->vehicleId)->images;
        Log::info($this->vehicleImages);

        return view('livewire.vehicle-gallary');
    }
}
