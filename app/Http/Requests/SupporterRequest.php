<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupporterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'responsible_id' => 'required|int|exists:responsibles,id',
            'nik'            => 'required|string|unique:supporters',
            'address'        => 'sometimes|required|string',
            'name'           => 'sometimes|required|string',
            'dpt_tps'        => 'sometimes|required|string',
            'phone_number'   => 'required|string',
            'rt'             => 'required|string',
            'rw'             => 'required|string',
        ];
    }
}
