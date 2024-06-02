<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    User::factory()->create([
      'id' => 1,
      'name' => 'TestUser',
      'email' => 'a@a.com',
      'password' => bcrypt('a'),
    ]);
    User::factory()->create([
        'id' => 2,
        'name' => 'SecondUser',
        'email' => 'b@b.com',
        'password' => bcrypt('b'),
      ]);

    Category::factory(2)->create();
    Post::factory(10)->create();
  }
}
