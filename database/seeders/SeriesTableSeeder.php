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

        // Séries françaises (générales et techniques)
        $series = [
            // Séries générales
            [
                'name' => 'Série S - Scientifique',
                'code' => 'S',
                'type' => 'générale',
                'description' => 'Série scientifique avec spécialisation en mathématiques, physique-chimie, SVT',
                'active' => true
            ],
            [
                'name' => 'Série ES - Économique et Sociale',
                'code' => 'ES',
                'type' => 'générale',
                'description' => 'Série économique et sociale avec spécialisation en sciences économiques et sociales',
                'active' => true
            ],
            [
                'name' => 'Série L - Littéraire',
                'code' => 'L',
                'type' => 'générale',
                'description' => 'Série littéraire avec spécialisation en littérature, langues, philosophie',
                'active' => true
            ],

            // Séries techniques
            [
                'name' => 'STI2D - Sciences et Technologies de l\'Industrie et du Développement Durable',
                'code' => 'STI2D',
                'type' => 'technique',
                'description' => 'Série technique industrielle avec spécialisations en innovation technologique, énergies, architecture',
                'active' => true
            ],
            [
                'name' => 'STL - Sciences et Technologies de Laboratoire',
                'code' => 'STL',
                'type' => 'technique',
                'description' => 'Série technique de laboratoire avec spécialisations en biotechnologies, sciences physiques et chimiques',
                'active' => true
            ],
            [
                'name' => 'STMG - Sciences et Technologies du Management et de la Gestion',
                'code' => 'STMG',
                'type' => 'technique',
                'description' => 'Série technique de gestion avec spécialisations en gestion et finance, mercatique, ressources humaines',
                'active' => true
            ],
            [
                'name' => 'ST2S - Sciences et Technologies de la Santé et du Social',
                'code' => 'ST2S',
                'type' => 'technique',
                'description' => 'Série technique de la santé et du social avec spécialisations en biologie et physiopathologie humaines',
                'active' => true
            ],
            [
                'name' => 'STD2A - Sciences et Technologies du Design et des Arts Appliqués',
                'code' => 'STD2A',
                'type' => 'technique',
                'description' => 'Série technique du design et des arts appliqués',
                'active' => true
            ],
            [
                'name' => 'STAV - Sciences et Technologies de l\'Agronomie et du Vivant',
                'code' => 'STAV',
                'type' => 'technique',
                'description' => 'Série technique de l\'agronomie et du vivant',
                'active' => true
            ],
            [
                'name' => 'Hôtellerie-Restauration',
                'code' => 'HR',
                'type' => 'technique',
                'description' => 'Série technique de l\'hôtellerie et de la restauration',
                'active' => true
            ],
            [
                'name' => 'TMD - Techniques de la Musique et de la Danse',
                'code' => 'TMD',
                'type' => 'technique',
                'description' => 'Série technique de la musique et de la danse',
                'active' => true
            ],

            // EXEMPLE : Pour ajouter une nouvelle série, ajoutez-la ici :
            // [
            //     'name' => 'Nom de votre nouvelle série',
            //     'code' => 'CODE',
            //     'type' => 'générale', // ou 'technique'
            //     'description' => 'Description de votre série',
            //     'active' => true
            // ],
        ];

        // Insertion dans la base de données
        DB::table('series')->insert($series);
    }
}
