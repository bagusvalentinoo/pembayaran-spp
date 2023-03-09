<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'academic_years';
    
    protected $fillable = [
        'name'
    ];
}
