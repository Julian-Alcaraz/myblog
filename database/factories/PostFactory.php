<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'titlePost' => fake()->realText(50),
      'contentPost' => fake()->realText(200),
      'habilitated' => 1,
      'idCategory' => random_int(1,2),
      'idUserPoster' => random_int(1,3),
    ];
  }
}
