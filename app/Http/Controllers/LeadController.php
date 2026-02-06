<?php

namespace App\Http\Controllers;

use App\Models\lead;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'max:20'],
            'inquiry' => ['nullable', 'string'],
        ]);
        $validated['vehicle_id'] = $vehicle->id;
        lead::create($validated);
        noty()->success('Your account has been locked.');

        return back();
    }
}
