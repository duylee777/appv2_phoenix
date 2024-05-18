<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public $table = "discounts";

    protected $fillable = [
        'name', 
        'description', 
        'discount_percent',
        'is_active',
        'created_at',
        'updated_at'
    ];
}
