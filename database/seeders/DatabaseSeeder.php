<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Role;
use App\Models\Menu;
use App\Models\MenuRole;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // Roles
    Role::factory()->create([
      'nameRole' => 'Usuario',
    ]);
    Role::factory()->create([
      'nameRole' => 'Moderador',
    ]);
    Role::factory()->create([
      'nameRole' => 'Admin',
    ]);
    // Usuarios
    // Rol: Por defecto 1 (usuario)
    User::factory()->create([
      'name' => 'usuario',
      'email' => 'u@u.com',
      'password' => bcrypt('u'),
    ]);
    // Rol: Moderador
    User::factory()->create([
      'name' => 'moderador',
      'email' => 'm@m.com',
      'password' => bcrypt('m'),
      'idRole' => 2,
    ]);
    // Rol: Admin
    User::factory()->create([
      'name' => 'admin',
      'email' => 'a@a.com',
      'password' => bcrypt('a'),
      'idRole' => 3,
    ]);
    Category::factory(2)->create();
    Post::factory(10)->create();

    // Toma parentId del valor por defecto (null)
    // Toma el order del valor por defecto (0)
    Menu::factory()->create([
      'nameMenu' => 'Ver posts',
      'urlMenu' => '/post',
    ]);
    // Ver posts
    MenuRole::factory()->create([
      'idMenu' => '1',
      'idRole'=> '1',
    ]);
    MenuRole::factory()->create([
      'idMenu' => '1',
      'idRole'=> '2',
    ]);
    MenuRole::factory()->create([
      'idMenu' => '1',
      'idRole'=> '3',
    ]);
    // Gestionar Roles
    Menu::factory()->create([
      'nameMenu' => 'Gestionar roles',
      'urlMenu' => '/role',
      'order' => 1,
    ]);
    MenuRole::factory()->create([
      'idMenu' => '2',
      'idRole'=> '3',
    ]);
    // Gestionar Usuarios
    Menu::factory()->create([
      'nameMenu' => 'Gestionar usuarios',
      'urlMenu' => '/user',
      'order' => 2,
    ]);
    MenuRole::factory()->create([
      'idMenu' => '3',
      'idRole'=> '3',
    ]);

    /*
      $table->id('idMenu');
      $table->string('nameMenu', 30);
      $table->string('urlMenu', 100);
      $table->integer('parentId')->nullable();
      $table->integer('order')->default(0);
      $table->boolean('habilitated')->default(1);
      $table->timestamps();
    

    */
  }
}
