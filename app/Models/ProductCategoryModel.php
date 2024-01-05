<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    use HasFactory;
    public $table = 'product_categories';
    protected $fillable = [
        'name',
        'image'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
