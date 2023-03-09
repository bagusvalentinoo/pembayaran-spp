<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AddUsersForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();

        $userSuperAdmin = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Super Admin 01',
                'username' => 'super_admin_01',
                'email' => 'superadmin01@gmail.com',
                'photo_profile' => 'public/images/user/super-admin/photo_profile/default_photo_profile.jpg',
                'password' => Hash::make('super_admin_01'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userSuperAdmin->assignRole(['Super Admin']);

        $userAdmin = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Admin 01',
                'username' => 'admin_01',
                'email' => 'admin01@gmail.com',
                'photo_profile' => 'public/images/user/admin/photo_profile/default_photo_profile.jpg',
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
                'photo_profile' => 'public/images/user/officer/photo_profile/default_photo_profile.jpg',
                'password' => Hash::make('petugas_01'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userPetugas->assignRole(['Petugas']);

        $userSiswa = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Tania Dwi Pangesti',
                'username' => 'taniadwi',
                'email' => 'taniadwi@gmail.com',
                'nik' => '3217061504050010',
                'photo_profile' => 'public/images/student/admin/photo_profile/student_01.jpg',
                'password' => Hash::make('taniadwi'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userSiswa->assignRole(['Siswa']);

        $userSiswaTwo = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Mochamad Bagus Valentino Mazid',
                'username' => 'bagusvalentino',
                'email' => 'bagusvaalentino@gmail.com',
                'nik' => '3217062402050010',
                'photo_profile' => 'public/images/student/admin/photo_profile/student_02.jpg',
                'password' => Hash::make('bagusvalentino'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userSiswaTwo->assignRole(['Siswa']);
    }
}
