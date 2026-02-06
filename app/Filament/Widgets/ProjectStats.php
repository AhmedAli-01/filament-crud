<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
                ->description('All active categories')
                ->descriptionIcon('heroicon-m-folder')
                ->color('info'),

            Stat::make('Pending Tasks', Task::where('status', '!=', 'done')->count())
                ->description('Work left to do')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Completed Tasks', Task::where('status', 'done')->count())
                ->description('Tasks finished')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]) // This creates a little sparkline graph!
        ];
    }
}