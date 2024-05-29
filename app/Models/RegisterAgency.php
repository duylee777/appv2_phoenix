<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterAgency extends Model
{
    use HasFactory;

    public $table = 'register_agencies';
    
    protected $fillable = [
        'name', 'email', 'phone', 'message', 'status', 'created_at', 'updated_at'
    ];
}
