<?php

namespace App\Models\School;

use App\Models\User\Student;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'classrooms';

    protected $fillable = [
        'school_id',
        'competency_id',
        'name'
    ];

    // Relationships

    /**
     * Students Relation
     *
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    /**
     * School Relation
     *
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Competency Relation
     *
     * @return BelongsTo
     */
    public function competency(): BelongsTo
    {
        return $this->belongsTo(Competency::class);
    }
}
