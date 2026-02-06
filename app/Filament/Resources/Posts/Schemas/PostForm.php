<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post Content')
                    ->description('The main information for your blog post.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required(),
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required(),

                            ]),
                        RichEditor::make('content')
                            ->columnSpanFull()
                            ->extraInputAttributes([
                                'style' => 'min-height: 200px;',
                            ]),
                        Grid::make(2)
                            ->schema([
                                Toggle::make('is_published')
                                    ->columnSpan(1)
                                    ->label('Visible to public')
                                    ->onColor('success')
                                    ->offColor('danger')
                                    ->inline(false),
                                DatePicker::make('published_at')
                                    ->columnSpan(1)
                                    ->label('Published At')
                                    ->native(false)
                                    ->displayFormat('d/m/Y'),
                            ]),
                    ])->collapsible(true),
            ]);
    }
}
