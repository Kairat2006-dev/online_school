<?php

namespace App\Filament\Admin\Resources\CourceResource\Pages;

use App\Filament\Admin\Resources\CourceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCource extends EditRecord
{
    protected static string $resource = CourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
