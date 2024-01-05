<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryOrdersModel extends Model
{
    use HasFactory;
    public $table = 'history_orders';
    protected $fillable = [        
        'user_id',
        'time',
        'status', 
        'total'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at',
    ];
}
