<?php

namespace Database\Seeders;

use Exception;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Section;
use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // get the locations data
        $locations = $this->readLocationsData();

        // fill data
        foreach ($locations as $key => $location) {
            Location::create([
                'name' => $location->city,
            ]);
        }

        // create sections
        $sections = [
            'Treks & Randonnées',
            'Voyages & Tours privés',
            'Excursions',
            'Thèmes & Events'
        ];
        foreach ($sections as $key => $section) {
            Section::create([
                'name' => $section,
            ]);
        }
    }

     private function readLocationsData()
    {
        // get data from cities.json file
        $locations_path = public_path("data/cities.json");

        // handle if the file not exist
        if (!file_exists($locations_path)) {
            throw new Exception("The cities file not exist in {$locations_path}");
        }

        // get the file data in json
        $locations = file_get_contents($locations_path, true);

        // decode it from json to array
        $locations = json_decode($locations);

        return $locations;
    }
}
