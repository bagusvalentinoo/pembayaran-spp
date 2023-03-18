<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'months';

    protected $fillable = [
        'name'
    ];
}
