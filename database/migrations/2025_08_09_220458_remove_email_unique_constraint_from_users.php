<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEmailUniqueConstraintFromUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Vérifier si l'index existe avant de le supprimer
            $indexes = \DB::select("SHOW INDEX FROM users WHERE Column_name = 'email' AND Non_unique = 0");
            if (!empty($indexes)) {
                $table->dropUnique(['email']);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remettre la contrainte unique sur l'email si besoin (rollback)
            $table->string('email', 100)->unique()->nullable()->change();
        });
    }
}