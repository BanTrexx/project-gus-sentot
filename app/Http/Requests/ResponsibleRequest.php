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
            'nik'            => 'nullable|string',
            'name'           => 'required|string',
            'address'        => 'required|string',
            'phone_number'   => 'required|string'
        ];
    }
}
