<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "products";

    protected $fillable = [
        'code',
        'name',
        'slug',
        'description',
        'origin',
        'image',
        'document',
        'software',
        'driver',
        'specifications',
        'is_active',
        'is_featured',
        'cost_price',
        'odd_price',
        'discount_id',
        'inventory_id',
        'category_id',
        'unit_id',
        'brand_id',
        'created_at',
        'updated_at'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function unit() {
        return $this->belongsTo(Unit::class);
    }
}
