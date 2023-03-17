<?php

namespace Database\Seeders\User;

use App\Models\School\Classroom;
use App\Models\School\School;
use App\Models\User\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AddUsersIncludedChildForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();
        $faker = Factory::create('id_ID');
        $schoolSmkOneCimahiId = School::where('name', 'SMK Negeri 1 Cimahi')->first()->id;
        $classroomSmkOneCimahi12RplAId = Classroom::where('name', '12 RPL A')->first()->id;
        $classroomSmkOneCimahi12RplBId = Classroom::where('name', '12 RPL B')->first()->id;

        $userSuperAdmin = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Super Admin 01',
                'username' => 'super_admin_01',
                'email' => 'superadmin01@gmail.com',
                'photo_profile' => 'public/images/user/super-admin/photo_profile/default_photo_profile.jpg',
                'password' => Hash::make('--KFS624Fw98??'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userSuperAdmin->assignRole(['Super Admin']);

        $userSuperAdmin->superAdmin()->create(
            [
                'user_id' => $userSuperAdmin->id,
                'name' => 'Super Admin 01',
                'phone_number' => $faker->phoneNumber(),
                'address' => $faker->address()
            ]
        );

        $userAdmin = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'SMKN 1 Cimahi Admin',
                'username' => 'smkn1_cimahi_admin_01',
                'email' => 'smkn1cimahi@gmail.com',
                'photo_profile' => 'public/images/user/admin/photo_profile/default_photo_profile.jpg',
                'password' => Hash::make('smkn1_cimahi_admin_01'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userAdmin->assignRole(['Admin']);

        $userAdmin->admin()->create(
            [
                'user_id' => $userAdmin->id,
                'school_id' => $schoolSmkOneCimahiId,
                'name' => 'SMKN 1 Cimahi Admin',
                'phone_number' => $faker->phoneNumber(),
                'address' => $faker->address()
            ]
        );

        $userOfficer = (new User())->create(
            [
                'id' => Uuid::uuid4(),
                'name' => 'Maman Suherman',
                'username' => 'maman_suherman',
                'email' => 'mamansuherman@gmail.com',
                'photo_profile' => 'public/images/user/officer/photo_profile/default_photo_profile.jpg',
                'password' => Hash::make('maman_suherman'),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ]
        );
        $userOfficer->assignRole(['Petugas']);

        $userOfficer->officer()->create(
            [
                'user_id' => $userOfficer->id,
                'school_id' => $schoolSmkOneCimahiId,
                'name' => 'Maman Suherman',
                'phone_number' => $faker->phoneNumber(),
                'address' => $faker->address()
            ]
        );

        $userStudentOne = (new User())->create(
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
        $userStudentOne->assignRole(['Siswa']);

        $userStudentOne->student()->create(
            [
                'user_id' => $userStudentOne->id,
                'classroom_id' => $classroomSmkOneCimahi12RplAId,
                'nisn' => '0051322510',
                'nis' => '201114934',
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber()
            ]
        );

        $userStudentTwo = (new User())->create(
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
        $userStudentTwo->assignRole(['Siswa']);

        $userStudentTwo->student()->create(
            [
                'user_id' => $userStudentTwo->id,
                'classroom_id' => $classroomSmkOneCimahi12RplBId,
                'nisn' => '0051322511',
                'nis' => '201114935',
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber()
            ]
        );
    }
}
