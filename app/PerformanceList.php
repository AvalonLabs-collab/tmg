<?php

namespace App;

use App\Models\Vehicle;
use Carbon\Carbon;

class PerformanceList
{
    public static function bestPerformingList()
    {
        $allSoldVehicles = Vehicle::where('status', VehicleStatus::SOLD)->get();
        $listAssociatedWithDaysToSell = $allSoldVehicles->map(function ($vehicle) {
            $vehicle->daysToSell = $vehicle->created_at->diffInDays($vehicle->created_at);

            return $vehicle;
        });
        $correctOrder = $listAssociatedWithDaysToSell->sortBy('daysToSell');
        $topTenPerformanceVehicles = $correctOrder->take(10);

        return $topTenPerformanceVehicles;
    }

    public static function getItemsOlderThanTwoMonths()
    {
        $twoMonthsAgo = Carbon::now()->subMonths(2);

        return Vehicle::where('created_at', '<', $twoMonthsAgo)->get();
    }
}
