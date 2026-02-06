<?php

namespace App\Http\Controllers;

use App\Jobs\AddToVehicleViews;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{
    public function detail(Vehicle $vehicle)
    {

        $isAuthenticated = Auth::check();
        $authId = Auth::id();
        $sessionId = session()->getId();
        if ($isAuthenticated) {
            AddToVehicleViews::dispatch($authId, $vehicle->id, $auth = true);
        } else {
            AddToVehicleViews::dispatch($sessionId, $vehicle->id);
        }
        // Log::info('vehicle viewed:' , $vehicle->extra_specs );

        return view('detail', [
            'vehicle' => $vehicle,
        ]);
    }

    public function search()
    {
        return view('search');
    }
}
