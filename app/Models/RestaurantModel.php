<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantModel extends Model
{
    use HasFactory;
    public $table = 'restaurants'; 
    protected $fillable= [
       'restaurant_category_id' ,
       'name',
       'phone',
       'address', 
       'image',
       'lat',
       'long'
    ];
}
