<?php

namespace App\Filament\Resources\TourTypeResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\TourTypeResource;

class CreateTourType extends CreateRecord
{
    protected static string $resource = TourTypeResource::class;

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // deactivate the default "Saved" notification
    protected function getCreatedNotification(): ?Notification
        {
            return null; // disables the default "Saved" notification
        }


    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Tour type created successfully!')
            ->success()
            ->send();
    }
}
