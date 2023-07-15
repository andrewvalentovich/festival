<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'content' => 'nullable|string',
            'image' => ['nullable', 'file', 'mimes:jpeg,jpg,bmp,webp,png'],
            'created_at' => 'nullable|date',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Данное поле должно быть строкой',
            'content.string' => 'Данное поле должно быть строкой',
            'image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
            'created_at.date' => 'Данное поле должно быть датой',
        ];
    }
}
