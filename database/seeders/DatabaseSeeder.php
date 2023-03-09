<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Other\AddAcademicYearsForStartingSeeder;
use Database\Seeders\Other\AddSemestersForStartingSeeder;
use Database\Seeders\School\AddSchoolsInsteadOfCompetenciesForStartingSeeder;
use Database\Seeders\User\AddRolesForStartingSeeder;
use Database\Seeders\User\AddUsersInsteadOfChildForStartingSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                AddRolesForStartingSeeder::class,
                AddUsersInsteadOfChildForStartingSeeder::class,
                AddAcademicYearsForStartingSeeder::class,
                AddSemestersForStartingSeeder::class,
                AddSchoolsInsteadOfCompetenciesForStartingSeeder::class,
            ]
        );
    }
}
