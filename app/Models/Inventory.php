<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public $table = "inventories";

    protected $fillable = [
        'quantity',
        'created_at',
        'updated_at'
    ];
}
