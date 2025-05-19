<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\ExInClude;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ExInCludeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ExInCludeResource\RelationManagers;

class ExInCludeResource extends Resource
{
    protected static ?string $model = ExInClude::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            TextInput::make('name')
                ->required()
                ->label('Name (FR)'),

            TextInput::make('en_name')
                ->required()
                ->label('Name (EN)'),

            TextInput::make('es_name')
                ->required()
                ->label('Name (ES)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->label('Name (FR)')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('en_name')
                    ->label('Name (EN)')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('es_name')
                    ->label('Name (ES)')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function ($record, $livewire) {
                        $record->delete();

                        Notification::make()
                            ->title('Exclude/Include deleted successfully!')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExInCludes::route('/'),
            'create' => Pages\CreateExInClude::route('/create'),
            'edit' => Pages\EditExInClude::route('/{record}/edit'),
        ];
    }
}
