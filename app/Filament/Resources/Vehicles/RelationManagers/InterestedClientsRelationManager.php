<?php

namespace App\Filament\Resources\Vehicles\RelationManagers;

use App\Filament\Resources\Vehicles\VehicleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InterestedClientsRelationManager extends RelationManager
{
    protected static string $relationship = 'InterestedClients';

    protected static ?string $relatedResource = VehicleResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->heading('clients interested in this vehicle')
            ->columns([
                TextColumn::make('first_name'),
                TextColumn::make('phone'),
                TextColumn::make('email'),
                TextColumn::make('source'),
                TextColumn::make('notes')
                    ->limit(50),
                TextColumn::make('phone'),
            ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
