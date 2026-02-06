<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use App\Models\Vehicle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;

class VehicleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('make')
                    ->weight(FontWeight::ExtraBold),
                TextEntry::make('model')
                    ->weight(FontWeight::ExtraBold),
                TextEntry::make('year')
                    ->placeholder('2005')
                    ->weight(FontWeight::Medium),
                KeyValueEntry::make('other_specs')
                    ->columnSpanFull(),
                TextEntry::make('import_origin')
                    ->placeholder('-'),
                IconEntry::make('price_negociable')
                    ->boolean(),
                KeyValueEntry::make('price_breakdown')
                    ->columnSpanFull(),

                TextEntry::make('price')
                    ->money(currency: function ($record) {
                        return $record->currency;
                    }),

                TextEntry::make('status')
                    ->badge()
                    ->color(fn ($state) => $state->getColor()),
                TextEntry::make('mileage')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('condition')
                    ->placeholder('-'),
                TextEntry::make('transmission')
                    ->placeholder('-'),
                TextEntry::make('fuel_type')
                    ->placeholder('-'),
                TextEntry::make('engine')
                    ->placeholder('-'),
                ImageEntry::make('images')
                    ->visibility('public')
                    ->imageSize(250)
                    ->stacked()
                    ->columnSpanFull(),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('is_featured')
                    ->boolean(),
                TextEntry::make('published_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Vehicle $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
