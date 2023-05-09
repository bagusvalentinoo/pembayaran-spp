<?php

namespace App\Services\Admin\Classroom\Impl;

use App\Models\School\Classroom;
use App\Services\Admin\Classroom\ClassroomService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PHPUnit\Logging\Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ClassroomServiceImpl implements ClassroomService
{
    private $classroomModel;

    public function __construct(Classroom $classroomModel)
    {
        $this->classroomModel = $classroomModel;
    }

    /**
     * Get School Id From Admin Authenticated
     *
     * @return mixed
     */
    public function getSchoolIdFromAdminAuthenticated(): mixed
    {
        return auth()->user()->admin->school->id;
    }

    /**
     * Get Classrooms
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getClassrooms(Request $request): Collection|array
    {
        if ($request->has('search') && $request->filled('search'))
            return $this->classroomModel->query()->where(
                function ($q) use ($request) {
                    $q->where('school_id', $this->getSchoolIdFromAdminAuthenticated())
                        ->where('name', 'LIKE', "%{$request->input('search')}%");
                }
            )->orderBy(
                'competency_id', 'DESC'
            )->get();

        return $this->classroomModel->query()->where(
            function ($q) {
                $q->where('school_id', $this->getSchoolIdFromAdminAuthenticated());
            }
        )->orderBy(
            'competency_id', 'DESC'
        )->get();
    }

    /**
     * Find Classroom
     *
     * @param string|int $param
     * @return Builder|Builder[]|Collection|Model
     */
    public function findClassroom(string|int $param): Model|Collection|Builder|array
    {
        $classroom = $this->classroomModel->query()->find($param);

        if (!$classroom)
            throw new Exception('Data Kelas tidak tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $classroom;
    }

    /**
     * Create Classroom
     *
     * @param Request $request
     * @return Model|Builder
     */
    public function createClassroom(Request $request): Model|Builder
    {
        return $this->classroomModel->query()->create(
            array_filter([
                'school_id' => $this->getSchoolIdFromAdminAuthenticated(),
                'competency_id' => $request->input('competency_id'),
                'name' => $request->input('name')
            ], customArrayFilter())
        );
    }

    /**
     * Update Classroom
     *
     * @param Request $request
     * @param Classroom $classroom
     * @return Classroom
     */
    public function updateClassroom(Request $request, Classroom $classroom): Classroom
    {
        $classroom->update(
            array_filter([
                'school_id' => $this->getSchoolIdFromAdminAuthenticated(),
                'competency_id' => $request->input('competency_id'),
                'name' => $request->input('name')
            ], customArrayFilter())
        );

        return $classroom->refresh();
    }

    /**
     * Delete Classroom
     *
     * @param string|int $param
     * @return bool|mixed|null
     */
    public function deleteClassroom(string|int $param): mixed
    {
        $classroom = $this->classroomModel->query()->find($param);

        if (!$classroom)
            throw new Exception('Data Kelas tidak ditemukan', ResponseAlias::HTTP_BAD_REQUEST);

        return $classroom->delete();
    }
}
