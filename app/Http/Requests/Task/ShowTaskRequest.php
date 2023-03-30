<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class ShowTaskRequest extends FormRequest
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
            'uuid' => 'required|uuid',
            'type' => 'integer',
            'status' => 'integer',
            'q' => 'string',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'uuid' => $this->route('uuid'),
        ]);

        if ($this->input('type') != null) {
            $this->merge(['type' => $this->input('type')]);
        }

        if ($this->input('status') != null) {
            $this->merge(['status' => $this->input('status')]);
        }
        if ($this->input('q') != null) {
            $this->merge(['q' => $this->input('q')]);
        }
    }
}
