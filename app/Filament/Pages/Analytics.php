<?php

// namespace App\Filament\Pages;

// use App\Livewire\CarAnalytics;
// use App\PerformanceList;
// use BackedEnum;
// use Filament\Facades\Filament;
// use Filament\Pages\Page;
// use Filament\Support\Facades\FilamentIcon;
// use Filament\Support\Icons\Heroicon;
// use Filament\View\PanelsIconAlias;
// use Illuminate\Contracts\Support\Htmlable;

// class Analytics extends Page
// {
//     public $product = [
//         'bestPerforming' => [],
//         'worstPerforming' => [],
//     ];

//     public static function getNavigationIcon(): string|BackedEnum|Htmlable|null
//     {
//         return static::$navigationIcon
//             ?? FilamentIcon::resolve(PanelsIconAlias::PAGES_DASHBOARD_NAVIGATION_ITEM)
//             ?? (Filament::hasTopNavigation() ? Heroicon::OutlinedArrowTrendingUp : Heroicon::OutlinedArrowTrendingUp);
//     }

//     protected function getHeaderWidgets(): array
//     {
//         return [
//             // CarAnalytics::class,
//             // You can add more widgets here if needed
//         ];
//     }

//     protected string $view = 'volt-livewire::filament.pages.analytics';

//     public function mount()
//     {
//         $this->product['bestPerforming'] = PerformanceList::bestPerformingList();
//         $this->product['worstPerforming'] = PerformanceList::getItemsOlderThanTwoMonths();
//     }
// }
