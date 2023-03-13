<?php

namespace App\Http\Controllers\Api\SuperAdmin\School;

use App\Http\Controllers\Api\ApiController;
use App\Mail\User\SuperAdmin\School\SchoolMail;
use App\Services\SuperAdmin\Admin\AdminService;
use App\Services\SuperAdmin\School\SchoolService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SchoolController extends ApiController
{
    private $schoolService, $adminService;

    public function __construct(SchoolService $schoolService, AdminService $adminService)
    {
        $this->schoolService = $schoolService;
        $this->adminService = $adminService;
    }

    /**
     * Create New School Instead of Admin User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\Http\FormattedResponseException
     */
    public function store(Request $request)
    {
        $randomPassword = $this->setGeneratedRandomPassword(10);
        $school = $this->schoolService->createSchool($request);
        $admin = $this->adminService->createAdmin($request, $school, $randomPassword);
        $data = [
            'subject' => 'Akun Pembayaran SPP',
            'username' => $admin->username,
            'password' => $randomPassword
        ];
        Mail::to($admin->email)->send(new SchoolMail($data));

        return $this->makeJsonResponse(
            $this->makeResponsePayload()
                ->setMessageFromPurpose('create')
                ->setStatusCode(ResponseAlias::HTTP_CREATED)
                ->setMessage('Data Sekolah dan Admin berhasil ditambahkan')
        );
    }
}
