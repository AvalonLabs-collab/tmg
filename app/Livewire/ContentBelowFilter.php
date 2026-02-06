<?php

namespace App\Livewire;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class ContentBelowFilter extends Component
{
    public $priceRange;

    public $yearRange;

    public $model;

    public $make;

    public $condition;

    public $priceFilter;

    public $vehicleData;

    #[On('filter')]
    public function filter($selectedMake, $selectedModel, $yearRange, $priceRange, $selectedCondition)
    {
        $this->setState($selectedMake, $selectedModel, $yearRange, $priceRange, $selectedCondition);
        Log::info('event data');
    }

    public function rangeState()
    {
        return [Vehicle::select('price')->distinct()->pluck('price')->min(), Vehicle::select('price')->distinct()->pluck('price')->max()];
    }

    public function compareRangeAgainstDb($priceRange)
    {
        if ($this->rangeState()[0] !== $priceRange['min'] || $this->rangeState()[1] !== $priceRange['max']) {
            return true;
        } else {
            return false;
        }
    }

    public function setState($selectedMake, $selectedModel, $yearRange, $priceRange, $selectedCondition)
    {
        $this->priceFilter = $this->compareRangeAgainstDb($priceRange);
        $this->priceRange = $priceRange;
        $this->yearRange = $yearRange;
        $this->model = $selectedModel;
        $this->make = $selectedMake;
        $this->condition = $selectedCondition;
        $this->vehicleData = $this->getVehicles();
    }

    public function getVehicles()
    {
        $vehicles = Vehicle::query()
            ->when($this->make, function ($query) {
                $query->where('make', $this->make);
            })
            ->when($this->model, function ($query) {
                $query->where('model', $this->model);
            })
            ->when($this->condition, function ($query) {
                $query->where('condition', $this->condition);
            })
            ->whereBetween('price', [$this->priceRange['min'], $this->priceRange['max']])
            ->whereBetween('year', [$this->yearRange['min'], $this->yearRange['max']])
            ->get();
        log::info($vehicles);

        return $vehicles;
    }

    public function render()
    {
        return view('livewire.content-below-filter');
    }
}
