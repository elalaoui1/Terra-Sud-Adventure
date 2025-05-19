<?php

namespace App\Filament\Resources\ExInCludeResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ExInCludeResource;

class CreateExInClude extends CreateRecord
{
    protected static string $resource = ExInCludeResource::class;

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
            ->title('Exclude/Include created successfully!')
            ->success()
            ->send();
    }
}
