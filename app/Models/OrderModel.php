<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    public $table = 'orders'; 
    protected $fillable = [
        'user_id',
        'time', 
        'status',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
