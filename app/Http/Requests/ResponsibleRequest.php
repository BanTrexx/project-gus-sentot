<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResponsibleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'coordinator_id' => 'required|int|exists:coordinators,id',
            'nik'            => ['required','string', Rule::unique('responsibles')->ignore($this->nik, 'nik')],
            'name'           => 'sometimes|required|string',
            'address'        => 'sometimes|required|string',
        ];
    }
}
