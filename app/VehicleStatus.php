<?php

namespace App;

use Filament\Support\Contracts\HasColor;

enum VehicleStatus: string implements HasColor
{
    case AVAILABLE = 'available';
    case RESERVED = 'reserved';
    case SOLD = 'sold';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::AVAILABLE => 'gray',
            self::RESERVED => 'warning',
            self::SOLD => 'success',
        };
    }
}
