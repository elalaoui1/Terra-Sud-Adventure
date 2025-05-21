<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TourRequest;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TourRequestResource\Pages;
use App\Filament\Resources\TourRequestResource\RelationManagers;

class TourRequestResource extends Resource
{
    protected static ?string $model = TourRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //



                    TextColumn::make('name')
                        ->searchable()
                        ->sortable(),
                    TextColumn::make('email'),
                    TextColumn::make('phone'),
                    TextColumn::make('type')
                        ->badge()
                        ->formatStateUsing(fn ($state) => ucfirst($state)) // Optional: Capitalize
                        ->color(fn ($state) => match ($state) {
                            'custom' => 'info', // You can use Filament's built-in colors like 'warning', 'success', 'danger', etc.
                            'public' => 'warning',
                        }),

                    TextColumn::make('adult_people')
                        ->label('Adults'),
                    TextColumn::make('kids_people')
                        ->label('Kids'),

                    TextColumn::make('date_from')
                        ->date()
                        ->label('Date From')
                        ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('Y-m-d') : '-'),
                    TextColumn::make('date_to')
                        ->date()
                        ->label('Date To')
                        ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('Y-m-d') : '-'),
                    // Tour image (clickable)
                    ImageColumn::make('tour.main_image')
                        ->label('Tour Image')
                        ->height(50)
                        ->width(70)
                        ->placeholder('________')
                        ->extraImgAttributes(['style' => 'object-fit: cover; border-radius: 10px;']),

                    // Tour name (clickable text)
                    TextColumn::make('tour.name')
                        ->label('Tour Name')
                        // ->formatStateUsing(fn ($state) => $state ?? '-')
                        ->placeholder('________')
                        ->limit(35)
                        ->searchable(),

                    TextColumn::make('from_city')
                        ->label('From City')
                        // ->formatStateUsing(fn ($state) => $state ?: '-')
                        ->placeholder('________'),
                    TextColumn::make('to_city')
                        ->label('To City')
                        // ->formatStateUsing(fn ($state) => $state ?: '-')
                        ->placeholder('________'),
                    TextColumn::make('country')
                        ->label('Client Country')
                        // ->formatStateUsing(fn ($state) => $state ?: '-')
                        ->placeholder('________'),

                    SelectColumn::make('status')
                        ->label('Status')
                        ->options([
                            'pending' => 'Pending',
                            'approved' => 'Approved',
                            'done' => 'Done',
                            'cancelled' => 'Cancelled',
                        ])
                        ->sortable()
                        ->searchable()
                        ->disablePlaceholderSelection(),
                    // SelectColumn::make('status')
                    //     ->label('Status')
                    //     ->options([
                    //         'pending' => 'Pending',
                    //         'approved' => 'Approved',
                    //         'done' => 'Done',
                    //         'cancelled' => 'Cancelled',
                    //     ])
                    //     ->disablePlaceholderSelection()
                    //     ->beforeStateUpdated(function ($state, $record, $livewire, $set) {
                    //         // Save current and new status in JS
                    //         $livewire->dispatchBrowserEvent('confirm-status-update', [
                    //             'newStatus' => $state,
                    //             'recordId' => $record->id,
                    //             'currentStatus' => $record->status,
                    //         ]);

                    //         // Block the change until confirmation
                    //         return false;
                    //     }),
                    SelectColumn::make('payment_status')
                        ->label('Payment Status')
                        ->options([
                            'unpaid' => 'Unpaid',
                            'paid' => 'Paid',
                        ])
                        ->sortable()
                        ->searchable()
                        ->disablePlaceholderSelection(),
                    TextColumn::make('created_at')
                        ->date()
                        ->label('Submitted At')
                        ->sortable(),
            ])
            ->filters([
                //
                 SelectFilter::make('type')
                    ->label('Type')
                    ->options([
                        'public' => 'Public',
                        'custom' => 'Custom',
                    ])
                    ->placeholder('All'),
                SelectFilter::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'unpaid' => 'Unpaid',
                        'paid' => 'Paid',
                    ])
                    ->placeholder('All'),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'done' => 'Done',
                        'cancelled' => 'Cancelled',
                    ])
                    ->placeholder('All'),
                        ])
            ->actions([
                    // Tables\Actions\Action::make('changeStatus')
                    //     ->label('Change Status')
                    //     ->icon('heroicon-o-arrow-path')
                    //     ->form([
                    //         Forms\Components\Select::make('status')
                    //             ->label('New Status')
                    //             ->options([
                    //                 'pending' => 'Pending',
                    //                 'approved' => 'Approved',
                    //                 'done' => 'Done',
                    //                 'cancelled' => 'Cancelled',
                    //             ])
                    //             ->required(),
                    //     ])
                    //     ->action(function ($record, array $data) {
                    //         $record->status = $data['status'];
                    //         $record->save();
                    //     })
                    //     ->requiresConfirmation()
                    //     ->modalHeading('Change Status')
                    //     ->modalSubmitActionLabel('Confirm')
                    //     ->color('warning'),
                // Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Request Preview')
                    ->modalSubheading(fn ($record) => $record->name)
                    ->modalContent(fn ($record) => view('filament.tours.preview', ['tour' => $record]))
                    ->action(fn () => null)
                    ->modalSubmitAction(false) // Disable the "Confirm" button
                    ->modalCancelActionLabel('Close')
                    ->button()
                    ->color('primary'),

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
            'index' => Pages\ListTourRequests::route('/'),
            // 'create' => Pages\CreateTourRequest::route('/create'),
            // 'edit' => Pages\EditTourRequest::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
{
    return false;
}
}
