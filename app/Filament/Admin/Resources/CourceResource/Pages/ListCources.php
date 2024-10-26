<?php

namespace App\Filament\Admin\Resources\CourceResource\Pages;

use App\Filament\Admin\Resources\CourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCources extends ListRecords
{
    protected static string $resource = CourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
