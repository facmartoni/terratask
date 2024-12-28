<?php

  namespace App\Models;

  use Database\Factories\TaskFactory;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Database\Eloquent\Relations\HasMany;

  class Task extends Model {
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    protected $guarded = [];

    public function author(): BelongsTo {
      return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee(): BelongsTo {
      return $this->belongsTo(User::class, 'assigned_to');
    }

    public function comments(): HasMany {
      return $this->hasMany(Comment::class);
    }
  }
