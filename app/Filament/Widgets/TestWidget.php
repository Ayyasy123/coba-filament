<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TestWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("New User", User::count())
                ->description('New user that have joined')
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->chart([1, 2, 5, 7, 10, 20, 40])
                ->color('success')
        ];
    }
}
