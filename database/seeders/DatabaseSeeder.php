<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTypesTableSeeder::class,
            ClassTypesTableSeeder::class,
            MyClassesTableSeeder::class,
            SeriesTableSeeder::class,
            SectionsTableSeeder::class,
            ClassSectionsTableSeeder::class,
            UsersTableSeeder::class,
            SettingsTableSeeder::class,
            BloodGroupsTableSeeder::class,
            StatesTableSeeder::class,
            LgasTableSeeder::class,
            NationalitiesTableSeeder::class,
            SubjectsTableSeeder::class,
            SubjectCoefficientsSeeder::class,
            SkillsTableSeeder::class,
            GradesTableSeeder::class,
            StudentRecordsTableSeeder::class,
        ]);
    }
}
