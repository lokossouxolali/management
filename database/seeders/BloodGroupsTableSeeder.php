<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodGroupsTableSeeder extends Seeder
{
    /**
     * Exécute le remplissage de la table des groupes sanguins.
     *
     * @return void
     */
    public function run()
    {
        // Vide complètement la table
        DB::table('blood_groups')->delete();



        // Liste des groupes sanguins
        $groupesSanguins = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        // Insertion dans la base de données
        foreach ($groupesSanguins as $groupe) {
            BloodGroup::create(['name' => $groupe]);
        }
    }
}
