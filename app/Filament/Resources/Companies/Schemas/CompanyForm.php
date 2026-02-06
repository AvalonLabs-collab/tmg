<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->columnSpanFull(),
                Repeater::make('about_us.sections')
                    // ->label('about us Page Sections')
                    ->schema([
                        TextInput::make('brand')
                            ->label('Brand (optional)'),

                        TextInput::make('title')
                            ->required(),

                        Textarea::make('text')
                            ->rows(4)
                            ->required(),
                    ])
                    ->collapsible(),

                Textarea::make('about_us.why_choose_us.text')
                 ->label('why choose us')
                    ->rows(4),

                Repeater::make('about_us.why_choose_us.points')
                    ->schema([
                        TextInput::make('value')->label('why choose us bullet points'),
                    ]),

                TextInput::make('address'),
                TextInput::make('phone')
                    ->tel(),
                Repeater::make('branches')
                    ->schema([
                        TextInput::make('branches'),
                    ])
                    ->columnSpanFull(),
                KeyValue::make('social_handles')
                    ->columnSpanFull()
                    ->reorderable(),
                KeyValue::make('service_ensurance')
                    ->columnSpanFull()
                    ->reorderable(),
            ]);
    }
}
