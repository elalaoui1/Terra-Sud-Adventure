<?php

namespace App\Filament\Resources\ExInCludeResource\Pages;

use App\Filament\Resources\ExInCludeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExInCludes extends ListRecords
{
    protected static string $resource = ExInCludeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
