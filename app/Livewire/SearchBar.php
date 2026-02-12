<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithPagination;

class SearchBar extends Component
{
    use WithPagination;

    protected $queryString = ['search'];

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'livewire.custompaginatorview';
    }

    public function render()
    {
        $search = $this->search;
        $vehicles = [];

        // $vehicles = Vehicle::query()
        //     ->when($search, function ($query) use ($search) {
        //         $query->where(function ($q) use ($search) {
        //             $q->where('make', 'like', "%{$search}%")
        //               ->orWhere('model', 'like', "%{$search}%")
        //               ->orWhere('description', 'like', "%{$search}%")
        //               ->orWhere('year', 'like', "%{$search}%");
        //         });
        //     })
        //     ->paginate(20);

        return view('livewire.search-bar', compact('vehicles'));
    }
}
