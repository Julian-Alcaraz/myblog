<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'nameMenu' => fake()->realText(10),
      'urlMenu' => fake()->realText(20),
      'habilitated' => 1,
      'parentId' => null,
      'order' => 0,
    ];
  }
}