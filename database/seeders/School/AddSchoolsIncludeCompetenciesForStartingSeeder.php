<?php

namespace Database\Seeders\School;

use App\Models\School\Competency;
use App\Models\School\School;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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

        $competencyOne = (new Competency())->create([
            'name' => 'TEKNIK ELEKTRONIKA INDUSTRI'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencyOne->id]);

        $competencyTwo = (new Competency())->create([
            'name' => 'TEKNIK ELEKTRONIKA KOMUNIKASI'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencyTwo->id]);

        $competencyThree = (new Competency())->create([
            'name' => 'TEKNIK OTOMASI INDUSTRI'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencyThree->id]);

        $competencyFour = (new Competency())->create([
            'name' => 'TEKNIK PEMANASAN, TATA UDARA, DAN PENDINGINAN'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencyFour->id]);

        $competencyFive = (new Competency())->create([
            'name' => 'INSTRUMENTASI DAN OTOMATISASI PROSES'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencyFive->id]);

        $competencySix = (new Competency())->create([
            'name' => 'TEKNIK MEKATRONIKA'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencySix->id]);

        $competencySeven = (new Competency())->create([
            'name' => 'SISTEM INFORMASI JARINGAN DAN APLIKASI'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencySeven->id]);

        $competencyEight = (new Competency())->create([
            'name' => 'REKAYASA PERANGKAT LUNAK'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencyEight->id]);

        $competencyNine = (new Competency())->create([
            'name' => 'PRODUKSI DAN SIARAN PROGRAM TELEVISI'
        ]);
        $schoolSmkOneCimahi->competencies()->attach([$competencyNine->id]);
    }
}
