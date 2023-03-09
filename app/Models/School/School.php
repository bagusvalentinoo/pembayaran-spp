<?php

namespace App\Models\School;

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

    // Relationship

    /**
     * Competencies Relation
     *
     * @return HasMany
     */
    public function competencies(): HasMany
    {
        return $this->hasMany(Competency::class);
    }
}
