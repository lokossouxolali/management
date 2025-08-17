<?php
namespace Database\Seeders;

use App\Models\ClassType;
use App\Models\Series;
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
        $series = Series::pluck('id')->all();

        $data = [
            // Crèche
            ['name' => 'Crèche 1', 'class_type_id' => $ct[0], 'series_id' => null],
            ['name' => 'Crèche 2', 'class_type_id' => $ct[0], 'series_id' => null],
            ['name' => 'Crèche 3', 'class_type_id' => $ct[0], 'series_id' => null],
            
            // Maternelle
            ['name' => 'Petite section', 'class_type_id' => $ct[1], 'series_id' => null],
            ['name' => 'Moyenne section', 'class_type_id' => $ct[2], 'series_id' => null],
            ['name' => 'Grande section', 'class_type_id' => $ct[3], 'series_id' => null],
            
            // Primaire
            ['name' => 'CP', 'class_type_id' => $ct[4], 'series_id' => null],
            ['name' => 'CE1', 'class_type_id' => $ct[4], 'series_id' => null],
            ['name' => 'CE2', 'class_type_id' => $ct[4], 'series_id' => null],
            ['name' => 'CM1', 'class_type_id' => $ct[4], 'series_id' => null],
            ['name' => 'CM2', 'class_type_id' => $ct[4], 'series_id' => null],
            
            // Collège
            ['name' => '6ème', 'class_type_id' => $ct[5], 'series_id' => null],
            ['name' => '5ème', 'class_type_id' => $ct[5], 'series_id' => null],
            ['name' => '4ème', 'class_type_id' => $ct[5], 'series_id' => null],
            ['name' => '3ème', 'class_type_id' => $ct[5], 'series_id' => null],
            
            // Lycée - 2nde (sans série spécifique)
            ['name' => '2nde', 'class_type_id' => $ct[6], 'series_id' => null],
            
            // Lycée - 1ère avec séries générales
            ['name' => '1ère S', 'class_type_id' => $ct[6], 'series_id' => $series[0]], // Série S
            ['name' => '1ère ES', 'class_type_id' => $ct[6], 'series_id' => $series[1]], // Série ES
            ['name' => '1ère L', 'class_type_id' => $ct[6], 'series_id' => $series[2]], // Série L
            
            // Lycée - 1ère avec séries techniques
            ['name' => '1ère STI2D', 'class_type_id' => $ct[6], 'series_id' => $series[3]], // STI2D
            ['name' => '1ère STL', 'class_type_id' => $ct[6], 'series_id' => $series[4]], // STL
            ['name' => '1ère STMG', 'class_type_id' => $ct[6], 'series_id' => $series[5]], // STMG
            ['name' => '1ère ST2S', 'class_type_id' => $ct[6], 'series_id' => $series[6]], // ST2S
            ['name' => '1ère STD2A', 'class_type_id' => $ct[6], 'series_id' => $series[7]], // STD2A
            ['name' => '1ère STAV', 'class_type_id' => $ct[6], 'series_id' => $series[8]], // STAV
            ['name' => '1ère HR', 'class_type_id' => $ct[6], 'series_id' => $series[9]], // Hôtellerie-Restauration
            ['name' => '1ère TMD', 'class_type_id' => $ct[6], 'series_id' => $series[10]], // TMD
            
            // Lycée - Terminale avec séries générales
            ['name' => 'Terminale S', 'class_type_id' => $ct[6], 'series_id' => $series[0]], // Série S
            ['name' => 'Terminale ES', 'class_type_id' => $ct[6], 'series_id' => $series[1]], // Série ES
            ['name' => 'Terminale L', 'class_type_id' => $ct[6], 'series_id' => $series[2]], // Série L
            
            // Lycée - Terminale avec séries techniques
            ['name' => 'Terminale STI2D', 'class_type_id' => $ct[6], 'series_id' => $series[3]], // STI2D
            ['name' => 'Terminale STL', 'class_type_id' => $ct[6], 'series_id' => $series[4]], // STL
            ['name' => 'Terminale STMG', 'class_type_id' => $ct[6], 'series_id' => $series[5]], // STMG
            ['name' => 'Terminale ST2S', 'class_type_id' => $ct[6], 'series_id' => $series[6]], // ST2S
            ['name' => 'Terminale STD2A', 'class_type_id' => $ct[6], 'series_id' => $series[7]], // STD2A
            ['name' => 'Terminale STAV', 'class_type_id' => $ct[6], 'series_id' => $series[8]], // STAV
            ['name' => 'Terminale HR', 'class_type_id' => $ct[6], 'series_id' => $series[9]], // Hôtellerie-Restauration
            ['name' => 'Terminale TMD', 'class_type_id' => $ct[6], 'series_id' => $series[10]], // TMD
        ];

        DB::table('my_classes')->insert($data);
    }
}
