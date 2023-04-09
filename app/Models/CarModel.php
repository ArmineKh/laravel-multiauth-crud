<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\Brand;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'car-models';

    protected $fillable = [
        'name',
        'brand_id',
    ];

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
