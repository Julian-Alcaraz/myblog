<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id("idPost");
      $table->string('titlePost', length: 100);
      $table->unsignedBigInteger('idUserPoster');
      $table->foreign('idUserPoster')->references('id')->on('users')->onDelete('cascade');
      $table->unsignedBigInteger('idCategory');
      $table->foreign('idCategory')->references('idCategory')->on('categories')->onDelete('cascade');
      $table->text('contentPost');
      $table->boolean('habilitated')->default(1);// Distinto a la consigna!!!
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
