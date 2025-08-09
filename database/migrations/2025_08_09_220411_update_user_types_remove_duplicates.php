<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateUserTypesRemoveDuplicates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Supprimer les doublons en gardant le plus récent ID pour chaque title
        DB::statement("
            DELETE t1 FROM user_types t1
            INNER JOIN user_types t2
            WHERE t1.id < t2.id AND t1.title = t2.title;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Pas de rollback spécifique car c'est un nettoyage
        // Les doublons ne peuvent pas être restaurés automatiquement
    }
}