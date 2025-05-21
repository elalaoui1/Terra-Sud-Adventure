<?php

namespace App\Filament\Resources\TourRequestResource\Pages;

use App\Filament\Resources\TourRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTourRequest extends EditRecord
{
    protected static string $resource = TourRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
