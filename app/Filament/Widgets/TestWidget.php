<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Forms\Components\Builder;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class TestWidget extends BaseWidget
{

    use InteractsWithPageFilters;
    protected function getStats(): array
    {

        $startDate = $this->filters['startDate'];
        $endDate = $this->filters['endDate'];

        return [
            Stat::make(
                "New User",
                User::when(
                    $startDate,
                    fn($query) => $query->whereDate('created_at', '>', $startDate)
                )
                    ->when(
                        $endDate,
                        fn($query) => $query->whereDate('created_at', '<', $endDate)
                    )
                    ->count()
            )
                ->description('New user that have joined')
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->chart([1, 2, 5, 7, 10, 20, 40])
                ->color('success')
        ];
    }
}
