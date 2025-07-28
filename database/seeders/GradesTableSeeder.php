<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();

        $this->createGrades();
    }

    protected function createGrades()
    {

        $d = [

            ['name' => 'A', 'mark_from' => 16, 'mark_to' => 20, 'remark' => 'Très Bien'],
            ['name' => 'B', 'mark_from' => 14, 'mark_to' => 15, 'remark' => 'Bien'],
            ['name' => 'C', 'mark_from' => 12, 'mark_to' => 13, 'remark' => 'Assez Bien'],
            ['name' => 'D', 'mark_from' => 10, 'mark_to' => 11, 'remark' => 'Passable'],
            ['name' => 'E', 'mark_from' => 8, 'mark_to' => 9, 'remark' => 'Insuffisant'],
            ['name' => 'F', 'mark_from' => 0, 'mark_to' => 7, 'remark' => 'Très Insuffisant'],


        ];
        DB::table('grades')->insert($d);
    }
}
