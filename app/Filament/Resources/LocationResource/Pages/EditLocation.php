<?php

namespace App\Filament\Resources\LocationResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\LocationResource;

class EditLocation extends EditRecord
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // deactivate the default "Saved" notification
    protected function getSavedNotification(): ?Notification
        {
            return null; // disables the default "Saved" notification
        }


    protected function afterSave(): void
    {
        Notification::make()
            ->title('Location updated successfully!')
            ->success()
            ->send();
    }

}
