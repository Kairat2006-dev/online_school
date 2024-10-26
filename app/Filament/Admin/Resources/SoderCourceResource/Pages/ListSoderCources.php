<?php

namespace App\Filament\Admin\Resources\SoderCourceResource\Pages;

use App\Filament\Admin\Resources\SoderCourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoderCources extends ListRecords
{
    protected static string $resource = SoderCourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
