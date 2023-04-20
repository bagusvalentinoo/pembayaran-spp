<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'nik',
        'photo_profile',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships

    /**
     * Super Admin Relation
     *
     * @return HasOne
     */
    public function superAdmin(): HasOne
    {
        return $this->hasOne(SuperAdmin::class);
    }

    /**
     * Admin Relation
     *
     * @return HasOne
     */
    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }

    /**
     * Officer Relation
     *
     * @return HasOne
     */
    public function officer(): HasOne
    {
        return $this->hasOne(Officer::class);
    }

    /**
     * Student Relation
     *
     * @return HasOne
     */
    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
