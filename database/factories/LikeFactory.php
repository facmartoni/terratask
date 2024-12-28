<?php

  namespace Database\Factories;

  use App\Models\Comment;
  use App\Models\Like;
  use App\Models\User;
  use Illuminate\Database\Eloquent\Factories\Factory;

  /**
   * @extends Factory<Like>
   */
  class LikeFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {

      do {
        $user_id = fake()->boolean(70) ?
          User::query()->inRandomOrder()->first()?->id ?? User::factory()->create()->id :
          User::factory()->create()->id;

        $comment_id = fake()->boolean(70) ?
          Comment::query()->inRandomOrder()->first()?->id ?? Comment::factory()->create()->id :
          Comment::factory()->create()->id;
      } while (Like::where('user_id', $user_id)->where('comment_id', $comment_id)->exists());

      return [
        'comment_id' => $comment_id,
        'user_id' => $user_id
      ];
    }
  }
