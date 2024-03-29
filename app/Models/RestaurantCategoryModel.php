<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantCategoryModel extends Model
{
    use HasFactory;
    public $table = 'restaurant_categories'; 
    protected $fillable = [
        'name',
        'image'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
