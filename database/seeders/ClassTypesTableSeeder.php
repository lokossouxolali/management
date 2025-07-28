<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Exécute le remplissage de la table des types de classe.
     *
     * @return void
     */
    public function run()
    {
        // Vide complètement la table
        DB::table('class_types')->delete();

        // Types de classes en français avec leurs codes
        $typesDeClasse = [
            ['name' => 'Crèche', 'code' => 'C'],
            ['name' => 'Petite section', 'code' => 'PS'],
            ['name' => 'Moyenne section', 'code' => 'MS'],
            ['name' => 'Grande section', 'code' => 'GS'],
            ['name' => 'Primaire', 'code' => 'P'],
            ['name' => 'Collège (1er cycle)', 'code' => 'J'],
            ['name' => 'Lycée (2e cycle)', 'code' => 'S'],
        ];

        // Insertion dans la base de données
        DB::table('class_types')->insert($typesDeClasse);
    }
}
