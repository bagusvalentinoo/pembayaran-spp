<?php

namespace Database\Seeders\School;

use App\Models\School\Classroom;
use App\Models\School\Competency;
use App\Models\School\School;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AddClassroomsForStartingSeeder extends Seeder
{
    private $competencyModel, $classroomModel, $schoolModel;

    public function __construct(Competency $competencyModel, Classroom $classroomModel, School $schoolModel)
    {
        $this->competencyModel = $competencyModel;
        $this->classroomModel = $classroomModel;
        $this->schoolModel = $schoolModel;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carbonNow = Carbon::now();

        $competencyOneId = $this->competencyModel->where(
            function ($q) {
                $q->where('name', 'REKAYASA PERANGKAT LUNAK');
            }
        )->first()->id;

        $schoolSmkOneCimahiId = $this->schoolModel->where(
            function ($q) {
                $q->where('name', 'SMK Negeri 1 Cimahi');
            }
        )->first()->id;

        $classroomCompetencyOne = $this->classroomModel->insert([
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahiId,
                'competency_id' => $competencyOneId,
                'name' => '10 RPL A',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahiId,
                'competency_id' => $competencyOneId,
                'name' => '10 RPL B',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahiId,
                'competency_id' => $competencyOneId,
                'name' => '11 RPL A',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahiId,
                'competency_id' => $competencyOneId,
                'name' => '11 RPL B',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahiId,
                'competency_id' => $competencyOneId,
                'name' => '12 RPL A',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahiId,
                'competency_id' => $competencyOneId,
                'name' => '12 RPL B',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
            [
                'id' => Uuid::uuid4(),
                'school_id' => $schoolSmkOneCimahiId,
                'competency_id' => $competencyOneId,
                'name' => '12 RPL C',
                'created_at' => $carbonNow,
                'updated_at' => $carbonNow
            ],
        ]);
    }
}
