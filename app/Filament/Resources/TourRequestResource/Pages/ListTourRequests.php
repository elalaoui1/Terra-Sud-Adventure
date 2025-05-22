<?php

namespace App\Filament\Resources\TourRequestResource\Pages;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\TourRequestResource;

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
