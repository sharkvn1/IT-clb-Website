<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguagesRequest extends FormRequest
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
                'name' => ['required', 'string', 'regex:/^[a-zA-Z+#]+$/u', 'min:2', 'max:10'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required', 'regex:/^[a-zA-Z+#]+$/u', 'string', 'min:2', 'max:10'],
            ];
        }
    }
}
