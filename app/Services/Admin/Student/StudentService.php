<?php

namespace App\Services\Admin\Student;

use App\Models\User\Student;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface StudentService
{
    /**
     * Get Students
     *
     * @param Request $request
     * @return Builder[]|Collection
     */
    public function getStudents(Request $request): Collection|array;

    /**
     * Find Student
     *
     * @param int|string $param
     * @return mixed
     * @throws Exception
     */
    public function findStudent(string|int $param): mixed;

    /**
     * Create Students Include Their Accounts
     *
     * @param Request $request
     * @param string $randomPassword
     * @return array
     * @throws Exception
     */
    public function createStudents(Request $request, string $randomPassword): array;

    /**
     * Update Student
     *
     * @param Request $request
     * @param Student $student
     * @return Student|mixed
     */
    public function updateStudent(Request $request, Student $student): mixed;

    /**
     * Delete Students
     *
     * @param Request $request
     * @param array $studentIds
     * @return bool
     */
    public function deleteStudents(Request $request, array $studentIds): bool;
}
