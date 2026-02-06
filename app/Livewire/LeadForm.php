<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class LeadForm extends Component
{
    public $vehicle;

    public function mount(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function render()
    {
        return view('livewire.lead-form');
    }
}
