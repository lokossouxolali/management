<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('series_id')->nullable();
            $table->string('full_name', 200); // Nom complet généré automatiquement
            $table->string('code', 50)->unique(); // Code unique pour identifier la classe
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            // Index pour optimiser les requêtes
            $table->index(['section_id', 'series_id']);
            $table->index('active');
        });

        // Contrainte d'unicité pour éviter les doublons
        Schema::table('class_sections', function (Blueprint $table) {
            $table->unique(['section_id', 'series_id'], 'unique_section_series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_sections');
    }
}
