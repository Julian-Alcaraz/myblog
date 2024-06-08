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

    Category::factory()->create(['nameCategory' => 'Tecnología']);
    Category::factory()->create(['nameCategory' => 'Salud']);
    Category::factory()->create(['nameCategory' => 'Estilo de Vida']);
    Category::factory()->create(['nameCategory' => 'Negocios']);

     // Posts para Tecnología (Categoría ID 1)
     Post::factory()->create([
        'titlePost' => 'Innovaciones en Tecnología 2024',
        'idUserPoster' => 1,
        'idCategory' => 1,
        'contentPost' => 'La tecnología está avanzando a pasos agigantados...',
    ]);
    Post::factory()->create([
        'titlePost' => 'El Impacto de la IA en la Sociedad',
        'idUserPoster' => 2,
        'idCategory' => 1,
        'contentPost' => 'La inteligencia artificial está transformando la manera en que vivimos...',
    ]);
    Post::factory()->create([
        'titlePost' => 'Nuevas Tendencias en Hardware',
        'idUserPoster' => 3,
        'idCategory' => 1,
        'contentPost' => 'El hardware sigue evolucionando con nuevas tecnologías...',
    ]);
    Post::factory()->create([
        'titlePost' => 'El Futuro del Software Open Source',
        'idUserPoster' => 1,
        'idCategory' => 1,
        'contentPost' => 'El software de código abierto sigue ganando terreno...',
    ]);

    // Posts para Salud (Categoría ID 2)
    Post::factory()->create([
        'titlePost' => 'Importancia de una Dieta Balanceada',
        'idUserPoster' => 2,
        'idCategory' => 2,
        'contentPost' => 'Una dieta equilibrada es clave para una vida saludable...',
    ]);
    Post::factory()->create([
        'titlePost' => 'Beneficios del Ejercicio Regular',
        'idUserPoster' => 3,
        'idCategory' => 2,
        'contentPost' => 'El ejercicio regular mejora la salud física y mental...',
    ]);
    Post::factory()->create([
        'titlePost' => 'Salud Mental en el Siglo XXI',
        'idUserPoster' => 1,
        'idCategory' => 2,
        'contentPost' => 'La salud mental es una prioridad en la sociedad moderna...',
    ]);
    Post::factory()->create([
        'titlePost' => 'Avances en Medicina Preventiva',
        'idUserPoster' => 2,
        'idCategory' => 2,
        'contentPost' => 'La medicina preventiva está revolucionando el cuidado de la salud...',
    ]);

    // Posts para Estilo de Vida (Categoría ID 3)
    Post::factory()->create([
        'titlePost' => 'Mejorando tu Calidad de Vida',
        'idUserPoster' => 3,
        'idCategory' => 3,
        'contentPost' => 'Pequeños cambios pueden mejorar significativamente tu vida...',
    ]);
    Post::factory()->create([
        'titlePost' => 'Tendencias en Moda y Estilo',
        'idUserPoster' => 1,
        'idCategory' => 3,
        'contentPost' => 'Explora las últimas tendencias en moda y estilo...',
    ]);
    Post::factory()->create([
        'titlePost' => 'El Impacto del Minimalismo',
        'idUserPoster' => 2,
        'idCategory' => 3,
        'contentPost' => 'El minimalismo es más que una tendencia, es un estilo de vida...',
    ]);
    Post::factory()->create([
        'titlePost' => 'Cómo Gestionar el Estrés Cotidiano',
        'idUserPoster' => 3,
        'idCategory' => 3,
        'contentPost' => 'El estrés es una parte de la vida moderna, aprende a gestionarlo...',
    ]);

    // Posts para Negocios (Categoría ID 4)
    Post::factory()->create([
        'titlePost' => 'Estrategias Empresariales para el Éxito',
        'idUserPoster' => 1,
        'idCategory' => 4,
        'contentPost' => 'Descubre las estrategias que pueden llevar a tu empresa al éxito...',
    ]);
    Post::factory()->create([
        'titlePost' => 'Innovación en el Mundo de los Negocios',
        'idUserPoster' => 2,
        'idCategory' => 4,
        'contentPost' => 'La innovación es clave para mantenerse competitivo...',
    ]);
    Post::factory()->create([
        'titlePost' => 'El Futuro del Emprendimiento',
        'idUserPoster' => 3,
        'idCategory' => 4,
        'contentPost' => 'El emprendimiento sigue siendo una de las áreas más dinámicas...',
    ]);
    Post::factory()->create([
        'titlePost' => 'Tendencias en el Comercio Electrónico',
        'idUserPoster' => 1,
        'idCategory' => 4,
        'contentPost' => 'El comercio electrónico está transformando la manera de hacer negocios...',
    ]);
    // Menu toma 'parentId' del valor por defecto (null)
    // Ver posts
    Menu::factory()->create([
        'nameMenu' => 'Posts',
        'urlMenu' => '/post',
        'order' => 1,
      ]);
      MenuRole::factory()->create([
        'idMenu' => '1',
        'idRole' => '1',
      ]);
      MenuRole::factory()->create([
        'idMenu' => '1',
        'idRole' => '2',
      ]);
      MenuRole::factory()->create([
        'idMenu' => '1',
        'idRole' => '3',
      ]);
      // Gestionar Roles
    Menu::factory()->create([
      'nameMenu' => 'Gestionar roles',
      'urlMenu' => '/role',
      'order' => 1,
    ]);
      MenuRole::factory()->create([
        'idMenu' => '2',
        'idRole' => '3',
      ]);

      // Gestionar Usuarios
      Menu::factory()->create([
        'nameMenu' => 'Gestionar usuarios',
        'urlMenu' => '/user',
        'order' => 2,
      ]);
      MenuRole::factory()->create([
        'idMenu' => '3',
        'idRole' => '3',
      ]);
      // Gestionar Menus
      Menu::factory()->create([
        'nameMenu' => 'Gestionar menus',
        'urlMenu' => '/menu',
        'order' => 3,
      ]);
      MenuRole::factory()->create([
        'idMenu' => '4',
        'idRole' => '3',
      ]);
      // Home
    // Menu::factory()->create([
    //   'nameMenu' => 'Home',
    //   'urlMenu' => '/',
    //   'order' => 0,
    // ]);
    //   MenuRole::factory()->create([
    //     'idMenu' => '5',
    //     'idRole' => '1',
    //   ]);
    //   MenuRole::factory()->create([
    //     'idMenu' => '5',
    //     'idRole' => '2',
    //   ]);
    //   MenuRole::factory()->create([
    //     'idMenu' => '5',
    //     'idRole' => '3',
    //   ]);
    Menu::factory()->create([
      'nameMenu' => 'Gestionar categorias',
      'urlMenu' => '/category',
      'order' => 4,
    ]);
      MenuRole::factory()->create([
        'idMenu' => '6',
        'idRole' => '3',
      ]);
    }
}
