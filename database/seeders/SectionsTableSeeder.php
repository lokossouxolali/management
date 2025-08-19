<?php

namespace Database\Seeders;

use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        
        // Récupérer toutes les classes
        $classes = MyClass::all();
        
        $sections = [];
        
        foreach ($classes as $class) {
            // Créer 3 sections par défaut (A, B, C) pour chaque classe
            for ($i = 0; $i < 3; $i++) {
                $sectionName = chr(65 + $i); // A, B, C
                $sections[] = [
                    'name' => $sectionName,
                    'my_class_id' => $class->id,
                    'teacher_id' => null,
                    'description' => 'Section ' . $sectionName . ' - ' . $class->name,
                    'active' => true
                ];
            }
        }
        
        DB::table('sections')->insert($sections);
    }
}
