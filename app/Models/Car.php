<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Tag;

use App\Enums\Cars\Status;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'status' => Status::class,
    ];

    protected $fillable = ['brand_id', 'model', 'price', 'transmission', 'vin', 'tag_id'];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function getDeletableAttribute() {
        return $this->status === Status::DRAFT || $this->status === Status::CANCELED;
    }

    public function scopeActive($query) {
        return $query->where('status', Status::ACTIVE);
    }
}
