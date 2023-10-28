<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class Save extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:30',
            'content' => 'required|min:5|max:60'
        ];
    }

    public function attributes() {
        return [
            'title' => 'Заголовок',
            'content' => 'Текст'
        ];
    }
}
