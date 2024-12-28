<?php

  use App\Models\User;
  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
      Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->foreignIdFor(User::class, 'created_by');
        $table->foreignIdFor(User::class, 'assigned_to')->nullable();
        $table->string('title');
        $table->text('description')->nullable();
        $table->integer('priority')->default(1);
        $table->boolean('completed')->default(false);
        $table->text('photo_url')->nullable();
        $table->decimal('latitude', 10, 8)->nullable();
        $table->decimal('longitude', 11, 8)->nullable();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
      Schema::dropIfExists('tasks');
    }
  };
