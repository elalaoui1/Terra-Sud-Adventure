<?php

namespace App\Filament\Resources\TourResource\Pages;

use Filament\Actions;
use App\Models\TranslateLanguage;
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

            // Store tour translations
            $translations = $this->form->getState()['translations'];

            foreach ($translations as $lang => $fields) {
                TranslateLanguage::create([
                    'tour_id' => $this->record->id,
                    'lang_code' => $lang,
                    'name' => $fields['name'],
                    'description' => $fields['description'],
                    'overview' => $fields['overview'],
                ]);
            }

            $formTourDays = $this->form->getState()['tourDays'] ?? [];


         // Store tour day and translations
        foreach ($formTourDays as $tourDayData) {
            // Create Tour Day (French as default)
            $tourDay = $tour->tourDays()->create([
                'day_number' => $tourDayData['day_number'],
                'title'      => $tourDayData['title'],
                'content'    => $tourDayData['content'],
            ]);

            // Translations (English, Spanish)
        if ($tourDay && isset($tourDayData['translations_day'])) {
            foreach ($tourDayData['translations_day'] ?? [] as $lang => $transData) {
                TranslateLanguage::create([
                    'tour_day_id' => $tourDay->id,
                    'lang_code'   => $lang,
                    'title'       => $transData['title'] ,
                    'content'     => $transData['content'],
                ]);
            }
        }
        }




            Notification::make()
                ->title('Tour created successfully!')
                ->success()
                ->send();
        }


}

