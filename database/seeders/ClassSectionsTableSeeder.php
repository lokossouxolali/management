<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Series;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_sections')->delete();
        
        // Récupérer toutes les sections
        $sections = Section::with(['my_class.class_type'])->where('active', true)->get();
        
        // Récupérer toutes les séries
        $series = Series::where('active', true)->get();
        
        $classSections = [];
        
        foreach ($sections as $section) {
            $myClass = $section->my_class;
            $classType = $myClass->class_type;
            
            if ($myClass->requires_series) {
                // Pour les classes qui nécessitent une série (1ère et Terminale)
                foreach ($series as $serie) {
                    // Générer le nom complet
                    $fullName = $classType->name . ' → ' . $myClass->name . ' → Section ' . $section->name . ' → ' . $serie->name;
                    
                    // Générer le code unique
                    $code = $classType->code . '_' . $myClass->name . '_' . $section->name . '_' . $serie->code;
                    
                    $classSections[] = [
                        'section_id' => $section->id,
                        'series_id' => $serie->id,
                        'full_name' => $fullName,
                        'code' => $code,
                        'description' => $fullName,
                        'active' => true
                    ];
                }
            } else {
                // Pour les classes qui ne nécessitent pas de série
                $fullName = $classType->name . ' → ' . $myClass->name . ' → Section ' . $section->name;
                $code = $classType->code . '_' . $myClass->name . '_' . $section->name;
                
                $classSections[] = [
                    'section_id' => $section->id,
                    'series_id' => null,
                    'full_name' => $fullName,
                    'code' => $code,
                    'description' => $fullName,
                    'active' => true
                ];
            }
        }
        
        DB::table('class_sections')->insert($classSections);
    }
}
