<?php

namespace App\Services\Classroom;

use Illuminate\Http\Request;

interface ClassroomService
{
    public function getClassrooms(Request $request);

    public function createClassrooms(Request $request);

    public function updateClassrooms(Request $request, array $classroomIds);

    public function deleteClassrooms(Request $request, array $classroomIds);
}
