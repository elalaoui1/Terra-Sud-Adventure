<?php

namespace App\Filament\Resources\TourResource\Pages;

use Filament\Actions;
use App\Models\TourDay;
use App\Models\TranslateLanguage;
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

            $translations = $tour->translations()
                ->whereNull('tour_day_id') // Only main tour translations (not days)
                ->get()
                ->groupBy('lang_code');

            $data['translations'] = [];

            foreach ($translations as $lang => $items) {
                $item = $items->first();

                $data['translations'][$lang] = [
                    'overview' => $item->overview,
                    'description' => $item->description,
                    'name' => $item->name,
                ];
            }


            // Get tour days and their translations

            $data['tourDays'] = $this->record->tourDays->map(function ($day) {
            return [
                'id' => $day->id,
                'day_number' => $day->day_number,
                'title' => $day->title, // from tour_days table
                'content' => $day->content, // from tour_days table
                'translations_day' => $day->translations->mapWithKeys(function ($trans) {
                    return [
                        $trans->lang_code => [
                            'title' => $trans->title,
                            'content' => $trans->content,
                        ],
                    ];
                })->toArray(),
            ];
        })->toArray();


            return $data;
        }

    protected function handleRecordUpdate(Model $record, array $data): Model
        {

            $tour = $this->record;

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

            // update the tour translations
             $translations = $data['translations'] ?? [];
            foreach ($translations as $lang => $fields) {
                TranslateLanguage::where('tour_id', $record->id)
                    ->where('lang_code', $lang)
                    ->update([
                        'name' => $fields['name'],
                        'description' => $fields['description'],
                        'overview' => $fields['overview'],
                    ]);
            }


             // Update or create tourDays and translations
             foreach ($data['tourDays'] ?? [] as $tourDayData) {
                // Check if this is an update or a new day
                if (isset($tourDayData['id'])) {
                    // Update existing tour_day
                    $tourDay = TourDay::find($tourDayData['id']);
                    if ($tourDay) {
                        $tourDay->update([
                            'day_number' => $tourDayData['day_number'],
                            'title'      => $tourDayData['title'],   // French
                            'content'    => $tourDayData['content'], // French
                        ]);
                    }
                } else {
                    // Create new tour_day
                    $tourDay = $tour->tourDays()->create([
                        'day_number' => $tourDayData['day_number'],
                        'title'      => $tourDayData['title'],   // French
                        'content'    => $tourDayData['content'], // French
                    ]);
                }

                // Handle translations for EN, ES
                if ($tourDay && isset($tourDayData['translations_day'])) {
                    foreach ($tourDayData['translations_day'] as $lang => $fields) {
                        TranslateLanguage::updateOrCreate(
                            [
                                'tour_day_id' => $tourDay->id,
                                'lang_code'   => $lang,
                            ],
                            [
                                'title'   => $fields['title'],
                                'content' => $fields['content'],
                            ]
                        );
                    }
                }
            }


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
