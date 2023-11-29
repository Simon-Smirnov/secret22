<?php

namespace App\Models;

use App\Models\Car;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function cars()
    {
        return $this->belongsToMany(Car::class)->withTimestamps();
    }
}
