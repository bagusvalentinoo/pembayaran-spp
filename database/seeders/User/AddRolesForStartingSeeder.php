<?php

namespace Database\Seeders\User;

use App\Models\User\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddRolesForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'id' => Uuid::uuid4(),
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Petugas',
                'guard_name' => 'web'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Siswa',
                'guard_name' => 'web'
            ],
        ]);
    }
}
