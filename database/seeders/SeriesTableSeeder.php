<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesTableSeeder extends Seeder
{
    /**
     * Exécute le remplissage de la table des séries.
     *
     * @return void
     */
    public function run()
    {
        // Vide complètement la table
        DB::table('series')->delete();

        // Nouvelles séries selon la structure africaine demandée
        $series = [
            // 1. Séries Scientifiques
            [
                'name' => 'Série C',
                'code' => 'C',
                'type' => 'générale',
                'domain' => 'Scientifique',
                'description' => 'Mathématiques, Physique',
                'active' => true,
                'order' => 1
            ],
            [
                'name' => 'Série D',
                'code' => 'D',
                'type' => 'générale',
                'domain' => 'Scientifique',
                'description' => 'Mathématiques, SVT, Physique-Chimie',
                'active' => true,
                'order' => 2
            ],

            // 2. Séries Littéraires
            [
                'name' => 'Série A4',
                'code' => 'A4',
                'type' => 'générale',
                'domain' => 'Littéraire',
                'description' => 'Langues et Sciences Humaines',
                'active' => true,
                'order' => 1
            ],

            // 3. Séries Techniques Industrielles
            [
                'name' => 'Série F1',
                'code' => 'F1',
                'type' => 'technique',
                'domain' => 'Technique Industrielle',
                'description' => 'Génie civil',
                'active' => true,
                'order' => 1
            ],
            [
                'name' => 'Série F2',
                'code' => 'F2',
                'type' => 'technique',
                'domain' => 'Technique Industrielle',
                'description' => 'Électronique',
                'active' => true,
                'order' => 2
            ],
            [
                'name' => 'Série F3',
                'code' => 'F3',
                'type' => 'technique',
                'domain' => 'Technique Industrielle',
                'description' => 'Électrotechnique',
                'active' => true,
                'order' => 3
            ],
            [
                'name' => 'Série F4',
                'code' => 'F4',
                'type' => 'technique',
                'domain' => 'Technique Industrielle',
                'description' => 'Mécanique',
                'active' => true,
                'order' => 4
            ],

            // 4. Séries Techniques Administratives et de Gestion
            [
                'name' => 'Série G1',
                'code' => 'G1',
                'type' => 'technique',
                'domain' => 'Technique Administrative',
                'description' => 'Secrétariat / Gestion',
                'active' => true,
                'order' => 1
            ],
            [
                'name' => 'Série G2',
                'code' => 'G2',
                'type' => 'technique',
                'domain' => 'Technique Administrative',
                'description' => 'Comptabilité',
                'active' => true,
                'order' => 2
            ],
            [
                'name' => 'Série G3',
                'code' => 'G3',
                'type' => 'technique',
                'domain' => 'Technique Administrative',
                'description' => 'Économie',
                'active' => true,
                'order' => 3
            ],
        ];

        // Insertion dans la base de données
        DB::table('series')->insert($series);
    }
}
