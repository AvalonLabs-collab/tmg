<?php

namespace App\Livewire;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Livewire\Component;

class AnalyticsList extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public $items;

    public function productInfolist(Schema $schema): Schema
    {
        return $schema
            ->state([
                'best_performing_vehicles' => $this->items['bestPerforming'],
                'worst_performing_vehicles' => $this->items['worstPerforming'],
            ])->components([
                RepeatableEntry::make('best_performing_vehicles')
                    ->label('Best Performing Vehicles')
                    ->schema([
                        ImageEntry::make('images')
                            ->alignCenter()
                            ->imageSize(300)
                            ->limit(3),
                        TextEntry::make('model'),
                        TextEntry::make('status')
                            ->badge(),
                    ]),
                RepeatableEntry::make('worst_performing_vehicles')
                    ->label('worst Performing Vehicles')
                    ->schema([
                        ImageEntry::make('images')
                            ->alignCenter()
                            ->imageSize(300)
                            ->limit(3),
                        TextEntry::make('model'),
                        TextEntry::make('status')
                            ->badge(),
                    ]),
            ]);
    }

    public function mount($items)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('livewire.analytics-list');
    }
}
