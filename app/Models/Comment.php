<?php

  namespace App\Models;

  use Database\Factories\CommentFactory;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Database\Eloquent\Relations\BelongsToMany;
  use Illuminate\Database\Eloquent\Relations\HasMany;

  class Comment extends Model {
    /** @use HasFactory<CommentFactory> */
    use HasFactory;

    protected $guarded = [];

    public function author(): BelongsTo {
      return $this->belongsTo(User::class);
    }

    public function task(): BelongsTo {
      return $this->belongsTo(Task::class);
    }

    public function parent(): BelongsTo {
      return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function children(): HasMany {
      return $this->hasMany(Comment::class, 'parent_id');
    }

    public function likes(): BelongsToMany {
      return $this->belongsToMany(
        User::class,
        'likes',
      );
    }
  }
