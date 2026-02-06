<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use App\VehicleCondition;
use App\VehicleFuelType;
use App\VehicleStatus;
use App\VehicleTransmision;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class VehicleForm
{
    public static function vehicleFuelOptions()
    {
        return [
            VehicleFuelType::PETROL->value => 'Petrol',
            VehicleFuelType::DIESEL->value => 'Diesel',
            VehicleFuelType::ELECTRIC->value => 'Electric',
            VehicleFuelType::HYBRID->value => 'Hybrid',
        ];
    }

    public static function vehicleTransmisionOptions()
    {
        return [
            VehicleTransmision::AUTOMATIC->value => 'Automatic',
            VehicleTransmision::MANUAL->value => 'Manual',
        ];
    }

    public static function vehicleConditionOptions()
    {
        return [
            VehicleCondition::NEW->value => 'New',
            VehicleCondition::USED->value => 'Used',
            VehicleCondition::FOREIGN_USED->value => 'Foreign Used',
        ];
    }

    public static function vehicleStatusOptions()
    {
        return [
            VehicleStatus::AVAILABLE->value => 'Available',
            VehicleStatus::RESERVED->value => 'Reserved',
            VehicleStatus::SOLD->value => 'Sold',
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('make'),
                TextInput::make('model'),
                Select::make('year')
                    ->options(array_combine(range(date('Y'), 1950), range(date('Y'), 1950))),
                KeyValue::make('other_specs')
                    ->columnSpanFull()
                    ->reorderable(),
                Repeater::make('extra_specs')
                    ->schema([
                        TextInput::make('extra_specs'),
                    ])
                    ->columnSpanFull(),
                TextInput::make('import_origin'),
                Toggle::make('price_negociable')
                    ->default(false),
                KeyValue::make('price_breakdown')
                    ->columnSpanFull()
                    ->reorderable(),
                Grid::make(3)
                    ->schema([
                        Select::make('currency')
                            ->options(config('supportedListingCurrencies'))
                            ->default('NGN'),
                        TextInput::make('price')
                            ->numeric()
                            ->columnSpan(2),
                    ]),
                Select::make('status')
                    ->required()
                    ->default('available')
                    ->options(self::vehicleStatusOptions()),
                TextInput::make('mileage')
                    ->numeric(),
                Select::make('condition')
                    ->options(self::vehicleConditionOptions()),
                Select::make('transmission')
                    ->options(self::vehicleTransmisionOptions()),
                Select::make('fuel_type')
                    ->options(self::vehicleFuelOptions()),
                TextInput::make('engine'),
                FileUpload::make('images')
                    ->multiple()
                    ->image()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->default('vehicle description here...')
                    ->columnSpanFull(),
                Toggle::make('is_featured')
                    ->default(false),
            ]);
    }
}
