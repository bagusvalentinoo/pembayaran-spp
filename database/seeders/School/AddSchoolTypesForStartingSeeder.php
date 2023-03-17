<?php

namespace Database\Seeders\School;

use App\Models\School\SchoolType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddSchoolTypesForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();

        SchoolType::insert([
            [
                'id' => Uuid::uuid4(),
                'name' => 'SD',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'SMP',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'SMA',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'SMK',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ]
        ]);
    }
}
