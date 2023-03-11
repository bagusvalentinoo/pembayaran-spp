<?php

namespace App\Models\User;

use App\Models\School\School;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'admins';

    protected $fillable = [
        'user_id',
        'school_id',
        'name',
        'phone_number',
        'address'
    ];

    // Relationships

    /**
     * User Relation
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
