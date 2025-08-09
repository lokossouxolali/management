<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLibraryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Supprimer les clés étrangères d'abord
        if (Schema::hasTable('book_requests')) {
            Schema::table('book_requests', function (Blueprint $table) {
                $table->dropForeign(['book_id']);
                $table->dropForeign(['user_id']);
            });
        }
        
        if (Schema::hasTable('books')) {
            Schema::table('books', function (Blueprint $table) {
                $table->dropForeign(['my_class_id']);
            });
        }
        
        // Supprimer les tables
        Schema::dropIfExists('book_requests');
        Schema::dropIfExists('books');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Recréer la table books
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();
            $table->text('description')->nullable();
            $table->string('book_code')->unique();
            $table->unsignedBigInteger('my_class_id')->nullable();
            $table->timestamps();
        });

        // Recréer la table book_requests
        Schema::create('book_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamp('request_date');
            $table->timestamp('return_date')->nullable();
            $table->enum('status', ['pending', 'approved', 'returned'])->default('pending');
            $table->timestamps();
        });

        // Recréer les clés étrangères
        Schema::table('books', function (Blueprint $table) {
            $table->foreign('my_class_id')->references('id')->on('my_classes')->onDelete('cascade');
        });

        Schema::table('book_requests', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}