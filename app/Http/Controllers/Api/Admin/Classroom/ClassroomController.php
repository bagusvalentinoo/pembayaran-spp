<?php

namespace App\Http\Controllers\Api\Admin\Classroom;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\School\Classroom\ClassroomRequest;
use App\Services\Admin\Classroom\ClassroomService;
use Illuminate\Http\JsonResponse;
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
     * Get Classrooms
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $classrooms = $this->classroomService->getClassrooms($request);
        } catch (\Throwable $th) {
            $this->returnCatchThrowableToJsonResponse($th);
        }

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
     * Find Classroom
     *
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function show(string|int $param): JsonResponse
    {
        try {
            $classroom = $this->classroomService->findClassroom($param);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Kelas berhasil didapatkan')
                ->setData([
                    'classroom' => $classroom
                ])
        );
    }

    /**
     * Create Classroom
     *
     * @param ClassroomRequest $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function store(ClassroomRequest $request): JsonResponse
    {
        try {
            $this->classroomService->createClassroom($request);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Berhasil memasukan data Kelas')
        );
    }

    /**
     * Update Classroom
     *
     * @param ClassroomRequest $request
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function update(ClassroomRequest $request, string|int $param): JsonResponse
    {
        try {
            $classroom = $this->classroomService->findClassroom($param);
            $this->classroomService->updateClassroom($request, $classroom);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('update')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Kelas berhasil diperbaharui')
        );
    }

    /**
     * Delete Classroom
     *
     * @param ClassroomRequest $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function destroy(ClassroomRequest $request): JsonResponse
    {
        try {
            $this->classroomService->deleteClassroom($request->input('id'));
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
