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
            // Maternelle
            ['name' => 'Petite section', 'class_type_id' => $ct[0]],
            ['name' => 'Moyenne section', 'class_type_id' => $ct[1]],
            ['name' => 'Grande section', 'class_type_id' => $ct[2]],
            
            // Primaire
            ['name' => 'CP', 'class_type_id' => $ct[3]],
            ['name' => 'CE1', 'class_type_id' => $ct[3]],
            ['name' => 'CE2', 'class_type_id' => $ct[3]],
            ['name' => 'CM1', 'class_type_id' => $ct[3]],
            ['name' => 'CM2', 'class_type_id' => $ct[3]],
            
            // Collège
            ['name' => '6ème', 'class_type_id' => $ct[4]],
            ['name' => '5ème', 'class_type_id' => $ct[4]],
            ['name' => '4ème', 'class_type_id' => $ct[4]],
            ['name' => '3ème', 'class_type_id' => $ct[4]],
        ];

        DB::table('my_classes')->insert($data);
    }
}
