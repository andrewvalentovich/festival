<?php

namespace App\Http\Requests\Admin\Article;

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
            'content' => 'nullable|string|max:16777215',
            'video' => 'nullable|string|max:65535',
            'image' => ['nullable', 'file', 'mimes:jpeg,jpg,bmp,webp,png'],
            'created_at' => ['nullable', 'regex:/^(\d{2})\/(\d{2})\/(\d{4}) (\d{2}):(\d{2}):(\d{2})$/i'],
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
            'content.max' => 'Данное поле не должно превышать :max символов',
            'video.max' => 'Данное поле не должно превышать :max символов',
            'image.mimes' => 'Прикреплённый файл должен быть: jpeg,jpg,bmp или png',
            'created_at.regex' => 'Данное поле должно быть датой',
        ];
    }
}
