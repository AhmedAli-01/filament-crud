<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;


class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Task Managment')
                    ->tabs([
                        // TAB 1: General Information
                        Tabs\Tab::make('General Information')
                            ->icon('heroicon-o-information-circle')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->placeholder('What need to be done?'),
                                Select::make('project_id')
                                    ->relationship('project', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    // This is the "Quick Create" trick I mentioned!
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->required()
                                            ->placeholder('New Project Name'),
                                    ]),
                            ]),

                        // TAB 2: Details
                        Tabs\Tab::make('Description')
                            ->icon('heroicon-o-pencil-square')
                            ->schema([
                                MarkdownEditor::make('description')
                                    ->columnSpanFull()
                                    ->placeholder('Use **bold** or _italic_...')
                                    ->minHeight('250px'),
                            ]),

                        // TAB 3: Status & Priority
                        Tabs\Tab::make('Settings')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'todo' => 'To Do',
                                        'in_progress' => 'In Progress',
                                        'done' => 'Completed',
                                    ])->default('todo'),
                                Select::make('priority')
                                    ->options([
                                        'low' => 'Low',
                                        'medium' => 'Medium',
                                        'high' => 'High',
                                    ])->default('medium'),
                            ]),
                    ])->columnSpanFull(),









            ]);
    }
}
