<?php

namespace App\Http\Controllers\Api\Admin\Student;

use App\Exceptions\Http\FormattedResponseException;
use App\Http\Controllers\Api\ApiController;
use App\Services\Admin\Student\StudentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StudentController extends ApiController
{
    private $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Get Students Data
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function index(Request $request): JsonResponse
    {
        $students = $this->studentService->getStudents($request);

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Siswa berhasil didaptkan')
                ->setData([
                    'students' => $students
                ])
        );
    }

    /**
     * Show Detail Student
     *
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function show(string|int $param): JsonResponse
    {
        try {
            $student = $this->studentService->findStudent($param);
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('get')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Siswa berhasil didapatkan')
                ->setData([
                    'student' => $student
                ])
        );
    }

    /**
     * Create Students Include Their Accounts
     *
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function store(Request $request): JsonResponse
    {
        try {

        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Berhasil menambahkan data Siswa')
        );
    }

    /**
     * Update Student
     *
     * @param Request $request
     * @param string|int $param
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function update(Request $request, string|int $param): JsonResponse
    {
        try {

        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('update')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Data Siswa berhasil diperbaharui')
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws FormattedResponseException
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            
        } catch (\Throwable $th) {
            return $this->returnCatchThrowableToJsonResponse($th);
        }

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('delete')
                ->setStatusCode(ResponseAlias::HTTP_OK)
                ->setMessage('Berhasil menghapus data Siswa')
        );
    }
}
