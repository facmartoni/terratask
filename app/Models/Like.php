<?php

  namespace App\Models;

  use Database\Factories\LikeFactory;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Like extends Model {
    /** @use HasFactory<LikeFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'comment_id'];
  }
