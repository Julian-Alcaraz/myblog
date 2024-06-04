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
    Schema::create('menu_roles', function (Blueprint $table) {
      $table->unsignedBigInteger('idMenu');
      $table->foreign('idMenu')->references('idMenu')->on('menus')->onDelete('cascade');
      $table->unsignedBigInteger('idRole');
      $table->foreign('idRole')->references('idRole')->on('roles')->onDelete('cascade');
      $table->boolean('habilitated')->default(1);
      $table->primary(['idMenu', 'idRole']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('menu_roles');
  }
};
