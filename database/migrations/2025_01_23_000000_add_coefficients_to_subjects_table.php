<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoefficientsToSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('coefficient')->default(1)->after('teacher_id');
            $table->boolean('is_core_subject')->default(false)->after('coefficient');
            $table->decimal('max_score', 5, 2)->default(20.00)->after('is_core_subject');
            $table->text('description')->nullable()->after('max_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn(['coefficient', 'is_core_subject', 'max_score', 'description']);
        });
    }
}
