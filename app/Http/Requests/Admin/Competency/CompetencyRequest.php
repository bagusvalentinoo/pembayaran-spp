<?php

namespace App\Http\Requests\Admin\Competency;

use App\Http\Requests\RequestResource;
use Illuminate\Foundation\Http\FormRequest;

class CompetencyRequest extends FormRequest implements RequestResource
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            'name' => [
                'required'
            ]
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
            'name' => [
                'required'
            ]
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
            'id' => [
                'required'
            ]
        ];
    }

    /**
     * Custom Error Message
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama Kompetensi wajib diisi',
            'id.required' => 'Id Kompetensi wajib diisi',
        ];
    }
}
