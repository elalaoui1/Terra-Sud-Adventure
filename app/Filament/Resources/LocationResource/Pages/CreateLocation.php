<?php

namespace App\Filament\Resources\LocationResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\LocationResource;

class CreateLocation extends CreateRecord
{
    protected static string $resource = LocationResource::class;

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
            ->title('Location created successfully!')
            ->success()
            ->send();
    }

}
