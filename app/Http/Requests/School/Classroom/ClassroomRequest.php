<?php

namespace App\Http\Requests\School\Classroom;

use App\Http\Requests\RequestResource;
use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest implements RequestResource
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];

        switch ($this->method()) {
            case 'POST':
                $rules = $this->getCreateRules();
                break;
            case 'PUT':
                $rules = $this->getUpdateRules();
                break;
            case 'DELETE':
                $rules = $this->getDeleteRules();
                break;
        }

        return $rules;
    }

    /**
     * Get Create Rules
     *
     * @return array
     */
    public function getCreateRules(): array
    {
        return [
            'name' => 'required|array',
            'competency' => 'required|array'
        ];
    }

    /**
     * Get Update Rules
     *
     * @return array
     */
    public function getUpdateRules(): array
    {
        return [

        ];
    }

    /**
     * Get Delete Rules
     *
     * @return array
     */
    public function getDeleteRules(): array
    {
        return [
            'id.*' => [
                'required', 'array'
            ],
            'id.*' => [
                'required', 'uuid'
            ]
        ];
    }

    /**
     * Get Custom Message Error
     *
     * @return array
     */
//    public function messages(): array
//    {
//        return [
//            'id.required' => 'Id wajib diisi',
//            'id.array' => 'Id wajib array',
//            'id.uuid' => 'Id wajib uuid',
//
//            'name.required' => 'Nama Kelas wajib diisi',
//            'name.array' => 'Nama Kelas wajib array',
//            'competency.required' => 'Kompetensi Kelas wajib diisi',
//            'competency.array' => 'Kompetensi Kelas wajib array',
//        ];
//    }
}
