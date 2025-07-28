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
        $ct = ClassType::pluck('id')->all();

        $data = [
            // Crèche
            ['name' => 'Crèche 1', 'class_type_id' => $ct[0]],
            ['name' => 'Crèche 2', 'class_type_id' => $ct[0]],
            ['name' => 'Crèche 3', 'class_type_id' => $ct[0]],
            
            // Maternelle
            ['name' => 'Petite section', 'class_type_id' => $ct[1]],
            ['name' => 'Moyenne section', 'class_type_id' => $ct[2]],
            ['name' => 'Grande section', 'class_type_id' => $ct[3]],
            
            // Primaire
            ['name' => 'CP', 'class_type_id' => $ct[4]],
            ['name' => 'CE1', 'class_type_id' => $ct[4]],
            ['name' => 'CE2', 'class_type_id' => $ct[4]],
            ['name' => 'CM1', 'class_type_id' => $ct[4]],
            ['name' => 'CM2', 'class_type_id' => $ct[4]],
            
            // Collège
            ['name' => '6ème', 'class_type_id' => $ct[5]],
            ['name' => '5ème', 'class_type_id' => $ct[5]],
            ['name' => '4ème', 'class_type_id' => $ct[5]],
            ['name' => '3ème', 'class_type_id' => $ct[5]],
            
            // Lycée
            ['name' => '2nde', 'class_type_id' => $ct[6]],
            ['name' => '1ère', 'class_type_id' => $ct[6]],
            ['name' => 'Terminale', 'class_type_id' => $ct[6]],
        ];

        DB::table('my_classes')->insert($data);
    }
}
