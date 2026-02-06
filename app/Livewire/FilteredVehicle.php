<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class FilteredVehicle extends Component
{
    #[Reactive]
    public $vehicleData = [];

    // public function mount($vehicleData)
    // {
    //     $this->vehicleData = $vehicleData;
    // }

    public function render()
    {
        log::info($this->vehicleData);

        return view('livewire.filtered-vehicle');
    }
}
