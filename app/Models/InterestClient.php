<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterestClient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'source',
        'notes',
    ];

    /**
     * Vehicles this client is interested in
     */
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'car_interested_client', 'interested_client_id', 'vehicle_id')
            ->withPivot([
                'interested_at',
            ])
            ->withTimestamps();
    }
}
