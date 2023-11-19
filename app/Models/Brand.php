<?php

namespace App\Models;

use App\Models\Car;
use App\Models\Country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function cars() {
        return $this->hasMany(Car::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
