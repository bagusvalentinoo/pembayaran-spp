<?php

namespace App\Http\Controllers\Api\Admin\Classroom;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\School\Classroom\ClassroomRequest;
use App\Services\Admin\Classroom\ClassroomService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ClassroomController extends ApiController
{
    private $classroomService;

    public function __construct(ClassroomService $classroomService)
    {
        $this->classroomService = $classroomService;
    }

    /**
     * Get Classrooms Data
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $classrooms = $this->classroomService->getClassrooms($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil mendapatkan data kelas')
                ->setData([
                    'classrooms' => $classrooms
                ])
        );
    }

    /**
     * Create Clssrooms
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ClassroomRequest $request)
    {
        $this->classroomService->createClassrooms($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Berhasil memasukan data Kelas')
        );
    }

    public function destroy(ClassroomRequest $request)
    {
        try {
            $this->classroomService->deleteClassrooms($request, $request->input('id'));
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('delete')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil menghapus data Kelas')
        );
    }
}
