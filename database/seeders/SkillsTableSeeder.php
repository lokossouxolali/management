<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->delete();

        $this->createSkills();
    }

    protected function createSkills()
    {

        $types = ['AF', 'PS']; // Affective & Psychomotor Traits/Skills
        $d = [

            // Compétences affectives (comportement)
            [ 'name' => 'PONCTUALITÉ', 'skill_type' => $types[0] ],
            [ 'name' => 'SOIN ET ORDRE', 'skill_type' => $types[0] ],
            [ 'name' => 'HONNÊTETÉ', 'skill_type' => $types[0] ],
            [ 'name' => 'FIABILITÉ', 'skill_type' => $types[0] ],
            [ 'name' => 'RELATIONS AVEC LES AUTRES', 'skill_type' => $types[0] ],
            [ 'name' => 'POLITESSE', 'skill_type' => $types[0] ],
            [ 'name' => 'ATTENTION ET CONCENTRATION', 'skill_type' => $types[0] ],
            [ 'name' => 'AUTONOMIE', 'skill_type' => $types[0] ],
            [ 'name' => 'RESPONSABILITÉ', 'skill_type' => $types[0] ],
            [ 'name' => 'PARTICIPATION', 'skill_type' => $types[0] ],
            
            // Compétences psychomotrices (pratiques)
            [ 'name' => 'ÉCRITURE', 'skill_type' => $types[1] ],
            [ 'name' => 'SPORTS ET JEUX', 'skill_type' => $types[1] ],
            [ 'name' => 'DESSIN ET ARTS PLASTIQUES', 'skill_type' => $types[1] ],
            [ 'name' => 'PEINTURE', 'skill_type' => $types[1] ],
            [ 'name' => 'CONSTRUCTION ET MANIPULATION', 'skill_type' => $types[1] ],
            [ 'name' => 'COMPÉTENCES MUSICALES', 'skill_type' => $types[1] ],
            [ 'name' => 'AGILITÉ ET FLEXIBILITÉ', 'skill_type' => $types[1] ],
            [ 'name' => 'EXPRESSION ORALE', 'skill_type' => $types[1] ],
            [ 'name' => 'UTILISATION DES OUTILS', 'skill_type' => $types[1] ],

        ];
        DB::table('skills')->insert($d);
    }

}
