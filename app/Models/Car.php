<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\CarModel;
use App\Models\Brand;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'year',
        'price',
        'description',
        'brand_id',
        'model_id',
    ];
    
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

}
