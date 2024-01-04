<?php
namespace App\Enum; 

enum OrderStatus:string {
    case InProgress = 'in progress'; 
    case Complete = 'complete'; 
}