<?php

namespace App\Filament\Widgets;

use App\Models\InterestClient;
use App\Models\Vehicle;
use App\VehicleStatus;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SecondStatsOverview extends StatsOverviewWidget
{
    public function carsAvailable()
    {
        $count = Vehicle::where('status', VehicleStatus::AVAILABLE)->count();

        return $count;
    }

    public function carsReserved()
    {
        $count = Vehicle::where('status', VehicleStatus::RESERVED)->count();

        return $count;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Cars available', $this->carsAvailable()),
            Stat::make('Cars reserved', $this->carsReserved()),
            Stat::make('Interested Clients', InterestClient::count()),
        ];
    }
}
