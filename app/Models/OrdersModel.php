<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    use HasFactory;
    public $table = 'orders'; 
    protected $fillable = [
        'user_id',
        'time', 
        'status',    
    ];
}
