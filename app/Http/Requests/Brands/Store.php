<?php

namespace App\Http\Requests\Brands;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Brand;

class Store extends FormRequest
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
        return [
            'title' => [ 'required', 'min:2', 'max:128', $this->titleUniqueRule() ],
            'description' => 'required|min:2|max:256',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    protected function titleUniqueRule() {
        return  Rule::unique(Brand::class, 'title');
    }
}
