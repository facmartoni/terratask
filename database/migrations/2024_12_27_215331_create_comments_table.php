<?php

  use App\Models\Comment;
  use App\Models\Task;
  use App\Models\User;
  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
      Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->foreignIdFor(Task::class)->constrained()->cascadeOnDelete();
        $table->foreignIdFor(Comment::class, 'parent_id')->nullable()->constrained()->cascadeOnDelete();
        $table->foreignIdFor(User::class, 'author_id');
        $table->text('content');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
      Schema::dropIfExists('comments');
    }
  };
