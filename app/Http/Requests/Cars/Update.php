<?php

namespace App\Http\Requests\Cars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends Store
{
    protected function ruleModelExists() 
    {
        return parent::ruleModelExists()->ignore($this->car->id);
    }

    protected function ruleUniqueVin() 
    {
        return parent::ruleUniqueVin()->ignore($this->car->id);
    }
    
}
