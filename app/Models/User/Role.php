<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRoleModel;

class Role extends SpatieRoleModel
{
    use HasFactory;

    /**
     * @var array|string[]
     */
    public static array $roleNames = [
        'super-admin' => 'Super Admin',
        'admin' => 'Admin',
        'petugas' => 'Petugas',
        'siswa' => 'Siswa'
    ];
}
