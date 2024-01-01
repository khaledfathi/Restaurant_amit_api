<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRequestsModel extends Model
{
    use HasFactory;
    public $table = 'order_requests'; 
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity'
    ];
}
