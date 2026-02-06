<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class DetailSpecifications extends Component
{
    #[Reactive]
    public $vehicle;

    public function mount($vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function render()
    {
        return view('livewire.detail-specifications');
    }
}
