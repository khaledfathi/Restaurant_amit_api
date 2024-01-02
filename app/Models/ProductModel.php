<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $table = 'products';
    protected $fillable = [
        'product_category_id', 
        'restaurant_id',
        'name',
        'image', 
        'quantity',
        'price',
        'discount'
    ];
}
