<?php

  namespace Database\Factories;

  use App\Models\Task;
  use App\Models\User;
  use Illuminate\Database\Eloquent\Factories\Factory;

  /**
   * @extends Factory<Task>
   */
  class TaskFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
      return [
        'created_by' => User::factory(),
        'assigned_to' => fake()->boolean(80) ? User::factory() : null,
        'title' => fake()->sentence(3),
        'description' => fake()->realText(250),
        'priority' => fake()->randomElement([1, 2, 3]),
        'completed' => fake()->boolean(75),
        'photo_url' => 'https://picsum.photos/id/' . fake()->numberBetween(1, 300) . '/200',
        'latitude' => fake()->latitude(),
        'longitude' => fake()->longitude()
      ];
    }
  }
