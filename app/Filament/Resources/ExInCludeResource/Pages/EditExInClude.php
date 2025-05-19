<?php

namespace App\Filament\Resources\ExInCludeResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ExInCludeResource;

class EditExInClude extends EditRecord
{
    protected static string $resource = ExInCludeResource::class;

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
            ->title('Exclude/Include updated successfully!')
            ->success()
            ->send();
    }
}
