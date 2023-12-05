<?php

namespace App\Models;

use App\Models\Car;
use App\Models\Country;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
