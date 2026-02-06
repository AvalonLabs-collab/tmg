<?php

namespace App\Listeners;

use App\Events\UpdateVehicleSoldAt;
use App\Jobs\ProcessVehicleSoldAt;

class UpdateVehicleSoldAtListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdateVehicleSoldAt $event): void
    {
        $vehicle = $event->vehicle;
        ProcessVehicleSoldAt::dispatch($vehicle);

    }
}
