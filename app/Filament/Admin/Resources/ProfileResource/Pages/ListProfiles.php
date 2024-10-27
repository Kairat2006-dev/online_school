<?php

namespace App\Filament\Admin\Resources\ProfileResource\Pages;

use App\Filament\Admin\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

    public function getTabs(): array
    {
        return [
            'all'=>Tab::make('All Profiles'),
            'alphabet'=>Tab::make('Alphabet')->modifyQueryUsing(fn (Builder $query)=>$query->orderBy('name','asc'))
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
