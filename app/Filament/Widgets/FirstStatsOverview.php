<?php

namespace App\Filament\Widgets;

use App\Models\Vehicle;
use App\VehicleStatus;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FirstStatsOverview extends StatsOverviewWidget
{
    public static function computeVehicleSellingAverage()
    {
        $vehicles = Vehicle::where('status', VehicleStatus::SOLD->value)->get();
        $vehicleDays = $vehicles->map(function ($vehicle) {
            $eventRecordsForVehicle = DB::table('audits')
                ->where('auditable_type', Vehicle::class)
                ->where('auditable_id', $vehicle->id)
                ->where('new_values->status', VehicleStatus::SOLD->value)
                ->orderBy('created_at', 'desc')
                ->get();
            $lastRecordForVehicleWhereStatusSold = $eventRecordsForVehicle->first();
            if ($lastRecordForVehicleWhereStatusSold) {
                $soldAt = $lastRecordForVehicleWhereStatusSold->created_at;

                return $vehicle->created_at->diffInDays(Carbon::parse($soldAt));
            } else {
                return null;
            }
            Log::info('sold at '.$vehicle->sold_last_at.' created at '.$vehicle->created_at);
        })->filter();
        $averageDaysToSell = $vehicleDays->avg();

        return round($averageDaysToSell);
    }

    // for now lets build this to work in just one currency
    public static function currency()
    {
        return '₦';
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Cars Sold', Vehicle::where('status', VehicleStatus::SOLD->value)->count()),
            Stat::make('Revenue', self::currency().number_format(Vehicle::where('status', VehicleStatus::SOLD->value)->sum('price'))),
            Stat::make('Average days to sell', self::computeVehicleSellingAverage().' days'),

        ];
    }
}
