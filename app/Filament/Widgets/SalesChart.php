<?php

namespace App\Filament\Widgets;

use App\Models\Vehicle;
use Filament\Widgets\ChartWidget;

class SalesChart extends ChartWidget
{
    protected ?string $heading = 'Sales Chart';

    protected int|string|array $columnSpan = 'full';

    // get beck to understand sql clauses
    // protected function testData(){
    //     return  Vehicle::where('status', 'sold')
    //            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
    //             ->get();
    // }
    protected function getData(): array
    {
        $data = Vehicle::where('status', 'sold')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->pluck('total', 'date');

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $data->values(),
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
