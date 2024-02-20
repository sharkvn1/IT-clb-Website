<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFrameworksRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'name' => ['required', 'string', 'regex:/^[a-zA-Z]+$/g', 'min:5', 'max:30'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required', 'regex:/^[a-zA-Z]+$/g', 'string', 'min:5', 'max:30'],
            ];
        }
    }
}
