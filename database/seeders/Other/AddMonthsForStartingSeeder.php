<?php

namespace Database\Seeders\Other;

use App\Models\Other\Month;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddMonthsForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Month::insert([
            [
                'id' => Uuid::uuid4(),
                'name' => 'Januari'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Februari'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Maret'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'April'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Mei'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Juni'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'July'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Agustus'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'September'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Oktober'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'November'
            ],
            [
                'id' => Uuid::uuid4(),
                'name' => 'Desember'
            ]
        ]);
    }
}
