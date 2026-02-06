<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class DefaultNonFilteredContent extends Component
{
    public $totalVehicles;

    public $customersServed;

    public function mount()
    {
        $this->totalVehicles = Vehicle::count();
        $this->customersServed = Vehicle::where('status', 'sold')->count();
    }

    public function render()
    {
        return view('livewire.default-non-filtered-content');
    }
}
