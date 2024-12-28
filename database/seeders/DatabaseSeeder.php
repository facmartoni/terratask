<?php

  namespace Database\Seeders;

  use App\Models\Comment;
  use App\Models\Like;
  use App\Models\User;
  use Illuminate\Database\Seeder;

  class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
      User::factory(20)->create();

      User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
      ]);

      Comment::factory(20)->create();

      Like::factory(50)->create();
    }
  }
