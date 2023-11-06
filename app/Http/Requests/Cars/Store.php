<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'manufacturer' => 'required|min:2|max:64',
            'model' => [
                'required', 
                'min:2',
                'max:64',
                $this->ruleModelExists()
            ],
            'price' => 'required|integer|max:990000000|multiple_of:1000',
            'transmission' => [
                Rule::in(array_keys(config('car.transmission'))),
            ]
        ];
    }

    public function attributes() 
    {
        return [
            'manufacturer' => 'Manufacturer',
            'model' => 'Model',
            'price' => 'Price',
        ];
    }

    public function ruleModelExists() 
    {
        return Rule::unique('cars');
    }
    
}
