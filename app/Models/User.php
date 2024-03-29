<?php

namespace App\Models;

use DragonCode\Support\Facades\Helpers\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    private const IS_ACTIVE = 1;
    private const IS_ADMIN = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'user_name',
        'first_name',
        'last_name',
        'avatar',
        'phone_number',
    ];

    protected $guarded = [
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function assignedIssue(): BelongsTo
    {
        return $this->belongsTo(Issue::class, 'assignee_id', 'id');
    }

    public function reportedIssue(): BelongsTo
    {
        return $this->belongsTo(Issue::class, 'reporter_id', 'id');
    }

    public function userRoles(): HasMany
    {
        return $this->hasMany(UserRole::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, UserRole::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function setUserNameAttribute($value)
    {
        $this->attributes['user_name'] = Str::slug($value);
    }

    /**
     * Scope a query to only admin users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmin($query)
    {
        return $query->where('is_admin', self::IS_ADMIN);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->where('is_active', self::IS_ACTIVE);
        });
    }
}
