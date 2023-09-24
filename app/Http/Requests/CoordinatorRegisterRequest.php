<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoordinatorRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nik'      => 'required|string|unique:coordinators,nik',
            'email'    => 'required|email|unique:coordinators,email',
            'password' => 'required|string|confirmed|min:8',
        ];
    }
}
