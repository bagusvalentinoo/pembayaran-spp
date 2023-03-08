<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'officers';

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'address'
    ];
}
