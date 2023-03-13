<?php

namespace Database\Seeders\User;

use App\Models\User\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddRolesForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();

        Role::insert([
            [
                'id' => Uuid::uuid4(),
                'name' => 'Super Admin',
                'guard_name' => 'web',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Petugas',
                'guard_name' => 'web',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Siswa',
                'guard_name' => 'web',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
        ]);
    }
}
