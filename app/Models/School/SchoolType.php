<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolType extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'school_types';

    protected $fillable = [
        'name'
    ];

    // Relationship

    /**
     * Schools Relation
     *
     * @return HasMany
     */
    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }
}
