<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException as ExceptionsHttpResponseException;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required_without_all:email,password', 'string', 'max:255'],
            'email' => ['required_without_all:name,password', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required_without_all:email,name', 'string', 'min:8'],
            'uuid' => ['required', 'uuid']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = response()->json([
            'data' => $errors->messages(),
            'message' => 'Invalid data send',
            'success' => false,

        ], 400);

        throw new ExceptionsHttpResponseException($response);
    }
}
