<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Tour;
use Filament\Tables;
use App\Models\Section;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Placeholder;
use App\Filament\Resources\TourResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TourResource\RelationManagers;

class TourResource extends Resource
{
    protected static ?string $model = Tour::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationSort(): ?int
{
    return 2;  // second
}


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->required()
                        ->live(onBlur: true) // 👈 triggers updates when leaving the field
                        ->afterStateUpdated(function (callable $set, $state) {
                            $set('slug', Str::slug($state));
                        }),
                    // TextInput::make('slug')
                    //     ->label('Slug')
                    //     ->required()
                    //     ->unique(ignoreRecord: true) // 👈 this avoids slug conflict on update
                    //     ->maxLength(255),
                    Toggle::make('is_highlited')
                        ->inline(false),
                    Select::make('section_id')
                        ->label('Section')
                        ->options(Section::all()->pluck('name', 'id'))
                        ->required(),
                    Select::make('tour_type_id')
                        ->relationship('tourType', 'name')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->label('Tour Type'),
                    Select::make('difficulties')
                        ->required()
                        ->options([
                            'easy' => 'Easy',
                            'medium' => 'Medium',
                            'hard' => 'Hard',
                        ]),
                    TextInput::make('duration_days')
                        ->required()
                        ->numeric()
                        ->minValue(1)
                        ->default(1)
                        ->label('Duration (days)'),

                    FileUpload::make('main_image')
                        ->image()
                        ->directory('tours')
                        ->required()
                        ->imagePreviewHeight('300')
                        ->maxSize(2048)
                        ->label('Main Image'),
                    FileUpload::make('gallery_images')
                        ->image()
                        ->directory('tours')
                        ->multiple()
                        ->maxFiles(5)
                        ->imagePreviewHeight('300')
                        ->maxSize(2048)
                        ->label('Gallery Images')
                        ->helperText('Upload multiple images for the gallery.'),

                    RichEditor::make('description')
                        ->required()
                        ->maxLength(65535),
                    RichEditor::make('overview')
                        ->required()
                        ->maxLength(65535),
                    Select::make('start_location_id')
                        ->relationship('startLocation', 'name')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->label('Start Location'),
                    Select::make('end_location_id')
                        ->relationship('endLocation', 'name')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->label('End Location'),

                    MultiSelect::make('include_ids')
                        ->label('Includes')
                        ->options(\App\Models\ExInClude::all()->pluck('name', 'id'))
                        ->searchable()
                        ->multiple(),

                    MultiSelect::make('exclude_ids')
                        ->label('Excludes')
                        ->options(\App\Models\ExInClude::all()->pluck('name', 'id'))
                        ->searchable()
                        ->multiple(),


                    // create a repeater for tour prices
                    Repeater::make('tourPrices') // This should match your relation method name
                        ->relationship('tourPrices')
                        ->schema([
                            TextInput::make('min_people')
                                ->numeric()
                                ->live()
                                ->required(),
                            TextInput::make('max_people')
                                ->numeric()
                                ->required()
                                ->live()
                                ->rule(function ($get) {
                                    return function ($attribute, $value, $fail) use ($get) {
                                        $min = $get('min_people');
                                        if ($value <= $min) {
                                            $fail('Max people must be greater than Min people.');
                                        }
                                    };
                                }),
                            TextInput::make('price')
                                ->numeric()
                                ->prefix('$')
                                ->step(0.01)
                                ->required(),
                        ])
                        ->grid(2)
                        ->columnSpan(2)
                        ->columns(3)
                        ->label('Prices for Different Groups')
                        ->createItemButtonLabel('Add Price Group'),

                    // create a repeater for tour days
                    Repeater::make('tourDays') // This should match your relation method name
                        ->relationship('tourDays')
                        ->schema([
                            TextInput::make('day_number')
                                ->numeric()
                                ->required(),
                            TextInput::make('title')
                                ->required(),
                            RichEditor::make('content')
                                ->label('Description')
                                ->required()
                                ->maxLength(65535),
                        ])
                        ->grid(2)
                        ->columnSpan(2)
                        // ->columns(3)
                        ->label('Tour Days')
                        ->createItemButtonLabel('Add Tour Day Details'),

                ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
               ImageColumn::make('main_image')
                    ->label('Main Image')
                    // ->sortable()
                    // ->searchable()
                    // ->square()

                    ->height(50)
                    ->width(80)
                     ->extraImgAttributes([
                            'style' => 'border-radius: 10px; object-fit: cover;',
                     ]),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->limit(35),
                TextColumn::make('description')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => Str::limit(strip_tags($state), 35, '...'))
                    ->default('No description available'),
                TextColumn::make('tourType.name')
                    ->label('Tour Type')
                    ->sortable()
                    ->searchable()
                    ->limit(35),
                TextColumn::make('duration_days')
                    ->label('Duration (days)')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('difficulties')
                    ->label('Difficulties')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                ToggleColumn::make('is_highlited')
                    ->label('Highlighted')
                    ->sortable()
                    ->toggleable()
                    // ->onColor('success')
                    // ->offColor('danger')
                    ->tooltip(fn ($record) => $record->is_highlited ? 'Click to disable highlight' : 'Click to highlight')
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
            'index' => Pages\ListTours::route('/'),
            'create' => Pages\CreateTour::route('/create'),
            'edit' => Pages\EditTour::route('/{record}/edit'),
        ];
    }
}
