<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {

        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true) // Update the slug when the user clicks away
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->disabled() // Keep it disabled so users don't break the URL
                    ->dehydrated() // Ensure it still gets saved to the database
                    ->required()
                    ->unique(Category::class, ignoreRecord: true),
            ]);
    }
}
