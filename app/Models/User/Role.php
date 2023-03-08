<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRoleModel;

class Role extends SpatieRoleModel
{
    use HasFactory;

    /**
     * @var array|string[]
     */
    public static array $roleNames = [
        'admin' => 'Admin',
        'petugas' => 'Petugas',
        'siswa' => 'Siswa'
    ];
}
