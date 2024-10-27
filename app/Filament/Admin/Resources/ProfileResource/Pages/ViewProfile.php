<?php

namespace App\Filament\Admin\Resources\ProfileResource\Pages;

use App\Filament\Admin\Resources\ProfileResource;
use Filament\Actions;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Storage;

class ViewProfile extends ViewRecord
{
    protected static string $resource = ProfileResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make('Personal Infomations')
                ->schema([
                    ImageEntry::make('avatar')
                        ->disk('public')
                        ->visible(fn($record) => $record && $record->avatar)
                        ->url(fn ($record) => $record && $record->avatar
                            ? Storage::disk('public')->url( $record->avatar)
                            : null),


                    TextEntry::make('name'),
                ]),
            Section::make('Contact Infomations')
            ->schema([
                TextEntry::make('email'),
                TextEntry::make('phone'),
            ]),

        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
