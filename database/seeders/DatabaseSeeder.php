<?php

  namespace Database\Seeders;

  use App\Models\User;
  use Illuminate\Database\Seeder;

  class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
      // User::factory(20)->create();
      //
      // User::factory()->create([
      //   'name' => 'Test User',
      //   'email' => 'test@example.com',
      // ]);
      //
      // Comment::factory(20)->create();
      //
      // Like::factory(50)->create();

      User::factory()->create([
        'name' => 'Osvaldo',
        'email' => 'osvaldo@budeguer.com',
        'profile_photo_path' => 'images/osvaldo.png'
      ]);

      User::factory()->create([
        'name' => 'Facundo',
        'email' => 'facundo@budeguer.com',
        'profile_photo_path' => 'images/facundo.png'
      ]);
    }
  }
