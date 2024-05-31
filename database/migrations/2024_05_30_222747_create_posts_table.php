<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*

id Autoincremental
title String
poster String
Habilitated Booleano por defecto: false
content Text
timestamps Timestamps de Eloquent

*/
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('idPost');
            $table->string('titlePost', length: 100);
            $table->string('poster'); // idUsuarioPoster ?
            $table->text('contentPost'); 
            $table->boolean('habilitated')->default(false);
            //$table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
