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

        // Nouvelles catégories selon la structure demandée
        $categories = [
            [
                'name' => 'Jardin d\'enfant',
                'code' => 'JARDIN',
                'description' => 'Classes de maternelle et crèche',
                'order' => 1,
                'active' => true
            ],
            [
                'name' => 'Primaire',
                'code' => 'PRIMAIRE',
                'description' => 'Classes du primaire (CI à CM2)',
                'order' => 2,
                'active' => true
            ],
            [
                'name' => 'Collège',
                'code' => 'COLLEGE',
                'description' => 'Classes du collège (6ème à 3ème)',
                'order' => 3,
                'active' => true
            ],
            [
                'name' => 'Lycée',
                'code' => 'LYCEE',
                'description' => 'Classes du lycée (Seconde à Terminale) avec séries',
                'order' => 4,
                'active' => true
            ],
        ];

        // Insertion dans la base de données
        DB::table('class_types')->insert($categories);
    }
}
