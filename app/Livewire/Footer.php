<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class Footer extends Component
{
    public $company;

    public function mount()
    {
        $this->company = Company::find(1);
    }

    public function render()
    {
        return view('livewire.footer');
    }
}
