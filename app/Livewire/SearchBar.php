<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBar extends Component
{
    use WithPagination;

    // protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatedSearch($value)
    {
        sleep(1);
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'livewire.custompaginatorview';
    }

    public function render()
    {
        $vehicles = Vehicle::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('make', 'like', "%{$this->search}%")
                        ->orWhere('model', 'like', "%{$this->search}%")
                        ->orWhere('description', 'like', "%{$this->search}%")
                        ->orWhere('year', 'like', "%{$this->search}%");
                });
            })
            ->paginate(20);

        return view('livewire.search-bar', [
            'vehicles' => $vehicles,
        ]);

    }
}
