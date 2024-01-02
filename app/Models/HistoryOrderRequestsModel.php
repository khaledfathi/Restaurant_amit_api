<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOrderRequestsModel extends Model
{
    use HasFactory;
    public $table = 'history_order_requests'; 
    protected $fillable = [
        'order_id', 
        'quantity',
        'product_name',
        'price',
        'discount',
        'image'
    ];
}
