<?php

namespace App\Models;

use App\VehicleCondition;
use App\VehicleFuelType;
use App\VehicleStatus;
use App\VehicleTransmision;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model implements \OwenIt\Auditing\Contracts\Auditable
{
    use HasFactory , \OwenIt\Auditing\Auditable , SoftDeletes;

    protected $fillable = [
        'make',
        'model',
        'year',
        'import_origin',
        'price',
        'price_negociable',
        'price_breakdown',
        'status',
        'mileage',
        'condition',
        'transmission',
        'fuel_type',
        'engine_type',
        'engine_capacity',
        'extra_specs',
        'images',
        'description',
        'is_featured',
        'published_at',
        'created_by',
        'updated_by',
        'currency',
    ];

    protected $casts = [
        'status' => VehicleStatus::class,
        'condition' => VehicleCondition::class,
        'transmission' => VehicleTransmision::class,
        'fuel_type' => VehicleFuelType::class,
        'other_specs' => 'array',
        'price_breakdown' => 'array',
        'images' => 'array',
        'published_at' => 'datetime',
        'price_negociable' => 'boolean',
        'is_featured' => 'boolean',
        'created_at' => 'datetime',
        'other_specs' => 'array',
        'extra_specs' => 'array',
    ];

    public function InterestedClients()
    {
        return $this->belongsToMany(InterestClient::class, 'car_interested_client', 'vehicle_id', 'interested_client_id')
            ->withPivot([
                'interested_at',
            ])
            ->withTimestamps();
    }
}
