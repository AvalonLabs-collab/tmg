<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class FeaturedVehicles extends Component
{
    public $featuredVehicles;

    public function mount()
    {
        $this->featuredVehicles = Vehicle::where('is_featured', true)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.featured-vehicles');
    }
}
