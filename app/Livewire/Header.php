<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class Header extends Component
{
    public $headerInfo;

    public function mount()
    {
        $this->headerInfo = Company::find(1);
    }

    public function render()
    {
        return view('livewire.header');
    }
}
