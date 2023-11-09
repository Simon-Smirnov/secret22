<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Car;

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
            ],
            'vin' => ['required', 'min:4', 'max:14', $this->ruleUniqueVin()]
        ];
    }

    public function attributes() 
    {
        return [
            'manufacturer' => 'Manufacturer',
            'model' => 'Model',
            'price' => 'Price',
            'transmission' => 'Type of transmission',
            'vin' => 'VIN code'
        ];
    }

    protected function ruleModelExists() 
    {
        return Rule::unique('cars');
    }

    protected function ruleUniqueVin() {
        return Rule::unique(Car::class, 'vin');
    }
    
}
