<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class AddToVehicleViews implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $identifier, public $vehicleIdentifier, public $auth = false)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->auth) {
            DB::table('vehicle_views')->insert([
                'user_id' => $this->identifier,
                'vehicle_id' => $this->vehicleIdentifier,
            ]);
        } else {
            DB::table('vehicle_views')->insert([
                'guest_id' => $this->identifier,
                'vehicle_id' => $this->vehicleIdentifier,
            ]);
        }

    }
}
