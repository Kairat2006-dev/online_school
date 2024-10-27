<?php

namespace App\Filament\Admin\Resources\SoderCourceResource\Pages;

use App\Filament\Admin\Resources\SoderCourceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSoderCource extends EditRecord
{
    protected static string $resource = SoderCourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
