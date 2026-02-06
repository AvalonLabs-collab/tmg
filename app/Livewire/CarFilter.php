<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CarFilter extends Component
{
    public $carModels = [];

    public $carMakes = [];

    public $selectedMake = '';

    public $selectedModel = '';

    public $selectedCondition = '';

    public $condition = [];

    public $minPrice;

    public $maxPrice;

    public $selectedMinPrice;

    public $selectedMaxPrice;

    public $priceRange = [];

    public $minYear;

    public $maxYear;

    public $selectedMinYear;

    public $selectedMaxYear;

    public $yearRange;

    public function mount()
    {
        $this->minYear = Vehicle::select('year')->distinct()->pluck('year');
        $this->maxYear = Vehicle::select('year')->distinct()->pluck('year');
        $this->yearRange = [
            'min' => $this->minYear->min(),
            'max' => $this->maxYear->max(),
        ];
        $this->carMakes = Vehicle::select('make')->distinct()->pluck('make')->toArray();
        $this->carModels = Vehicle::select('model')->distinct()->pluck('model')->toArray();
        Log::info('THE problem:'.$this->selectedModel);
        $this->condition = Vehicle::select('condition')->distinct()->pluck('condition')->filter(function ($value) {
            return ! is_null($value);
        })->map(function ($item) {
            return $item->value;
        })->unique()->values()->toArray();
        $this->maxPrice = DB::table('vehicles')->max('price');
        $this->minPrice = DB::table('vehicles')->min('price');
        $this->selectedMinPrice = $this->minPrice;
        $this->selectedMaxPrice = $this->maxPrice;
        $this->priceRange = [
            'min' => $this->selectedMinPrice,
            'max' => $this->selectedMaxPrice,
        ];
        log::info($this->priceRange);
        log::info($this->yearRange);
        $this->dispatch('filter',
            selectedMake: $this->selectedMake,
            selectedModel: $this->selectedModel,
            selectedCondition: $this->selectedCondition,
            priceRange: $this->priceRange,
            yearRange: $this->yearRange,
        );
    }

    public function updatedSelectedMake()
    {
        if (! $this->selectedMake) {
            $this->carModels = Vehicle::select('model')->distinct()->pluck('model')->toArray();
        } else {
            Log::info('Make selected: '.$this->selectedMake);
            $this->carModels = Vehicle::where('make', $this->selectedMake)
                ->select('model')
                ->distinct()
                ->pluck('model')->toArray();
            log::info($this->carModels);
            log::info($this->selectedMake);
        }

        $this->carMakes = Vehicle::select('make')->distinct()->pluck('make')->toArray();
        $this->dispatch('filter',
            selectedMake: $this->selectedMake,
            selectedModel: $this->selectedModel,
            selectedCondition: $this->selectedCondition,
            priceRange: $this->priceRange,
            yearRange: $this->yearRange,
        );

    }

    public function updatedSelectedModel()
    {
        if (! $this->selectedMake) {
            $this->carModels = Vehicle::select('model')->distinct()->pluck('model')->toArray();
        } else {
            $this->carModels = Vehicle::where('make', $this->selectedMake)->distinct()->pluck('model')->toArray();

            Log::info('Model selected: '.$this->selectedModel);
        }

        $this->carMakes = Vehicle::select('make')->distinct()->pluck('make')->toArray();
        $this->dispatch('filter',
            selectedMake: $this->selectedMake,
            selectedModel: $this->selectedModel,
            selectedCondition: $this->selectedCondition,
            priceRange: $this->priceRange,
            yearRange: $this->yearRange,
        );
        Log::info('Model selected: '.$this->selectedModel);

    }

    public function updateFrontend()
    {
        $this->updatedSelectedMake();
        $this->updatedSelectedModel();
    }

    public function updatedSelectedCondition()
    {
        // $this->updateFrontend();
        $this->dispatch('filter',
            selectedMake: $this->selectedMake,
            selectedModel: $this->selectedModel,
            selectedCondition: $this->selectedCondition,
            priceRange: $this->priceRange,
            yearRange: $this->yearRange,
        );
        log::info($this->selectedCondition);
    }

    public function updateTheRange()
    {
        $this->priceRange = [
            'min' => $this->selectedMinPrice,
            'max' => $this->selectedMaxPrice,
        ];
        $this->dispatch('filter',
            selectedMake: $this->selectedMake,
            selectedModel: $this->selectedModel,
            selectedCondition: $this->selectedCondition,
            priceRange: $this->priceRange,
            yearRange: $this->yearRange,
        );

        log::info($this->priceRange);
    }

    public function updatedSelectedMinPrice()
    {
        $this->updateTheRange();
    }

    public function updatedSelectedMaxPrice()
    {
        $this->updateTheRange();
    }

    public function updateYearRange()
    {
        $this->yearRange = [
            'min' => $this->selectedMinYear,
            'max' => $this->selectedMaxYear,
        ];
        $this->dispatch('filter',
            selectedMake: $this->selectedMake,
            selectedModel: $this->selectedModel,
            selectedCondition: $this->selectedCondition,
            priceRange: $this->priceRange,
            yearRange: $this->yearRange,
        );

    }

    public function updatedSelectedMaxYear()
    {
        $this->updateYearRange();
    }

    public function updatedSelectedMinYear()
    {
        $this->updateYearRange();
    }

    public function render()
    {
        return view('livewire.car-filter');
    }
}
