<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'accountant', 'name' => 'Comptable', 'level' => 5],
            ['title' => 'parent', 'name' => 'Parent', 'level' => 4],
            ['title' => 'teacher', 'name' => 'Professeur', 'level' => 3],
            ['title' => 'admin', 'name' => 'Administrateur', 'level' => 2],
            ['title' => 'super_admin', 'name' => 'Super Administrateur', 'level' => 1],
        ];
        
        foreach ($data as $userType) {
            UserType::updateOrCreate(
                ['title' => $userType['title']],
                $userType
            );
        }
    }
}
