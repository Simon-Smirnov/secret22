<?php

namespace App\Models;

use App\Models\Brand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function brands() {
        return hasMany(Brand::class); 
    }
}
