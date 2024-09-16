<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Forms\Components\Builder;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

// use Filament\Resources\Pages\ListRecords\Tab;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'Published' => Tab::make()->modifyQueryUsing(function (EloquentBuilder $query) {
                $query->where('published', true);
            }),
            'Unpublished' => Tab::make()->modifyQueryUsing(function (EloquentBuilder $query) {
                $query->where('published', false);
            }),
        ];
    }
}
