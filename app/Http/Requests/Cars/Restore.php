<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Car;

class Restore extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:cars,id',
            //'vin' => ['required', $this->ruleUniqueVin()]
        ];
    }

    public function attributes() 
    {
        return [
            'id' => 'Идентификатор машины',
            'vin' => 'VIN code'
        ];
    }

    protected function ruleUniqueVin() {
        return Rule::unique(Car::class, 'vin')->withOutTrashed();
    }
    
}