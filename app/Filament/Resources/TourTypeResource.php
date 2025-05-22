<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\TourType;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TourTypeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TourTypeResource\RelationManagers;

class TourTypeResource extends Resource
{
    protected static ?string $model = TourType::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->label('Name (FR)')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('en_name')
                    ->label('Name (EN)')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('es_name')
                    ->label('Name (ES)')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('description')
                    ->nullable()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->label('Name (FR)')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('en_name')
                    ->label('Name (EN)')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('es_name')
                    ->label('Name (ES)')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->sortable()
                    ->limit(50)
                    ->default('No description available')
            ])
            ->filters([
                //

            ])
            ->actionsColumnLabel('Actions')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                // ->label('trash'),
                    ->action(function ($record, $livewire) {
                        $record->delete();

                        Notification::make()
                            ->title('Tour type deleted successfully!')
                            ->success()
                            ->send();
                    }),
                    // ->requiresConfirmation()
                    // ->modalHeading(__('delete_modal.heading', ['type' => __('tour_type.singular')]))
                    // ->modalSubheading(__('delete_modal.subheading'))
                    // ->modalCancelButtonLabel(__('buttons.cancel'))
                    // ->modalConfirmButtonLabel(__('buttons.confirm')),


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
            'index' => Pages\ListTourTypes::route('/'),
            'create' => Pages\CreateTourType::route('/create'),
            'edit' => Pages\EditTourType::route('/{record}/edit'),
        ];
    }
}
