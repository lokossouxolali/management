<?php

namespace Database\Seeders;

use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        // On vide proprement la table sans conflit de clé étrangère
        DB::table('sections')->delete();

        $classes = MyClass::all();

        $sections = [];

        foreach ($classes as $classe) {
            $sections[] = [
                'name' => 'Section A',
                'my_class_id' => $classe->id,
                'active' => 1,
            ];
        }

        DB::table('sections')->insert($sections);
    }
}
