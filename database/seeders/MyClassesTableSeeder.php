<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        
        // Récupérer les IDs des catégories
        $categories = ClassType::pluck('id', 'code')->all();

        $data = [
            // Jardin d'enfant
            ['name' => '1ère Crèche', 'class_type_id' => $categories['JARDIN'], 'description' => 'Première année de crèche', 'order' => 1, 'active' => true, 'requires_series' => false],
            ['name' => '2ème Crèche', 'class_type_id' => $categories['JARDIN'], 'description' => 'Deuxième année de crèche', 'order' => 2, 'active' => true, 'requires_series' => false],
            
            // Primaire
            ['name' => 'CI', 'class_type_id' => $categories['PRIMAIRE'], 'description' => 'Cours d\'Initiation', 'order' => 1, 'active' => true, 'requires_series' => false],
            ['name' => 'CP1', 'class_type_id' => $categories['PRIMAIRE'], 'description' => 'Cours Préparatoire 1ère année', 'order' => 2, 'active' => true, 'requires_series' => false],
            ['name' => 'CP2', 'class_type_id' => $categories['PRIMAIRE'], 'description' => 'Cours Préparatoire 2ème année', 'order' => 3, 'active' => true, 'requires_series' => false],
            ['name' => 'CE1', 'class_type_id' => $categories['PRIMAIRE'], 'description' => 'Cours Élémentaire 1ère année', 'order' => 4, 'active' => true, 'requires_series' => false],
            ['name' => 'CE2', 'class_type_id' => $categories['PRIMAIRE'], 'description' => 'Cours Élémentaire 2ème année', 'order' => 5, 'active' => true, 'requires_series' => false],
            ['name' => 'CM1', 'class_type_id' => $categories['PRIMAIRE'], 'description' => 'Cours Moyen 1ère année', 'order' => 6, 'active' => true, 'requires_series' => false],
            ['name' => 'CM2', 'class_type_id' => $categories['PRIMAIRE'], 'description' => 'Cours Moyen 2ème année', 'order' => 7, 'active' => true, 'requires_series' => false],
            
            // Collège
            ['name' => '6ème', 'class_type_id' => $categories['COLLEGE'], 'description' => 'Sixième', 'order' => 1, 'active' => true, 'requires_series' => false],
            ['name' => '5ème', 'class_type_id' => $categories['COLLEGE'], 'description' => 'Cinquième', 'order' => 2, 'active' => true, 'requires_series' => false],
            ['name' => '4ème', 'class_type_id' => $categories['COLLEGE'], 'description' => 'Quatrième', 'order' => 3, 'active' => true, 'requires_series' => false],
            ['name' => '3ème', 'class_type_id' => $categories['COLLEGE'], 'description' => 'Troisième', 'order' => 4, 'active' => true, 'requires_series' => false],
            
            // Lycée
            ['name' => 'Seconde', 'class_type_id' => $categories['LYCEE'], 'description' => 'Seconde générale', 'order' => 1, 'active' => true, 'requires_series' => false],
            ['name' => 'Première', 'class_type_id' => $categories['LYCEE'], 'description' => 'Première avec séries', 'order' => 2, 'active' => true, 'requires_series' => true],
            ['name' => 'Terminale', 'class_type_id' => $categories['LYCEE'], 'description' => 'Terminale avec séries', 'order' => 3, 'active' => true, 'requires_series' => true],
        ];

        DB::table('my_classes')->insert($data);
    }
}
