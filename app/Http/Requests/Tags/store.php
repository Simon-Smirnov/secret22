<?php

namespace App\Http\Requests\Tags;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|unique:tags,title'
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Title'
        ];
    }
}
