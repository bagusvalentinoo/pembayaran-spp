<?php

namespace Database\Seeders\School;

use App\Models\School\School;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddSchoolsIncludeCompetenciesForStartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();

        $schoolSmkOneCimahi = (new School())->create([
            'npsn' => '20224136',
            'address' => 'Jl. Mahar Martanegara No.48, Utama, Kec. Cimahi Sel., Kota Cimahi, Jawa Barat 40521',
            'postal_code' => '40521',
            'name' => 'SMK Negeri 1 Cimahi',
            'telp_number' => '0226629683',
            'email' => 'info@smkn1-cmi.sch.id',
            'created_at' => $carbonNow,
            'updated_at' => $carbonNow
        ]);

        $schoolSmkOneCimahi->competencies()->insert([
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'TEKNIK ELEKTRONIKA INDUSTRI',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'TEKNIK ELEKTRONIKA KOMUNIKASI',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'TEKNIK OTOMASI INDUSTRI',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'TEKNIK PEMANASAN, TATA UDARA, DAN PENDINGINAN',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'INSTRUMENTASI DAN OTOMATISASI PROSES',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'TEKNIK MEKATRONIKA',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'SISTEM INFORMASI JARINGAN DAN APLIKASI',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'REKAYASA PERANGKAT LUNAK',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahi->id,
                'name' => 'PRODUKSI DAN SIARAN PROGRAM TELEVISI',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ]
        ]);
    }
}
