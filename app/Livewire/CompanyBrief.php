<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class CompanyBrief extends Component
{
    public $companyBrief;

    public function mount()
    {
        $this->companyBrief = Company::find(1)?->toArray() ?? false;
    }

    public function render()
    {
        return view('livewire.company-brief');
    }
}
