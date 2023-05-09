<?php

namespace App\Services\Admin\Student;

use App\Models\User\Student;
use Illuminate\Http\Request;

interface StudentService
{
    public function getSchoolIdFromAdminAuthenticated();

    public function getStudents(Request $request);

    public function findStudent(string|int $param);

    public function createStudent(Request $request);

    public function updateStudent(Request $request, Student $student);

    public function deleteStudent(Student $student);
}
