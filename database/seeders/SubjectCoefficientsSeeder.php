<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectCoefficientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mettre à jour les coefficients pour les matières existantes
        $this->updateSubjectCoefficients();
    }

    protected function updateSubjectCoefficients()
    {
        // Coefficients par défaut selon le nom de la matière
        $coefficients = [
            // Matières principales (coefficient 6)
            'mathématiques' => ['coefficient' => 6, 'is_core_subject' => true],
            'maths' => ['coefficient' => 6, 'is_core_subject' => true],
            'français' => ['coefficient' => 6, 'is_core_subject' => true],
            'anglais' => ['coefficient' => 6, 'is_core_subject' => true],
            
            // Matières importantes (coefficient 4-5)
            'sciences' => ['coefficient' => 5, 'is_core_subject' => true],
            'physique' => ['coefficient' => 5, 'is_core_subject' => true],
            'chimie' => ['coefficient' => 5, 'is_core_subject' => true],
            'biologie' => ['coefficient' => 5, 'is_core_subject' => true],
            'histoire' => ['coefficient' => 4, 'is_core_subject' => true],
            'géographie' => ['coefficient' => 4, 'is_core_subject' => false],
            'histoire-géo' => ['coefficient' => 4, 'is_core_subject' => true],
            
            // Matières moyennes (coefficient 3)
            'arts plastiques' => ['coefficient' => 3, 'is_core_subject' => false],
            'musique' => ['coefficient' => 3, 'is_core_subject' => false],
            'informatique' => ['coefficient' => 3, 'is_core_subject' => false],
            'technologie' => ['coefficient' => 3, 'is_core_subject' => false],
            
            // Matières secondaires (coefficient 2)
            'sport' => ['coefficient' => 2, 'is_core_subject' => false],
            'éducation physique' => ['coefficient' => 2, 'is_core_subject' => false],
            'eps' => ['coefficient' => 2, 'is_core_subject' => false],
            'dessin' => ['coefficient' => 2, 'is_core_subject' => false],
            'art' => ['coefficient' => 2, 'is_core_subject' => false],
        ];

        // Mettre à jour les matières existantes
        $subjects = DB::table('subjects')->get();
        
        foreach ($subjects as $subject) {
            $subjectName = strtolower(trim($subject->name));
            $found = false;
            
            // Chercher une correspondance exacte ou partielle
            foreach ($coefficients as $key => $config) {
                if (strpos($subjectName, $key) !== false) {
                    DB::table('subjects')
                        ->where('id', $subject->id)
                        ->update([
                            'coefficient' => $config['coefficient'],
                            'is_core_subject' => $config['is_core_subject'],
                            'max_score' => $config['coefficient'] * 20
                        ]);
                    $found = true;
                    break;
                }
            }
            
            // Si aucune correspondance trouvée, utiliser les valeurs par défaut
            if (!$found) {
                DB::table('subjects')
                    ->where('id', $subject->id)
                    ->update([
                        'coefficient' => 1,
                        'is_core_subject' => false,
                        'max_score' => 20
                    ]);
            }
        }
    }
}
