<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamsUniqueConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            // Supprimer l'ancienne contrainte unique
            $table->dropUnique(['term', 'year']);
            
            // Ajouter la nouvelle contrainte unique incluant period_type
            $table->unique(['term', 'year', 'period_type'], 'exams_term_year_period_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            // Supprimer la nouvelle contrainte unique
            $table->dropUnique('exams_term_year_period_unique');
            
            // Restaurer l'ancienne contrainte unique
            $table->unique(['term', 'year']);
        });
    }
}
