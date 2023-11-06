<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
{
    public function ruleModelExists() 
    {
        return parent::ruleModelExists()->ignore($this->car->id);
    }
    
}
