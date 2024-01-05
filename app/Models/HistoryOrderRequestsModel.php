<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOrderRequestsModel extends Model
{
    use HasFactory;
    public $table = 'history_order_requests'; 
    protected $fillable = [
        'restaurant_id',
        'restaurant_name',
        'order_id', 
        'quantity',
        'product_id',
        'product_name',
        'price',
        'discount',
        'image',
        'total'
    ];
    protected $hidden = [
        'id',
        'order_id',
        'created_at',
        'updated_at'
    ];
}
