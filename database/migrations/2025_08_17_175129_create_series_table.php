<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100); // Nom de la série (ex: "Série S", "Série ES", "Série L")
            $table->string('code', 10); // Code court (ex: "S", "ES", "L", "STI2D")
            $table->enum('type', ['générale', 'technique'])->default('générale'); // Type de série
            $table->text('description')->nullable(); // Description de la série
            $table->boolean('active')->default(true); // Si la série est active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
