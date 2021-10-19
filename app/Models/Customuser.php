<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customuser extends Model
{
    use HasFactory;
    protected $table = "customusers";
    
    public function orders()
    {
        return $this->hasMany(Order::class,'customer_id');
    }

}
