<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        $this->createSubjects();
    }

    protected function createSubjects()
    {
        // Matières principales en français
        $subjects = [
            'Français',
            'Mathématiques', 
            'Histoire-Géographie',
            'Sciences',
            'Anglais',
            'Espagnol',
            'Allemand',
            'Physique-Chimie',
            'SVT (Sciences de la Vie et de la Terre)',
            'Technologie',
            'Arts Plastiques',
            'Musique',
            'EPS (Éducation Physique et Sportive)',
            'Philosophie',
            'Économie',
            'Littérature'
        ];
        
        $sub_slug = [
            'FR',
            'MATH', 
            'HIST-GEO',
            'SCIENCES',
            'ANG',
            'ESP',
            'ALL',
            'PHY-CHI',
            'SVT',
            'TECH',
            'ARTS',
            'MUSIQUE',
            'EPS',
            'PHILO',
            'ECO',
            'LIT'
        ];
        
        $teacher_id = User::where(['user_type' => 'teacher'])->first()->id;
        $my_classes = MyClass::all();

        foreach ($my_classes as $my_class) {
            $data = [];
            
            // Ajouter les matières selon le niveau
            if (str_contains($my_class->name, 'Petite') || str_contains($my_class->name, 'Moyenne') || 
                str_contains($my_class->name, 'Grande')) {
                // Maternelle - matières de base
                $data = [
                    ['name' => $subjects[0], 'slug' => $sub_slug[0], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[1], 'slug' => $sub_slug[1], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[11], 'slug' => $sub_slug[11], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[12], 'slug' => $sub_slug[12], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                ];
            } elseif (str_contains($my_class->name, 'CP') || str_contains($my_class->name, 'CE') || 
                       str_contains($my_class->name, 'CM')) {
                // Primaire - matières principales
                $data = [
                    ['name' => $subjects[0], 'slug' => $sub_slug[0], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[1], 'slug' => $sub_slug[1], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[2], 'slug' => $sub_slug[2], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[3], 'slug' => $sub_slug[3], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[4], 'slug' => $sub_slug[4], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[10], 'slug' => $sub_slug[10], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[11], 'slug' => $sub_slug[11], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[12], 'slug' => $sub_slug[12], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                ];
            } elseif (str_contains($my_class->name, '6ème') || str_contains($my_class->name, '5ème') || 
                       str_contains($my_class->name, '4ème') || str_contains($my_class->name, '3ème')) {
                // Collège - matières du collège
                $data = [
                    ['name' => $subjects[0], 'slug' => $sub_slug[0], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[1], 'slug' => $sub_slug[1], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[2], 'slug' => $sub_slug[2], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[7], 'slug' => $sub_slug[7], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[8], 'slug' => $sub_slug[8], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[4], 'slug' => $sub_slug[4], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[5], 'slug' => $sub_slug[5], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[6], 'slug' => $sub_slug[6], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[9], 'slug' => $sub_slug[9], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[10], 'slug' => $sub_slug[10], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[11], 'slug' => $sub_slug[11], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                    ['name' => $subjects[12], 'slug' => $sub_slug[12], 'my_class_id' => $my_class->id, 'teacher_id' => $teacher_id],
                ];
            }

            DB::table('subjects')->insert($data);
        }
    }

}
