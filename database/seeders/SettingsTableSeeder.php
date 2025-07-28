<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2024-2025'],
            ['type' => 'system_title', 'description' => 'Système de Gestion Scolaire'],
            ['type' => 'system_name', 'description' => 'École Excellence'],
            ['type' => 'term_ends', 'description' => '30/06/2025'],
            ['type' => 'term_begins', 'description' => '01/09/2024'],
            ['type' => 'phone', 'description' => '+33 1 23 45 67 89'],
            ['type' => 'address', 'description' => '123 Rue de l\'Éducation, 75001 Paris, France'],
            ['type' => 'system_email', 'description' => 'contact@ecole-excellence.fr'],
            ['type' => 'alt_email', 'description' => 'admin@ecole-excellence.fr'],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => ''],
            ['type' => 'next_term_fees_j', 'description' => '2500'],
            ['type' => 'next_term_fees_pn', 'description' => '3000'],
            ['type' => 'next_term_fees_p', 'description' => '3500'],
            ['type' => 'next_term_fees_n', 'description' => '4000'],
            ['type' => 'next_term_fees_s', 'description' => '4500'],
            ['type' => 'next_term_fees_c', 'description' => '2000'],
        ];

        DB::table('settings')->insert($data);

    }
}
