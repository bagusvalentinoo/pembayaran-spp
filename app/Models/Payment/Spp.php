<?php

namespace App\Models\Payment;

use App\Models\School\School;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spp extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'spp';

    protected $fillable = [
        'price'
    ];

    // Relationships

    /**
     * Spp Payments Relation
     *
     * @return HasMany
     */
    public function sppPayments(): HasMany
    {
        return $this->hasMany(SppPayment::class);
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
