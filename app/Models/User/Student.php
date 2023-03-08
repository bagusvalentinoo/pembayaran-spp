<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'students';

    protected $fillable = [
        'user_id',
        'classroom_id',
        'nisn',
        'nis',
        'address',
        'phone_number'
    ];
}
