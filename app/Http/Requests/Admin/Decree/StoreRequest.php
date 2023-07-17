<?php

namespace App\Http\Requests\Admin\Decree;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'nullable|string',
            'link' => 'required|string',
            'description' => 'nullable|string',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Данное поле должно быть строкой',
            'link.required' => 'Данное поле является обязательным для заполнения',
            'link.string' => 'Данное поле должно быть строкой',
            'content.string' => 'Данное поле должно быть строкой',
        ];
    }
}
