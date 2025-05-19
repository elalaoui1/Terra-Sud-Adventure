<?php

namespace App\Filament\Resources\TourResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\TourResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTour extends EditRecord
{
    protected static string $resource = TourResource::class;

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



        protected function mutateFormDataBeforeFill(array $data): array
        {
            $tour = $this->record;

            $data['include_ids'] = $tour->includes()->pluck('ex_in_cludes.id')->toArray();
            $data['exclude_ids'] = $tour->excludes()->pluck('ex_in_cludes.id')->toArray();


            return $data;
        }

        protected function handleRecordUpdate(Model $record, array $data): Model
        {

            $record->update($data);

            $syncData = [];

            foreach ($data['include_ids'] ?? [] as $includeId) {
                $syncData[$includeId] = ['type' => 'include'];
            }

            foreach ($data['exclude_ids'] ?? [] as $excludeId) {
                $syncData[$excludeId] = ['type' => 'exclude'];
            }

            // Sync with pivot data
            $record->exInCludes()->sync($syncData);

            return $record;
        }



    protected function afterSave(): void
    {
        Notification::make()
            ->title('Tour updated successfully!')
            ->success()
            ->send();
    }
}
