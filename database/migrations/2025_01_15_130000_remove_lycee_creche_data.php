<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RemoveLyceeCrecheData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Supprimer les types de classes Lycée et Crèche
        DB::table('class_types')->whereIn('code', ['S', 'C'])->delete();
        
        // Supprimer les classes de Lycée et Crèche
        DB::table('my_classes')->whereIn('name', [
            'Crèche 1', 'Crèche 2', 'Crèche 3',
            '2nde', '1ère', 'Terminale'
        ])->delete();
        
        // Supprimer les paramètres de frais pour Lycée et Crèche
        DB::table('settings')->whereIn('type', [
            'next_term_fees_s', 'next_term_fees_c'
        ])->delete();
        
        // Supprimer les matières associées aux classes supprimées
        DB::table('subjects')->whereIn('name', [
            'Philosophie', 'Économie', 'Littérature'
        ])->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Restaurer les types de classes
        DB::table('class_types')->insert([
            ['name' => 'Crèche', 'code' => 'C'],
            ['name' => 'Lycée (2e cycle)', 'code' => 'S'],
        ]);
        
        // Restaurer les paramètres de frais
        DB::table('settings')->insert([
            ['type' => 'next_term_fees_c', 'description' => '1500'],
            ['type' => 'next_term_fees_s', 'description' => '4000'],
        ]);
    }
}
