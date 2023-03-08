<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\User\AddRolesForStartingSeeder;
use Database\Seeders\User\AddUsersForStartingSeeder;
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
                AddUsersForStartingSeeder::class,
            ]
        );
    }
}
