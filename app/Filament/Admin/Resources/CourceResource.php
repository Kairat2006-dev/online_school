<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CourceResource\Pages;
use App\Filament\Admin\Resources\CourceResource\RelationManagers;
use App\Filament\Admin\Resources\ProfileResource\RelationManagers\CourcesRelationManager;
use App\Models\Cource;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;

class CourceResource extends Resource
{
    protected static ?string $model = Cource::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->sortable(),
                Tables\Columns\TextColumn::make('profile.name')
                ->label('Author'),
                Tables\Columns\TextColumn::make('sodercource.type')
                    ->label('Soder')
                    ->action(function ($record) {
                        if (!$record->sodercource || !$record->sodercource->type) {
                            Notification::make()
                                ->title('Файл не найден')
                                ->danger()
                                ->send();
                            return;
                        }
                        $path = $record->sodercource->type;
                        if (Storage::disk('public')->exists($path)) {
                            $fullPath = Storage::disk('public')->download($path);

                            return $fullPath;
                        }
                        return back()->with('error', 'Файл не найден');
                    })
                    ->icon('heroicon-o-document')
                    ->color('primary'),


                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),


            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCources::route('/'),
            'create' => Pages\CreateCource::route('/create'),
            'view' => Pages\ViewCource::route('/{record}'),
            'edit' => Pages\EditCource::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
