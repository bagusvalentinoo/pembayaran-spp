<?php

namespace App\Models\User;

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
        'name',
        'phone_number',
        'address'
    ];

    // Relationship

    /**
     * User Relation
     * 
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
