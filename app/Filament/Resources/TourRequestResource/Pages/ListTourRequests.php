<?php

namespace App\Filament\Resources\TourRequestResource\Pages;

use App\Filament\Resources\TourRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTourRequests extends ListRecords
{
    protected static string $resource = TourRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
