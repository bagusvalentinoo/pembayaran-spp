<?php

namespace App\Models\School;

use App\Models\User\Admin;
use App\Models\User\Officer;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
     * Competencies Relation
     *
     * @return BelongsToMany
     */
    public function competencies(): BelongsToMany
    {
        return $this->belongsToMany(
            Competency::class,
            'school_competency',
            'school_id'
        );
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
}
