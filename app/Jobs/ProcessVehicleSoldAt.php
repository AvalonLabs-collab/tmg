<?php

namespace App\Jobs;

use App\Events\UpdateVehicleSoldAt;
use App\Models\Vehicle;
use App\VehicleStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class ProcessVehicleSoldAt implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public object $vehicle;

    public function __construct(UpdateVehicleSoldAt $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $eventRecordsForVehicle = DB::table('audits')
            ->where('auditable_type', Vehicle::class)
            ->where('auditable_id', $this->vehicle->id)
            ->where('new_values->status', VehicleStatus::SOLD->value)
            ->orderBy('created_at', 'desc')
            ->get();
        $lastRecordForVehicleWhereStatusSold = $eventRecordsForVehicle->first();
        if ($lastRecordForVehicleWhereStatusSold) {
            $soldAt = $lastRecordForVehicleWhereStatusSold->created_at;
            $this->vehicle->quietly;
        } else {

        }
    }
}

// build this after done with analytics;
