<?php

  namespace App\Models;

  // use Illuminate\Contracts\Auth\MustVerifyEmail;
  use Database\Factories\UserFactory;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Relations\BelongsToMany;
  use Illuminate\Database\Eloquent\Relations\HasMany;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Illuminate\Notifications\Notifiable;
  use Laravel\Fortify\TwoFactorAuthenticatable;
  use Laravel\Jetstream\HasProfilePhoto;
  use Laravel\Sanctum\HasApiTokens;

  class User extends Authenticatable {
    use HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'name',
      'email',
      'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      'password',
      'remember_token',
      'two_factor_recovery_codes',
      'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    // protected $appends = [
    //   'profile_photo_url',
    // ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
      return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
      ];
    }

    public function authored_tasks(): HasMany {
      return $this->hasMany(Task::class, 'created_by');
    }

    public function assigned_tasks(): HasMany {
      return $this->hasMany(Task::class, 'assigned_to');
    }

    public function comments(): HasMany {
      return $this->hasMany(Comment::class);
    }

    public function likes(): BelongsToMany {
      return $this->belongsToMany(Like::class);
    }
  }
