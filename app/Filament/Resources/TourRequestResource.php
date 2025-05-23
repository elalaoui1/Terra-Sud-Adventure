<?php

namespace App\Filament\Resources;

use Mail;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TourRequest;
use Filament\Resources\Resource;
use App\Mail\TourRequestCanceled;
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

    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    protected static ?int $navigationSort = 5;

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
                    TextColumn::make('email')
                        ->searchable()
                        ->sortable(),
                    TextColumn::make('phone')
                        ->searchable()
                        ->sortable(),
                    TextColumn::make('type')
                        ->badge()
                        ->searchable()
                        ->sortable()
                        ->formatStateUsing(fn ($state) => ucfirst($state)) // Optional: Capitalize
                        ->color(fn ($state) => match ($state) {
                            'custom' => 'info', // You can use Filament's built-in colors like 'warning', 'success', 'danger', etc.
                            'public' => 'warning',
                        }),

                    TextColumn::make('adult_people')
                        ->searchable()
                        ->sortable()
                        ->label('Adults'),
                    TextColumn::make('kids_people')
                        ->searchable()
                        ->sortable()
                        ->label('Kids'),

                    TextColumn::make('date_from')
                        ->date()
                        ->searchable()
                        ->sortable()
                        ->label('Date From')
                        ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('Y-m-d') : '-'),
                    TextColumn::make('date_to')
                        ->date()
                        ->searchable()
                        ->sortable()
                        ->label('Date To')
                        ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('Y-m-d') : '-'),

                   ImageColumn::make('tour.main_image')
                        ->label('Tour Image')
                        ->height(50)
                        ->width(70)
                        ->placeholder('________')
                        ->extraImgAttributes(['style' => 'object-fit: cover; border-radius: 10px;']),


                    TextColumn::make('tour.name')
                        ->label('Tour Name')
                        ->searchable()
                        ->sortable()
                        ->placeholder('________')
                        ->limit(35)
                        ->searchable(),

                    TextColumn::make('from_city')
                        ->label('From City')
                        ->searchable()
                        ->sortable()
                        ->placeholder('________'),
                    TextColumn::make('to_city')
                        ->label('To City')
                        ->searchable()
                        ->sortable()
                        ->placeholder('________'),
                    TextColumn::make('country')
                        ->label('Client Country')
                        ->searchable()
                        ->sortable()
                        ->placeholder('________'),

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
                        'done' => 'Done',
                        'cancelled' => 'Cancelled',
                    ])
                    ->placeholder('All'),
                        ])
            ->actions([
                // change the status with confirmation
                    Tables\Actions\Action::make('changeStatus')
                        ->label(fn ($record) => 'Status: ' . ucfirst($record->status))
                        ->icon('heroicon-o-arrow-path')
                        ->form([
                            Forms\Components\Select::make('status')
                                ->label('New Status')
                                ->options([
                                    'pending' => 'Pending',
                                    'done' => 'Done',
                                    'cancelled' => 'Cancelled',
                                ])
                                ->default(fn ($record) => $record->status)
                                ->required(),
                        ])
                        ->action(function ($record, array $data) {
                            $record->status = $data['status'];
                            $record->save();
                             if ($data['status'] === 'cancelled') {
                                    Mail::to($record->email)->send(new TourRequestCanceled($record));
                                }
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Change Status')
                        ->modalSubmitActionLabel('Confirm')
                        ->disabled(fn ($record) => $record->payment_status === 'paid')
                        ->color(fn ($record) => match ($record->status) {
                            'pending' => 'gray',
                            'done' => 'success',
                            'cancelled' => 'danger',
                        }),

                // change payment status with confirmation
                Tables\Actions\Action::make('payment_status')
                        ->label(fn ($record) => __('Payment: ') . ucfirst($record->payment_status))
                        ->icon('heroicon-o-arrow-path')
                        ->form([
                            Forms\Components\Select::make('payment_status')
                                ->label('Payment Status')
                                ->options([
                                    'unpaid' => 'Unpaid',
                                    'paid' => 'Paid',
                                ])
                                ->default(fn ($record) => $record->payment_status)
                                ->required(),
                        ])
                        ->action(function ($record, array $data) {
                            $record->payment_status = $data['payment_status'];
                            $record->save();
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Change Payment Status')
                        ->modalSubmitActionLabel('Confirm')
                        ->disabled(fn ($record) => $record->status !== 'done' || $record->payment_status === 'paid')
                        ->color(fn ($record) => match ($record->payment_status) {
                            'unpaid' => 'primary',
                            'paid' => 'success',
                        }),

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
