<?php

  namespace Database\Factories;

  use App\Models\Comment;
  use App\Models\Task;
  use App\Models\User;
  use Illuminate\Database\Eloquent\Factories\Factory;

  /**
   * @extends Factory<Comment>
   */
  class CommentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
      return [
        'task_id' =>
          fake()->boolean(50) ?
            Task::query()->inRandomOrder()->first()?->id ?? Task::factory() :
            Task::factory(),
        'parent_id' =>
          fake()->boolean(30) ?
            Comment::query()->inRandomOrder()->first()?->id :
            null,
        'author_id' => User::factory(),
        'content' =>
          fake()->boolean(50) ?
            fake()->sentence(30) :
            fake()->sentence(60)
      ];
    }
  }
