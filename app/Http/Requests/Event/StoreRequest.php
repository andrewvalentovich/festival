<?php

namespace App\Http\Requests\Event;

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
            'title' => 'required|string',
            'date' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Данное поле является обязательным для заполнения',
            'title.string' => 'Данное поле должно быть строкой',
            'description.required' => 'Данное поле является обязательным для заполнения',
            'description.string' => 'Данное поле должно быть строкой',
            'date.required' => 'Данное поле является обязательным для заполнения',
            'date.string' => 'Данное поле должно быть строкой',
            'location.required' => 'Данное поле является обязательным для заполнения',
            'location.string' => 'Данное поле должно быть строкой',
        ];
    }
}
