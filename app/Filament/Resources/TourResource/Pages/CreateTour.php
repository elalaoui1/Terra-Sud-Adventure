<?php

namespace App\Filament\Resources\TourResource\Pages;

use Filament\Actions;
use App\Filament\Resources\TourResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTour extends CreateRecord
{
    protected static string $resource = TourResource::class;


     protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Remove these from main model data so they're not saved to the `tours` table
        $this->includeIds = $data['include_ids'] ?? [];
        $this->excludeIds = $data['exclude_ids'] ?? [];

        unset($data['include_ids'], $data['exclude_ids']);

        return $data;
    }


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
            $tour = $this->record;

            // Attach Includes
            foreach ($this->includeIds as $id) {
                $tour->includes()->attach($id, ['type' => 'include']);
            }

            // Attach Excludes
            foreach ($this->excludeIds as $id) {
                $tour->excludes()->attach($id, ['type' => 'exclude']);
            }
            Notification::make()
                ->title('Tour created successfully!')
                ->success()
                ->send();
        }


}

