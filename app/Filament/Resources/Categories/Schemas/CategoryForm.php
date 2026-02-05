<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Utilities\Set;


class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {

        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true) // Update the slug when the user clicks away
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        // We use the full path above to satisfy the IDE
                        $set('slug', Str::slug($state));
                        $set('name', Str::title($state));
                    }),

                TextInput::make('description')
                    ->live(onBlur: true),

                TextInput::make('slug')
                    ->disabled() // Keep it disabled so users don't break the URL
                    ->dehydrated() // Ensure it still gets saved to the database
                    ->required()
                    ->unique(Category::class, ignoreRecord: true)
                    ->helperText('Automatically generated from the name.'),
            ]);
    }
}
