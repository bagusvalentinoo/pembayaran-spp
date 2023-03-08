<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Ramsey\Uuid\Uuid;

class AddUsersForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();

        $userAdmin = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Admin 01',
                'username' => 'admin_01',
                'email' => 'admin01@gmail.com',
                'nik' => '3217062402050010',
                'photo_profile' => '',
                'password' => Hash::make('admin_01'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userAdmin->assignRole(['Admin']);

        $userPetugas = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Petugas 01',
                'username' => 'petugas_01',
                'email' => 'petugas01@gmail.com',
                'nik' => '3217061404070020',
                'photo_profile' => '',
                'password' => Hash::make('petugas_01'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userPetugas->assignRole(['Petugas']);

        $userSiswa = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Siswa 01',
                'username' => 'siswa_01',
                'email' => 'siswa01@gmail.com',
                'nik' => '3217061501050030',
                'photo_profile' => '',
                'password' => Hash::make('siswa_01'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userSiswa->assignRole(['Siswa']);

        $userSiswaTwo = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Siswa 02',
                'username' => 'siswa_02',
                'email' => 'siswa02@gmail.com',
                'nik' => '3217051111040020',
                'photo_profile' => '',
                'password' => Hash::make('siswa_02'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userSiswaTwo->assignRole(['Siswa']);
    }
}
