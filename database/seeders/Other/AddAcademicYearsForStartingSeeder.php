<?php

namespace Database\Seeders\Other;

use App\Models\Other\AcademicYear;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddAcademicYearsForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();

        AcademicYear::insert([
            [
                'id' => Uuid::uuid4(),
                'name' => '2023-2024',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ]
        ]);
    }
}
