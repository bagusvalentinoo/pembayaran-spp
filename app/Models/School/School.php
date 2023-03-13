<?php

namespace App\Models\School;

use App\Models\User\Admin;
use App\Models\User\Officer;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'schools';

    protected $fillable = [
        'npsn',
        'address',
        'postal_code',
        'name',
        'telp_number',
        'email',
        'status'
    ];

    // Relationships

    /**
     * Competencies
     *
     * @return HasMany
     */
    public function competencies(): HasMany
    {
        return $this->hasMany(Competency::class);
    }

    /**
     * Admins Relation
     *
     * @return HasMany
     */
    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }

    /**
     * Officers Relation
     *
     * @return HasMany
     */
    public function officers(): HasMany
    {
        return $this->hasMany(Officer::class);
    }

    /**
     * Classrooms Relation
     *
     * @return HasMany
     */
    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }
}
