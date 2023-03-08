<?php

namespace App\Helpers\Http;

use App\Exceptions\Http\FormattedResponseException;
use Symfony\Component\HttpFoundation\Response;

class FormattedResponse
{
    private mixed $data;
    private ?array $errors;
    private string $message;
    private int $statusCode;

    public function __construct()
    {
        $this->statusCode = Response::HTTP_OK;
        $this->message = "";
        $this->errors = null;
        $this->data = null;
    }

    /**
     * Set Status Code
     *
     * @param int $statusCode
     * @return self
     * @throws FormattedResponseException
     */
    public function setStatusCode(int $statusCode): self
    {
        if ($statusCode < 100 || $statusCode > 511) {
            throw new FormattedResponseException(trans('formatted_response.statusCode.invalid'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Get Status Code
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Set Message
     *
     * @param string $message
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Set Message
     *
     * @param string $purpose ['get', 'create', 'update', 'delete', 'login', 'logout', 'upload', 'export', 'export-queue']
     * @return self
     */
    public function setMessageFromPurpose(string $purpose): self
    {
        $this->message = match ($purpose) {
            "get" => trans('formatted_response.message.purpose.get'),
            "create" => trans('formatted_response.message.purpose.create'),
            "update" => trans('formatted_response.message.purpose.update'),
            "delete" => trans('formatted_response.message.purpose.delete'),
            "login" => trans('formatted_response.message.purpose.login'),
            "logout" => trans('formatted_response.message.purpose.logout'),
            "upload" => trans('formatted_response.message.purpose.upload'),
            "export" => trans('formatted_response.message.purpose.export'),
            "export-queue" => trans('formatted_response.message.purpose.export_queue'),
        };

        return $this;
    }

    /**
     * Set Status Code
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set Errors
     *
     * @param array $errors
     * @return FormattedResponse
     */
    public function setErrors(array $errors): self
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * Get Errors
     *
     * @return array|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Set Data
     *
     * @param mixed $data
     * @return self
     */
    public function setData(mixed $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get Data
     *
     * @return mixed
     */
    public function getData(): mixed
    {
        return $this->data;
    }
}
