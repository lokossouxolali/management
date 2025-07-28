<?php

namespace Database\Seeders;

use App\Models\Lga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LgasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('lgas')->delete();

        $quartiers = [
            // Lomé (ID 1)
            ['state_id' => 1, 'name' => 'Adidogomé'],
            ['state_id' => 1, 'name' => 'Agoè'],
            ['state_id' => 1, 'name' => 'Bè'],
            ['state_id' => 1, 'name' => 'Tokoin'],
            ['state_id' => 1, 'name' => 'Hanoukopé'],
            ['state_id' => 1, 'name' => 'Amoutivé'],

            // Tsévié (ID 2)
            ['state_id' => 2, 'name' => 'Kévé'],
            ['state_id' => 2, 'name' => 'Zanguéra'],
            ['state_id' => 2, 'name' => 'Noépé'],

            // Kpalimé (ID 3)
            ['state_id' => 3, 'name' => 'Dzigbé'],
            ['state_id' => 3, 'name' => 'Agomé-Tomégbé'],

            // Atakpamé (ID 4)
            ['state_id' => 4, 'name' => 'Talo'],
            ['state_id' => 4, 'name' => 'Datcha'],

            // Sokodé (ID 5)
            ['state_id' => 5, 'name' => 'Kouloundè'],
            ['state_id' => 5, 'name' => 'Tchawanda'],

            // Kara (ID 6)
            ['state_id' => 6, 'name' => 'Landa'],
            ['state_id' => 6, 'name' => 'Tomdè'],

            // Dapaong (ID 7)
            ['state_id' => 7, 'name' => 'Naki Est'],
            ['state_id' => 7, 'name' => 'Tone'],

        ];

        foreach ($quartiers as $quartier) {
            Lga::create($quartier);
        }
    }
}
