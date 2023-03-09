<?php

namespace Database\Seeders\Other;

use App\Models\Other\Semester;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddSemestersForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();

        Semester::insert([
            [
                'id' => Uuid::uuid4(),
                'name' => 'Ganjil',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Genap',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ]
        ]);
    }
}
