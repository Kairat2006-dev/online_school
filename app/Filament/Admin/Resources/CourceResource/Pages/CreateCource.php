<?php

namespace App\Filament\Admin\Resources\CourceResource\Pages;

use App\Filament\Admin\Resources\CourceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCource extends CreateRecord
{
    protected static string $resource = CourceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['profile_id'] = auth()->user()->profile->id;
        return $data;
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
