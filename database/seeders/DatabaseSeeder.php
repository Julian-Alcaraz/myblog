<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Role;
use App\Models\Menu;
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
      'urlMenu'=> '/posts',
    ]);
  }
}
