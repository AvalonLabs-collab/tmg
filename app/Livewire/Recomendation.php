<?php

namespace App\Livewire;

use App\Reccomendation as Reccomend;
use Livewire\Component;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Illuminate\Log\log;

class Recomendation extends Component
{
    public $reccomendation;
        protected $listeners = ['hydrate' => 'createList'];

        public function recommend()
    {
        [$column, $identifier] = $this->resolveViewerIdentity();

        $viewedVehicleIds = DB::table('vehicle_views')
            ->where($column, $identifier)
            ->latest()
            ->pluck('vehicle_id');

        if ($viewedVehicleIds->isEmpty()) {
            return $this->fallbackRecommendations();
        }

        $baseVehicles = Vehicle::whereIn('id', $viewedVehicleIds)->get();
        Log::info($viewedVehicleIds);

        if ($baseVehicles->isEmpty()) {
            return $this->fallbackRecommendations();
        }

        $makes = $baseVehicles->pluck('make')->unique();
        $models = $baseVehicles->pluck('model')->unique();

        return Vehicle::query()
            ->whereNotIn('id', $viewedVehicleIds)
            ->where(function ($query) use ($makes, $models) {
                $query->whereIn('model', $models)
                    ->orWhereIn('make', $makes);
            })
            ->get()
            ->toArray();
    }

    protected function resolveViewerIdentity(): array
    {
        if (Auth::check()) {
            return ['user_id', Auth::id()];
        }

        return ['guest_id', session()->getId()];
    }

    protected function fallbackRecommendations()
    {
        return Vehicle::latest()
            ->limit(40)
            ->get()
            ->toArray();
    }

    public function createList()
    {
        $this->reccomendation = $this->recommend();
    }

    public function render()
    {
        return view('livewire.recomendation');
    }
}
